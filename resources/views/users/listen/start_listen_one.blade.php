@extends('users.index')

@section('title', 'English-Listen')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/listen1.css')}}">
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
                    <p>{{ $topics->topic_title }} . {{ $listens_topics->listen_name }}</p>
                </div>
                <div class="activity-listen global-activity-container global-shadow-radius-bottom">
                    <div class="col-sm-4 audio-container">
                        <div class="audio-Name1">

                            <audio class="audio-name" controls hidden>
                                <source src="/upload/audio/listen/{{ $listens_topics->listen_audio }}">
                            </audio>

                            <div class="icon-audio">

                                <a class="btn btn-dark btn-social mx-2 icon-play" href="#!"><i class="fas fa-play"></i></a>
                                <a class="btn btn-dark btn-social mx-2 icon-volume" href="#!"><i class="fas fa-volume-up"></i></a>
                                <a class="btn btn-dark btn-social mx-2 icon-pause" href="#!"><i class="fas fa-pause"></i></a>

                                <div class="status">
                                    <p>
                                        <strong>Click</strong> <i class="fas fa-play"></i> để nghe audio. <br>
                                    </p>

                                    <p>
                                        <strong>Click</strong> <i class="fas fa-pause"></i> để dừng audio. <br>
                                    </p>

                                    <p>
                                        <strong>Click</strong> <i class="fas fa-volume-up"></i> để nghe lại audio.
                                    </p>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="col-sm-8 paragraph-container">
                        <div class="listen-word" id="listen-word">

                            <img alt="" src="https://media.ucan.vn/upload/userfiles/organizations/1/1/img/Listening-elementary/1-name/hotel.jpg" style="width: 380px; height: 250px; float: right; margin-right: -40px;">

                            @foreach ($listens_word as $key => $word)

                            <span class="choices-container">
                                <p class="word-true" status="{{$word['status_true']}}">{{ $key+1}}. {{$word['word_true']}} /</p>

                                <p class="word-false" status="{{$word['status_false']}}">{{$word['word_false']}}</p>
                                <img src="{{ asset('img/true-icon.png')}}" class="true-icon">
                                <img src="{{ asset('img/false-icon.png')}}" class="false-icon">

                            </span>
                            @endforeach

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

        <a href="{{ route('start_listen_two', $topics->id) }}" class="next-listen">Bài tiếp</a>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        var diemso = null;
        var total = null;

        var audioListen = document.createElement('audio');

        audioListen.setAttribute('src', $('.audio-name source').attr('src'));

        audioListen.addEventListener('ended', function() {
            this.play();
        }, false);

        audioListen.addEventListener("canplay", function() {

        });

        $('.icon-play').click(function() {
            audioListen.play();
        });

        $('.icon-pause').click(function() {
            audioListen.pause();
        });

        $('.icon-volume').click(function() {
            audioListen.currentTime = 0;
        });

        $('.word-true').click(function() {
            var audioClick = document.createElement('audio');
            audioClick.setAttribute('src', 'http://localhost:8000/upload/click.mp3');
            audioClick.play();

            $(this).css({
                color: "rgb(214, 78, 15)"
            });

            $(this).addClass('chosen');

            $(this).parent().find('.word-false').css({
                color: "black"
            });

            $(this).parent().find('.word-false').removeClass('chosen');

        })

        $('.word-false').click(function() {
            var audioClick = document.createElement('audio');
            audioClick.setAttribute('src', 'http://localhost:8000/upload/click.mp3');
            audioClick.play();

            $(this).css({
                color: "rgb(214, 78, 15)"
            });

            $(this).addClass('chosen');

            $(this).parent().find('.word-true').css({
                color: "black"
            });

            $(this).parent().find('.word-true').removeClass('chosen');

        })

        $('.check-word').click(function() {

            var audioCheck = document.createElement('audio');
            audioCheck.setAttribute('src', 'http://localhost:8000/upload/show-result.mp3');
            audioCheck.play();

            $('.choices-container').each(function() {
                var checkT = String($(this).find('.chosen').attr('status'));

                if (checkT === String(true)) {
                    diemso = 1;
                    total += diemso;
                    $(this).find('.true-icon').show();
                    $(this).find('.false-icon').hide();

                } else {
                    diemso = 0;
                    total += diemso;
                    $(this).find('.true-icon').hide();
                    $(this).find('.false-icon').show();
                }
                // console.log(total);
            });
            swal({
                    title: "Điểm số của bạn là: " + total,
                    text: "Bạn có muốn làm lại bài tập không? Click Do Again!",
                    icon: "success",
                    buttons: true,
                    // dangerMode: true,
                }),

                $('.answer').show();

        });

        $('.doAgain').click(function() {
            parent.window.location.reload();
        });

        $('.answer').click(function() {

            $('.choices-container').each(function() {
                $(this).find('.word-true').css({
                    color: "rgb(11, 13, 138)"
                });

            })
        });

    });
</script>

@endsection
