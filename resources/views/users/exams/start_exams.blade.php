@extends('users.index')

@section('title', 'English-Stories')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/game_vocabulary.css')}}">
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center" style="text-align: center;">
            <h2 class="section-heading text-uppercase">Cùng thử sức với các chủ đề nào</h2>
            <h3 class="section-subheading text-muted">Bạn đã sẵn sàng với các thử thách của chúng tôi chưa.</h3>
        </div>
        <div class="row">
            <div class="image-random">
                <input type="hidden" name="total" value="{{ count($arrVocabulary ) }}">
                @foreach ($arrVocabulary as $key => $vocabulary )
                <h3 class="ind">
                    <!-- <img src="{{ asset('img/true-icon.png')}}" class="true-icon">
                    <img src="{{ asset('img/false-icon.png')}}" class="false-icon"> -->
                    Question: {{$key + 1}}
                </h3>

                <div class="">
                    <div class="row random-four">
                        @foreach ($vocabulary as $key => $voca )
                        <div class="images-random-four" data-id="{{ $voca['id']}}">

                            <img class="random-img" src="/upload/images/vocabulary/{{ $voca['vocabulary_image']}}" alt="   " style="width: 180px;">

                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" data-id="{{ $voca['id']}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault"> </label>
                                <!-- <p class="change">Đổi đáp án</p> -->
                            </div>
                        </div>
                        @endforeach

                        @php
                        $word = array_rand($vocabulary, 1);
                        $wordTrue = $vocabulary[$word]
                        @endphp

                        <div class="word-audio">

                            <div class="wordTrue" data-id="{{ $wordTrue['id']}}">{{ $wordTrue['vocabulary_name'] }}</div>

                            <audio class="audio-word" src="/upload/audio/{{ $wordTrue['vocabulary_audio']}}" controls></audio>

                        </div>

                    </div>

                </div>
                @endforeach
            </div>

            <div class="btn-check">

                <button class="btn btn-primary check-img">Check</button>
                <button class="btn btn-primary doAgain">Do Again</button>
                <button class="btn btn-primary answer">Answer</button>
                <a href="" class="btn btn-primary story-list" style="float: right;">Game List</a>
            </div>

        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/game_vocabulary.js')}}"></script>

<script>

</script>

@endsection
