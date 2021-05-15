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

                    <audio id="vocab-audio" src="/upload/audio/{{ $vocabulary->vocabulary_audio}}"
                     class="vocab-audio" controls hidden >

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


                </div>
                <div class="button-list global-float-right">
                    <div class="icon-vocabulary" style="display: flex;">
                        <div class="button_item ">
                            <a class="btn btn-dark btn-social mx-2 prev"  style="opacity: 0.2;">
                                <i class="fas fa-arrow-left"></i></a>
                        </div>

                        <div class="button_item next">
                            <a class="btn btn-dark btn-social mx-2 next"  >
                                <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="button_item back">
                            <a class="btn btn-dark btn-social mx-2 back "style="opacity: 0.4;">
                                <i class="fas fa-reply"></i></a>
                        </div>

                        <div class="button_item replay">
                            <a class="btn btn-dark btn-social mx-2 replay" onclick="replay(this)" id="replay" title="replay">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

        document.getElementById('ImgMain').src = document.getElementById('images').src;

        document.getElementById('ImgMain').className = "thumb selected";

        var audioElement = document.querySelectorAll(".vocab-audio");

        var play = null;

        function preview(img) {
            // console.log(audioElement);

            document.getElementById('images').className = "thumb selected-thumb";
            img.className = "thumb selected";

            document.getElementById('ImgMain').src = img.src;

            document.getElementById('Vietsub_1').innerText = img.title;

            for (var i = 0; i < audioElement.length; i++) {
                const audioPlay = audioElement[i];

                audioPlay.addEventListener('start',function(){
                    play = audioPlay;
                    setTimeout(function(){
                        audioPlay.play();
                    },0)
                })


             }

            // audioElement.play();

            // if(isplaying) {
            //     audioElement.setAttribute('src', $('.img-audio.vocab-audio audio source').attr('src'));
            //     audioElement.play();
            //     console.log(audioElement);
            // }



        }


    </script>

    <script>

        var audioElement = document.querySelectorAll(".vocab-audio");

        var play = null;
        function replay()
        {
            audioElement.forEach(play => {
                console.log(play);
                // play.play();
                // for ( var i = 0; i <audioElement.lengt; i ++){
                //     const Playaudio = audioElement[i];
                //     console.log(Playaudio);
                // }
            })
            // console.log(audioElement[2]);
            // for (var i = 0; i < audioElement.length; i++) {
            //     const audioPlay = audioElement[i];

            //     audioPlay.addEventListener('start',function(){
            //         play = audioPlay;
            //         setTimeout(function(){
            //             audioPlay.play();
            //         },0)
            //     })

            //  }
        }



        // var audioElement = document.createElement('audio');

        // var audioPlay = document.querySelectorAll('.vocab_audio');

        // $(document).ready(function()
        // {
        //     $('.img-audio').nextAll().addClass('active');
        //     $('.prev').click(function() {
        //         console.log('asds')
        //         var prev =  $('.img-audio').index($('.img-audio.active'));
        //         if ( prev != 0 ) {
        //             $('.img-audio').removeClass('active');
        //             $('.img-audio').nextAll(prev - 1).addClass('active');
        //             audioElement.setAttribute('src', $('.img-audio.active audio srouce').attr('src'));
        //             audioElement.play();
        //         }
        //     })

        //     var $val = $('.img-audio.active audio source ').attr('src');

        //     audioElement.setAttribute('src', $val);

        //     $('.replay').click(function()
        //     {
        //         audioElement.setAttribute('src', $('.img-audio.active audio source').attr('src'));
        //         audioElement.play();
        //     });
        // })

    </script>

</section>

@endsection
