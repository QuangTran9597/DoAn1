@extends('users.index')

@section('title', 'English-Topics')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/random_topics.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/comment.css')}}">
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" align="center">Topic: {{ $topics->topic_name }}</h2>
        </div>
        <div class="row">
            <div class="random-vocabulary">

                @php
                $vocabulary = $topics->vocabularies;
                $tukhac = $vocabulary->shuffle()->take(4);

                @endphp
                @foreach ($tukhac as $vocab )
                <div class="random-img">
                    <img class="random-images" data-id="{{ $vocab->id}}" src="/upload/images/vocabulary/{{ $vocab->vocabulary_image}}" />

                    <!-- <audio src="/upload/audio/{{ $vocab->vocabulary_audio}}" controls hidden></audio> -->
                </div>

                @endforeach

                <div class=" audio-word">

                    @php
                    $wordTrue = $tukhac->shuffle()->take(1);
                    @endphp

                    @foreach ($wordTrue as $true )
                    <audio class="audio-true" data-id="{{ $true->id}}" src="/upload/audio/{{ $true->vocabulary_audio}}" controls></audio>
                    <br>
                    <br>
                    <div class="word-true" data-id="{{ $true->id}}">{{ $true->vocabulary_name}} </div>
                    @endforeach
                    <hr>

                    <div id="tab3-result-container" class="global-float-left">
                        <div class="result-title-bar">Kết quả</div>
                        <div class="result-content">
                            <div class="correct">
                                <div class="text">Đúng</div>
                                <div class="number number-true">0</div>
                            </div>
                            <div class="incorrect">
                                <div class="text">Không đúng</div>
                                <div class="number number-false">0</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="row">
            <div class="col" style="display: grid">
                <div class="btn">
                    <a class="btn btn-primary btn-doAgain">Next Question</a>

                    <a class="btn btn-primary btn-finish">Hoàn Thành </a>
                </div>
            </div>
        </div>

        <div class="review-box">

            <img class="review-star" src="{{ asset('img/star-vector.png')}}">

            <div class="review-message"><span>Hãy viết đánh giá của bạn về bài học này.</span>
                Các bạn sẽ đem đến những lời khuyên vô cùng bổ ích và là nguồn động lực lớn lao cho chúng tôi!
                Rất mong nhận được hồi âm từ các bạn. Xin cảm ơn và chúc các bạn học tốt!</div>

            <div class="review-button">
                <button class="btn btn-primary review-button">Viết đánh giá </button>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                // localStorage.removeItem("clickcount");
                $('.number-false').text(0);
                var numberTrue = null;
                var numberFalse = null;
                var totalTrue = null;
                var totalFalse = null;

                $('.random-images').click(function(e) {

                    e.preventDefault();


                    dataImg = parseInt($(this).attr('data-id'));

                    dataImgTrue = parseInt($('.word-true').attr('data-id'));

                    if (parseInt(dataImg) === parseInt(dataImgTrue)) {

                        var audioCheck = document.createElement('audio');
                        audioCheck.setAttribute('src', 'http://localhost:8000/upload/show-result.mp3');
                        audioCheck.play();

                        numberTrue = 1;
                        totalTrue += numberTrue;
                        if (localStorage.clickcount) {
                            localStorage.clickcount = Number(localStorage.clickcount) + 1;
                        } else {
                            localStorage.clickcount = 1;
                        }
                        // $('.number-true').text(totalTrue);

                        swal({
                                title: "Congratulation! ",
                                text: "Bạn hãy thử câu tiếp theo nhé! Click Do Again!",
                                icon: "success",
                                buttons: true,
                                // dangerMode: true,
                            }),
                            function() {
                                parent.window.location.reload();
                            }
                        parent.window.location.reload();
                    } else {

                        var audioCheck = document.createElement('audio');
                        audioCheck.setAttribute('src', 'http://localhost:8000/upload/miss.mp3');
                        audioCheck.play();


                        numberFalse = 1;
                        totalFalse += numberFalse;

                        console.log(totalFalse);
                        if (localStorage.clickcount1) {
                            localStorage.clickcount1 = Number(localStorage.clickcount1) + 1;
                        } else {
                            localStorage.clickcount1 = 1;
                        }
                        $('.number-false').text(localStorage.clickcount1);


                        swal({
                            title: "Please try again! ",
                            text: " Click Do Again!",
                            icon: "error",
                            buttons: true,
                            // dangerMode: true,
                        });
                    }

                })
                var t = localStorage.getItem('clickcount');
                var t1 = localStorage.getItem('clickcount1');
                console.log('t', t);
                $('.number-true').text(t);
                $('.number-false').text(t1);
                $('.btn-doAgain').click(function() {
                    // if (localStorage.getItem('clickcount') === 'true') {
                    localStorage.removeItem('clickcount');
                    localStorage.removeItem('clickcount1');
                    $('.number-true').text(0);
                    $('.number-false').text(0);
                    // }

                });
                // window.onbeforeunload = () => {
                //     localStorage.removeItem('clickcount');
                // }

            });
        </script>

</section>

@endsection
