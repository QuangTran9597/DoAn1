@extends('users.index')

@section('title', 'English-Vocabulary')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/start_topics.css')}}">
<section class="page-section bg-light" style="padding:30px;">
    <div class="container" id="#tab1-content">
        <h2 class="section-heading text-uppercase" align="center">Topic: {{ $topics->topic_name }}</h2>

        <div class="row ">

            <div class="col col-sm-6 item ">
                <h5>Bấm chọn hình thu nhỏ để xem cỡ chuẩn của ảnh</h5>
                    <div class="row">
                @foreach ($topics->vocabularies as $key => $vocabulary )

                <div class="col col-sm-3 img-audio">
                    <img class="thumb selected-thumb" key="{{ $key }}" onclick="preview(this)" title="{{ $vocabulary->vocabulary_name }} = {{ $vocabulary->vietsub }}"
                    id="images" style="margin:7px; cursor:pointer; padding:2px; border: 1px solid #646464;" width="110px;"
                    src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" alt="">


                    <audio id="vocab_audio" key="{{ $key }}" class="vocab_audio" title="{{ $vocabulary->vocabulary_name }} = {{ $vocabulary->vietsub }}"  controls hidden
                    src="/upload/audio/{{ $vocabulary->vocabulary_audio }}" type="audio/mpeg" >

                        {{ $vocabulary->vocabulary_name }}
                    </audio>
                </div>

                @endforeach
                </div>
            </div>
            <div class="col col-sm-6" id="flashcard-area">
                <div class="flashcard-outer">

                    <img class="thumb selected " style=" max-width: 400px; min-width: 350px; cursor: pointer; padding: 3px; border: 2px solid #646464; margin: 3px;"
                     id="ImgMain" src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" alt="">

                    <div class="img caption" id="Vietsub_1" style="display: block;"></div>

                    <audio id="vocab_audio_play" class="audio_active"
                    src="/upload/audio/{{ $vocabulary->vocabulary_audio}}" type="audio/mpeg" controls hidden>
                    </audio>


                </div>
                <div class="button-list global-float-right">
                    <div class="icon-vocabulary" style="display: flex;">
                        <div class="button_item prev">
                            <a class="btn btn-dark btn-social mx-2" id="prev" title="left" style="opacity: 0.2;">
                                <i class="fas fa-arrow-left"></i></a>
                        </div>

                        <div class="button_item next">
                            <a class="btn btn-dark btn-social mx-2" id="next" title="right">
                                <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="button_item back">
                            <a class="btn btn-dark btn-social mx-2" id="back" title="back" style="opacity: 0.4;">
                                <i class="fas fa-reply"></i></a>
                        </div>

                        <div class="button_item replay">
                            <a class="btn btn-dark btn-social mx-2 replay" onclick="replay()" id="replay" title="replay">
                                <i class="fas fa-volume-up"></i>
                            </a>
                        </div>

                        <div class="button_item microphone">
                            <a class="btn btn-dark btn-social mx-2" id="microphone" style="opacity: 0.8;">
                                <i class="fas fa-microphone"></i></a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="row">
               <div class="col" style="display: grid">
                    <div class="btn">

                        <a href="" class="btn btn-primary" style="width: 100px; margin:20px;">Trước</a>
                        <a href="{{ route('remember_vocabulary', $topics->id)}}" class="btn btn-primary" style="width: 100px; margin:20px;">Sau</a>
                        <a href="" class="btn btn-primary" style="float: right; margin:30px;">Hoàn thành</a>
                    </div>
               </div>
        </div>
    </div>
    <script type="text/javascript">

        document.getElementById('ImgMain').src = document.getElementById('images').src;

        document.getElementById('ImgMain').className = "thumb selected";

        document.getElementsById('images').title = document.getElementById('Vietsub_1').innerHTML;

        // document.getElementById('vocab_audio_play').src = document.getElementById('vocab_audio').src;

        // document.getElementById('vocab_audio_play').className = "audio_active";
        var audioElement = document.getElementById('vocab_audio_play');


        function preview(img) {

            document.getElementById('images').className = "thumb selected-thumb";
            img.className = "thumb selected";

            document.getElementById('ImgMain').src = img.src;

            document.getElementById('Vietsub_1').innerText = img.title;

            // document.getElementById('vocab_audio_play').className = "audio_active";

            // document.getElementById('vocab_audio_play').src = document.getElementById('vocab_audio').src;

            // document.getElementById('vocab_audio').key = document.getElementById('images').key;
            audioElement.className = "audio_active";

            audioElement.play();
        }


    </script>

    <script>

        var audioElement = document.getElementById('vocab_audio_play');

        document.getElementById('replay').src = document.getElementById('vocab_audio_play').src;

        function replay() {

            document.getElementById('replay').src = audioElement;
            audioElement.play();
        }

    </script>


</section>

@endsection
