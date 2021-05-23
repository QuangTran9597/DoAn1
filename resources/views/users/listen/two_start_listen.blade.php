@extends('users.index')

@section('title', 'English-Listen')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/listen1.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/listen2.css')}}">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="page-section bg-light" id="portfolio">
    <div class="container listen-word1">
        <div class="text-center">

            <h2 class="section-heading text-uppercase">{{ $topics->topic_name }}</h2>
            <h3 class="section-subheading text-muted" style="margin: 15px;">{{ $topics->topic_title }}</h3>
            <h3 class="section-subheading text-muted">{{ $topics->topic_content }}</h3>

        </div>
        <div class="col col-sm-offset-3">

        </div>

        <div class="row ">
            <div class="col  activity-container">
                <div class="blue-bar">
                    <p>{{ $listens->listen_name }}</p>
                    <p>(The message: Please call. or He / She will call you.)</p>
                </div>
                <div class="activity-listen global-activity-container global-shadow-radius-bottom">
                    <div class="col-sm audio-container">
                        <div class="audio-name-listen">
                            <audio class="audio-name-listen" controls hidden>
                                <source src="/upload/audio/listen/{{ $listens->listen_audio }}">
                            </audio>

                            <div class="icon-audio">

                                <a class="btn btn-dark btn-social mx-2 icon-play" href="#!"><i class="fas fa-play"></i></a>
                                <a class="btn btn-dark btn-social mx-2 icon-volume" href="#!"><i class="fas fa-volume-up"></i></a>
                                <a class="btn btn-dark btn-social mx-2 icon-pause" href="#!"><i class="fas fa-pause"></i></a>
                                <!-- <div id="status" style="color:red;">Status: Loading</div> -->
                            </div>

                            <img src="{{ asset('img/image.jpg')}}" class="listen-img">
                        </div>
                    </div>

                    <div class="col-sm-10 paragraph-container">
                        <div class="listen-word2" id="listen-word">
                            <table class="table table-check">

                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">The message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calls as $key => $call )
                                    <tr class="listen-check">
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td><input type="text" class="listen-text name-check" data="{{ $call->name }}">
                                            <img src="{{ asset('img/true-icon.png')}}" class="true-icon1">
                                            <img src="{{ asset('img/false-icon.png')}}" class="false-icon1">
                                        </td>

                                        <td><input type="text" class="listen-text phone-check" data="{{ $call->telephone }}">
                                            <img src="{{ asset('img/true-icon.png')}}" class="true-icon1">
                                            <img src="{{ asset('img/false-icon.png')}}" class="false-icon1">
                                        </td>

                                        <td><input type="text" class="listen-text message-check" data="{{ $call->message }}">
                                            <img src="{{ asset('img/true-icon.png')}}" class="true-icon1">
                                            <img src="{{ asset('img/false-icon.png')}}" class="false-icon1">
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>

                            <span class="btn-check-again">
                                <button class="btn btn-primary check-word">Check</button>
                                <button class="btn btn-primary doAgain">Do Again</button>
                                <button class="btn btn-primary answer">Answer</button>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="" class="next-listen">Bài tiếp</a>
    </div>
</section>


<script>
    $(document).ready(function() {

        var audioListen = document.createElement('audio');

        audioListen.setAttribute('src', $('.audio-name-listen source').attr('src'));

        audioListen.addEventListener('ended', function() {
            this.play();
        }, false);

        audioListen.addEventListener("canplay", function() {

        });

        $('.icon-play').click(function()
        {
            audioListen.play();
        });

        $('.icon-pause').click(function()
        {
            audioListen.pause();
        });

        $('.icon-volume').click(function()
        {
            audioListen.currentTime = 0;
        });

        $('.check-word').click(function() {

            var audioCheck = document.createElement('audio');
            audioCheck.setAttribute('src', 'http://localhost:8000/upload/show-result.mp3');
            audioCheck.play();

            var diem = null;
            var total = null;

            $('.listen-check').each(function() {
                var inputName = String($(this).find('.name-check').val());
                var name = String($(this).find('.name-check').attr('data'));

                var inputTelephone = parseInt($(this).find('.phone-check').val());
                var phone = parseInt($(this).find('.phone-check').attr('data'));

                var inputMessage = String($(this).find('.message-check').val());
                var message = String($(this).find('.message-check').attr('data'));

                if (inputName === name) {
                    $(this).find('.true-icon1').show();
                    $(this).find('.false-icon1').hide();
                    $(this).find('.name-check').css({
                        background: "limegreen"
                    });

                    diem = 1;
                    total += diem;
                } else {

                    $(this).find('.name-check').css({
                        background: "tomato"
                    });

                    $(this).find('.true-icon1').hide();
                    $(this).find('.false-icon1').show();

                    diem = 0;
                    total += diem;
                };

                if (inputTelephone === phone) {
                    $(this).find('.true-icon1').show();
                    $(this).find('.false-icon1').hide();
                    $(this).find('.phone-check').css({
                        background: "limegreen"
                    });


                    diem = 1;
                    total += diem;

                } else {
                    $(this).find('.true-icon1').hide();
                    $(this).find('.false-icon1').show();
                    $(this).find('.phone-check').css({
                        background: "tomato"
                    });

                    diem = 0;
                    total += diem;

                };

                if (inputMessage === message) {
                    $(this).find('.true-icon1').show();
                    $(this).find('.false-icon1').hide();

                    $(this).find('.message-check').css({
                        background: "limegreen"
                    });

                    diem = 1;
                    total += diem;

                } else {
                    $(this).find('.true-icon1').hide();
                    $(this).find('.false-icon1').show();
                    $(this).find('.message-check').css({
                        background: "tomato"
                    });

                    diem = 0;
                    total += diem;

                };


            });
            $('.answer').show();

            console.log(total);

        });


        $('.doAgain').click(function() {
            parent.window.location.reload();
        });

        $('.answer').click(function() {

            $('.choices-container').each(function() {
                $(this).find('.word-true').css({
                    color: "rgb(14, 163, 168)"
                });

            })
        });



    });

</script>

@endsection
