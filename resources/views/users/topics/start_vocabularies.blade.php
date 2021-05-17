@extends('users.index')

@section('title', 'English-Vocabulary')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/start_topics.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/comment.css')}}">
<section class="page-section bg-light" style="padding:30px;">
    <div class="container" id="#tab1-content">
        <h2 class="section-heading text-uppercase" align="center">Topic: {{ $topics->topic_name }}</h2>

        <div class="row ">

            <div class="col col-sm-6 item ">
                <h5>Bấm chọn hình thu nhỏ để xem cỡ chuẩn của ảnh</h5>
                <div class="row">
                    @foreach ($topics->vocabularies as $key => $vocabulary )

                    <div class="col col-sm-3 img-audio">
                        <img class="thumb selected-thumb" img_key="{{ $key }}" title="{{ $vocabulary->vocabulary_name }} = {{ $vocabulary->vietsub }}" id="images" style=" margin:7px; cursor:pointer; padding:2px; border: 1px solid #646464;" width="110px;" src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" alt="">

                        <audio id="vocab-audio" audio_key="{{ $key }}" src="/upload/audio/{{ $vocabulary->vocabulary_audio}}" class="vocab-audio" controls hidden type="audi/mpeg">

                        </audio>
                    </div>

                    @endforeach
                </div>
            </div>
            <div class="col col-sm-6" id="flashcard-area">
                <div class="flashcard-outer">
                    @foreach ($topics->vocabularies as $key => $vocabulary )
                    <img class="thumb selected " style="display:none; max-width: 400px; min-width: 350px; cursor: pointer; padding: 3px; border: 2px solid #646464; margin: 3px; margin-left:45px;" id="ImgMain" src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" alt="">

                    @endforeach
                    <div class="img caption" id="Vietsub_1" style="display: block;"></div>

                </div>
                <div class="button-list global-float-right">
                    <div class="icon-vocabulary" style="display: flex;">

                        <a class="btn btn-dark btn-social mx-2 prev" style="opacity: 0.2;">
                            <i class="fas fa-arrow-left"></i></a>

                        <a class="btn btn-dark btn-social mx-2 next">
                            <i class="fas fa-arrow-right"></i></a>

                        <a class="btn btn-dark btn-social mx-2 back " style="opacity: 0.4;">
                            <i class="fas fa-reply"></i></a>

                        <a class="btn btn-dark btn-social mx-2 replay" id="replay" title="replay">
                            <i class="fas fa-volume-up"></i>
                        </a>

                        <a class="btn btn-dark btn-social mx-2" id="microphone" style="opacity: 0.8;">
                            <i class="fas fa-microphone"></i></a>
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

    <div class="review-box">

        <img class="review-star" src="{{ asset('img/star-vector.png')}}">

        <div class="review-message"><span>Hãy viết đánh giá của bạn về bài học này.</span>
            Các bạn sẽ đem đến những lời khuyên vô cùng bổ ích và là nguồn động lực lớn lao cho chúng tôi!
            Rất mong nhận được hồi âm từ các bạn. Xin cảm ơn và chúc các bạn học tốt!</div>

        <div class="review-button">
            <button class="btn btn-primary review-button">Viết đánh giá </button>
        </div>
    </div>

    <div id="add-review-form-placeholder" style="display: block;">
        <img id="add-review-form-placeholder-close" src="{{ asset('img/delete.png')}}">
        <h3 id="add-review-form-placeholder-title">Viết nhận xét của bạn về bài học: <span>{{ $topics->topic_name }}</span></h3>
        <form id="add-review-form" action="" method="POST">
        @csrf
            <dl class="zend_form">
                <div class="review-form-element"><span id="rating-label"><label class="review-form-element-label required">Đánh giá</label></span>

                    <label for="rating-1"><input type="radio" name="rating" id="rating-1" value="1">1 sao (tệ)</label>
                    <label for="rating-2"><input type="radio" name="rating" id="rating-2" value="2">2 sao (bình thường)</label>
                    <label for="rating-3"><input type="radio" name="rating" id="rating-3" value="3">3 sao (tạm được)</label>
                    <label for="rating-4"><input type="radio" name="rating" id="rating-4" value="4">4 sao (tốt)</label>
                     <label for="rating-5"><input type="radio" name="rating" id="rating-5" value="5">5 sao (tuyệt vời)</label>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                    <input type="email" class="form-control" id="" placeholder="">
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                    <textarea class="form-control" id="" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-secondary">Gửi đánh giá</button>
                <div class="review-form-element"><span id="creator_id-label">&nbsp;</span>

                    <input type="hidden" name="creator_id" value="711426" id="creator_id">
                </div>
                <div class="review-form-element"><span id="organization_id-label">&nbsp;</span>

                    <input type="hidden" name="organization_id" value="1" id="organization_id">
                </div>
                <div class="review-form-element"><span id="item_id-label">&nbsp;</span>

                    <input type="hidden" name="item_id" value="977" id="item_id">
                </div>
                <div class="review-form-element"><span id="item_table-label">&nbsp;</span>

                    <input type="hidden" name="item_table" value="series" id="item_table">
                </div>
            </dl>
        </form> 
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var audioElement = document.createElement('audio');
            // $('.selected-thumb').first().addClass('active');
            $('.selected').first().addClass('show');
            $('.selected').first().css({
                display: "block"
            });
            $('.selected-thumb').click(function(e) {

                e.preventDefault();
                $('.flashcard-outer .selected.show').attr('src', $(this).attr('src'));
                $('.flashcard-outer div').text($(this).attr('title'));
                $('.flashcard-outer .show').css({
                    display: "block"
                });

                // img_key = $(this).attr("img_key");
                // audio_key = $('.vocab-audio').attr("audio_key");

                console.log($(this).parent().find('.vocab-audio').attr('src'));
                var audio = $(this).parent().find('.vocab-audio').attr('src');

                audioElement.setAttribute('src', audio);
                audioElement.play();
            });

            var cur = $('.selected.show');
            cur.css({
                background: "#f99"
            });
            $('.prev').click(function() {


                console.log(cur);
                if (cur != 0) {

                    $('.selected').removeClass('show');

                    $('.selected').eq(cur - 1).addClass('show');

                    // console.log($('.seclected').eq( - 1).addClass('show'));
                    // // $('.seclected .show').css({display: 'block'});
                }
            })

            // $('.prev').click(function() {
            //     var cur = $('.selected').first($('.selected.show'));
            //     if (cur != 0) {
            //         console.log($('.selected').first($('.selected.show')).attr('src'));

            //         $('.selected').eq(cur - 1).addClass('show');
            //         // audioElement.setAttribute('src', $('.item.active audio source').attr('src'));
            //         // audioElement.play();
            //     }
            // });

        })
    </script>
</section>

@endsection
