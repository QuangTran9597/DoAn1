@extends('users.index')

@section('title', 'English-Topics')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/start_topics.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/comment.css')}}">
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" align="center">Topic: {{ $topics->topic_name }}</h2>
            <h3 class="section-subheading text-muted">{{ $topics->topic_content }}</h3>
        </div>

        <div class="row lists" style="margin-top: 20px;">
            <div class="col col-sm caption-background" style="margin-top: 13px;">

                @foreach ($topics->vocabularies as $key => $vocabulary )
                <div class="list-word  vocabulary" data-id="{{ $vocabulary->id }} " draggable="true">{{ $vocabulary->vocabulary_name }} </div>

                @endforeach
            </div>

            <div class="col col-sm-10 list ">

                <input type="hidden" name='total' value="{{ count($topics->vocabularies->toArray() )}} ">

                @foreach ($topics->vocabularies as $key => $vocabulary )
                <div class=" list img-caption">

                    <img class="list vocabularyImg" data-id="{{ $vocabulary->id }}" title="{{ $vocabulary->vocabulary_name }}"
                    src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" />

                    <div class="caption-background caption-text"></div>

                    <img src="{{ asset('img/true.png')}}" class="icon-true" >

                    <img src="{{ asset('img/false.png')}}" class="icon-false">

                </div>
                @endforeach

            </div>

        </div>

        <div class="row">
            <div class="col" style="display: grid">
                <div class="btn">
                    <a class="btn btn-primary btn-check" style="width: 100px; margin:20px;">Check</a>

                    <a class="btn btn-primary btn-doAgain" style="width: 100px; margin:20px;">Do Again</a>

                    <a class="btn btn-primary btn-next-topics" href="{{route('random-vocabulary', $topics->id) }}" style="width: 100px; margin:20px;">Next</a>
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

    <div id="add-review-form-placeholder" style="display: none;">
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
                    <input type="text" class="form-control" id="" placeholder="">
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

</section>
<script src="{{ asset('js/remember_vocab.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // đảo từ và hình ảnh
    var words = $(".vocabulary");
    for (var i = 0; i < words.length; i++) {
        var tager = Math.floor(Math.random() * words.length - 2) + 2;
        var targer2 = Math.floor(Math.random() * words.length - 1) + 1;

        words.eq(tager).before(words.eq(targer2));
    }

    $(document).ready(function() {
        var total = $('[name="total"]').val();
        var img = $('.vocabularyImg');
        var caption = $('.caption-text');
        var checkImg = null;
        var checkCaption = null;
        var scores = null;
        var count = null;
        $('.btn-check').click(function() {
            var audioCheck = document.createElement('audio');
            audioCheck.setAttribute('src', 'http://localhost:8000/upload/check.mp3');
            audioCheck.play();

            $('.vocabularyImg').each(function() {

                checkImg = parseInt($(this).attr('data-id'));
                checkCaption = parseInt($(this).parent().find('.list-word').attr('data-id'));

                if (parseInt(checkImg) === parseInt(checkCaption)) {

                     $(this).parent().find('.icon-true').show();
                     $(this).parent().find('.icon-false').hide();

                    scores = 1;
                    count += scores;
                    console.log('true');
                } else {

                    $(this).parent().find('.icon-true').hide();
                     $(this).parent().find('.icon-false').show();

                    scores = 0;
                    count += scores;
                    console.log('false');
                }

            });
            swal({
                title: "Điểm số của bạn là: " + count + '/' + total,
                text: "Bạn có muốn làm lại bài tập không? Click Do Again!",
                icon: "success",
                buttons: true,
                // dangerMode: true,
            });
        });

        $('.btn-doAgain').click(function() {
            location.reload();
        });

        $('.review-button').click(function() {
            $('#add-review-form-placeholder').show()
        })
        $('.btn-next-topics').click(function(){
            localStorage.removeItem("clickcount");

        })
    })
</script>

@endsection
