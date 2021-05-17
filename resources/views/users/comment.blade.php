<link rel="stylesheet" href="{{asset('css/pages/comment.css')}}">
<div class="review-box">

    <img class="review-star" src="{{ asset('img/star-vector.png')}}" >

    <div class="review-message"><span>Hãy viết đánh giá của bạn về bài học này.</span>
    Các bạn sẽ đem đến những lời khuyên vô cùng bổ ích và là nguồn động lực lớn lao cho chúng tôi!
    Rất mong nhận được hồi âm từ các bạn. Xin cảm ơn và chúc các bạn học tốt!</div>

    <div class="review-button">
        <button class="btn btn-primary review-button">Viết đánh giá </button>
    </div>
</div>

<div id="add-review-form-placeholder" style="display: block;">
    <img id="add-review-form-placeholder-close" src="/shark/public/img/global/delete.png">
    <h3 id="add-review-form-placeholder-title">Viết nhận xét của bạn về bài học <span>"Vocabulary: In the market"</span></h3>
    <form id="add-review-form" enctype="application/x-www-form-urlencoded" action="/shark/public/library/study/add-review/id/6023" method="post"><dl class="zend_form">
<div class="review-form-element"><span id="rating-label"><label class="review-form-element-label required">Đánh giá</label></span>

<label for="rating-1"><input type="radio" name="rating" id="rating-1" value="1">1 sao (tệ)</label> <label for="rating-2"><input type="radio" name="rating" id="rating-2" value="2">2 sao (bình thường)</label> <label for="rating-3"><input type="radio" name="rating" id="rating-3" value="3">3 sao (tạm được)</label> <label for="rating-4"><input type="radio" name="rating" id="rating-4" value="4">4 sao (tốt)</label> <label for="rating-5"><input type="radio" name="rating" id="rating-5" value="5">5 sao (tuyệt vời)</label></div>
<div class="review-form-element"><span id="title-label"><label class="review-form-element-label required">Tiêu đề</label></span>

<input type="text" name="title" id="title" value="" size="40"></div>
<div class="review-form-element"><span id="content-label"><label class="review-form-element-label required">Nội dung</label></span>

<textarea name="content" id="content" cols="40" rows="6"></textarea></div>

<input type="submit" name="add_review_submit" id="add_review_submit" value="Viết đánh giá" title="Gửi nhận xét của bạn" class="frontend-blue-button">
<div class="review-form-element"><span id="creator_id-label">&nbsp;</span>

<input type="hidden" name="creator_id" value="711426" id="creator_id"></div>
<div class="review-form-element"><span id="organization_id-label">&nbsp;</span>

<input type="hidden" name="organization_id" value="1" id="organization_id"></div>
<div class="review-form-element"><span id="item_id-label">&nbsp;</span>

<input type="hidden" name="item_id" value="977" id="item_id"></div>
<div class="review-form-element"><span id="item_table-label">&nbsp;</span>

<input type="hidden" name="item_table" value="series" id="item_table"></div></dl></form>    <img src="/shark/public/img/icons/ajax-loader.gif" id="write-series-review-box-loader">
</div>
