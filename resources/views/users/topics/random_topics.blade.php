@extends('users.index')

@section('title', 'English-Topics')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/random_topics.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/comment.css')}}">
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" align="center">Topic: {{ $topics->topic_name }}</h2>
            <h3 class="section-subheading text-muted">{{ $topics->topic_content }}</h3>
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
                    <a class="btn btn-primary btn-doAgain">Do Again</a>

                    <a class="btn btn-primary btn-finish" href="{{route('page.showtopics')}}">Hoàn Thành </a>
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
        <script src="{{ asset('js/random_vocabulary.js') }}" ></script>
        <script>

        </script>

</section>

@endsection
