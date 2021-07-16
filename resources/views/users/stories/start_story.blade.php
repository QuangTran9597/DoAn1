@extends('users.index')
@section('title', 'English-Stories')
@section('content')

<link rel="stylesheet" href="{{asset('css/pages/story.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/comment.css')}}">
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center" style="text-align: center;">
            <h2 class="section-heading text-uppercase">{{ $stories->story_name }}</h2>
            <h3 class="section-subheading text-muted">{{ $stories->story_content  }}</h3>
        </div>
        <div class="row story-video">
            <div class="story">
                <div class="video">
                    <iframe width="680" height="383" src="{{ $stories->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="icon-next">
                <h5>Bạn hãy chọn phần tiếp theo</h5>
                <p><a href="{{ route('story_vocabulary', $stories->id) }}">Vocabulary Story</a></p>
                <p><a href="{{ route('story_remmember', $stories->id) }}">Remember Vocabulary</a></p>
                <p><a href="">Game Vocabulary</a></p>
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
        <div id="add-review-form-placeholder" class="review-from" style="display: none;">
            <img id="add-review-form-placeholder-close" class="review-close" src="{{ asset('img/delete.png')}}">
            <h3 id="add-review-form-placeholder-title">Viết nhận xét của bạn về bài học: <span>{{ $stories->story_name }}</span></h3>
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
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('.review-button').click(function() {
        $('#add-review-form-placeholder').show();
    })

    $('.review-close').click(function() {

        $('.review-from').hide();
    })
</script>

@endsection
