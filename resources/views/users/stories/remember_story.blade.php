@extends('users.index')

@section('title', 'English-Stories')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/story_remember.css')}}">
<!-- <link rel="stylesheet" href="{{asset('css/pages/listen1.css')}}"> -->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center" style="text-align: center;">
            <h2 class="section-heading text-uppercase">Story: {{ $stories->story_name }}</h2>
            <!-- <h3 class="section-subheading text-muted">{{ $stories->story_content }}</h3> -->
        </div>
        <div class="row">
            <div class="activity-image">
                <div class="col  activity-container">
                    <div class="blue-bar">
                        <p>{{ $stories->story_content }}</p>
                    </div>
                    <input type="hidden" name='total' value="{{ count($images->toArray() )}} ">
                    <div class="images-story">
                        @foreach ($images as $image )
                        <div class="image">
                            <img class="dragImage img-audio" draggable="true" data-id="{{ $image->id }} " src="/upload/images/stories/story_img/{{ $image->image}}" alt="">
                        </div>

                        @endforeach
                    </div>

                    <div class="activity-line">
                        <div class="line-text">Kéo tranh vào audio tương ứng</div>
                    </div>

                    <div class="audio-story">

                        @foreach ($images as $audio )

                        <div class="audio">
                            <audio data-id="{{ $audio->id }}" class="audio-name" controls hidden>
                                <source src="/upload/audio/story/{{ $audio->image_audio }}">
                            </audio>

                            <div class="volume">
                                <a class="btn btn-dark btn-social mx-2 icon-volume" href="#!"><i class="fas fa-volume-up"></i></a>
                            </div>

                            <div class="image">

                            </div>
                        </div>

                        @endforeach

                    </div>

                    <div class="btn-check">

                        <button class="btn btn-primary check-img">Check</button>
                        <button class="btn btn-primary doAgain">Do Again</button>
                        <button class="btn btn-primary answer">Answer</button>
                        <a href="{{ route('show_story') }}" class="btn btn-primary story-list" style="float: right;">Story List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/story_remember.js')}}"></script>
<script src="{{ asset('js/story_remember_2.js')}}"></script>
<script>
    $(document).ready(function() {

        var audioStory = document.createElement('audio');

        $('.volume').click(function()
        {
            var audio = $(this).parent().find('.audio-name source').attr('src');
            audioStory.setAttribute('src', audio);
            audioStory.play();

        });

    });
</script>

@endsection
