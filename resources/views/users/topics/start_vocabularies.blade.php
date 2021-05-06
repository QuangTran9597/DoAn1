@extends('users.index')

@section('title', 'English-Vocabulary')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/start_topics.css')}}">
<section class="page-section bg-light" style="padding:30px;">
    <div class="container" id="#tab1-content">
        <h2 class="section-heading text-uppercase" align="center">Topic: {{ $topics->topic_name }}</h2>

        <div class="row ">

            <div class="col col-sm-6 thumb-block-0 ">
                <h5>Bấm chọn hình thu nhỏ để xem cỡ chuẩn của ảnh</h5>

                @foreach ($topics->vocabularies as $vocabulary )

                <img class="thumb selected-thumb" onclick="preview(this)" title="{{ $vocabulary->vocabulary_name }} = {{ $vocabulary->vietsub }}"
                id="images" style="margin:7px; cursor:pointer; padding:2px; border: 1px solid #646464;" width="110px;"
                 src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" alt="">

                <audio id="vocab_audio" controls hidden>
                    <source src="/upload/audio/{{ $vocabulary->vocabulary_audio }}" type="audio/mpeg">
                </audio>

                @endforeach
            </div>
            <div class="col col-sm-6" id="flashcard-area">
                <div class="flashcard-outer">

                    <img class="thumb selected "
                    style=" max-width: 400px; min-width: 350px; cursor: pointer; padding: 3px; border: 2px solid #646464; margin: 3px;"
                    id="ImgMain" src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" alt="">

                    <div class="img caption" id="Vietsub_1" style="display: block;"></div>

                </div>
                <div class="button-list global-float-right">
                    <div class="icon-vocabulary">

                        <a class="btn btn-dark btn-social mx-2" href="#!" style="opacity: 0.2;"> <i class="fas fa-arrow-left"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"> <i class="fas fa-arrow-right"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" style="opacity: 0.4;"> <i class="fas fa-reply"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"> <i class="fas fa-volume-up"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" style="opacity: 0.8;"> <i class="fas fa-microphone"></i></a>

                    </div>

                </div>

            </div>
        </div>
        <div class="row">

        </div>
    </div>
    <script type="text/javascript">
        // function preview() {
        //     var img = document.getElementsByClassName("thumb selected-thumb")[0].getAttribute("src");
        //     document.getElementById("ImgMain").innerHTML = img;
        // }

        // var setImg = images;

        document.getElementById('ImgMain').src = document.getElementById('images').src;

        document.getElementById('ImgMain').className = "thumb selected";

        document.getElementsById('images').title = document.getElementById('Vietsub_1').innerText;


        function preview(img) {

            document.getElementById('images').className = "thumb selected-thumb";
            img.className = "thumb selected";
            document.getElementById('ImgMain').src = img.src;

            document.getElementById('Vietsub_1').innerText = img.title;


        }
    </script>
</section>

@endsection
