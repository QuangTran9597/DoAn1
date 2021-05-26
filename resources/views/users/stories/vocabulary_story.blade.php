@extends('users.index')

@section('title', 'English-Vocabulary')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/start_topics.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/comment.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/story.css')}}">
<div class="page-section bg-light" style="padding:30px;">
    <div class="container" id="#tab1-content" style="text-align: center;">
        <h2 class="section-heading text-uppercase">Story: {{ $stories->story_name }}</h2>
        <h3 class="section-subheading text-muted">{{ $stories->story_content }}</h3>

        <div class="row ">

            <div class="col col-sm-6 item ">
                <h5>Bấm chọn hình thu nhỏ để xem cỡ chuẩn của ảnh</h5>
                <div class="row">
                    @foreach ($stories->story_images as $key => $story )

                    <div class="col col-sm-3 img-audio">
                        <img class="thumb selected-thumb" img_key="{{ $key }}" title="{{ $story->image_name }} = {{ $story->vietsub }}"
                        id="images" src="/upload/images/stories/story_img/{{ $story->image}}" alt="">

                        <audio id="vocab-audio" audio_key="{{ $key }}" src="/upload/audio/story/{{ $story->image_audio }}" class="vocab-audio" controls hidden type="audi/mpeg">

                        </audio>
                    </div>

                    @endforeach
                </div>
            </div>
            <div class="col col-sm-6" id="flashcard-area">
                <div class="flashcard-outer big-img-audio">
                    @foreach ($stories->story_images as $key => $story )

                    <div class="image-audio">
                        <img class="selected " id="ImgMain" img_key="{{ $key }}" title="{{ $story->image_name }} = {{ $story->vietsub }}"
                        src="/upload/images/stories/story_img/{{ $story->image}}" alt="">


                        <audio class="audio-img" audio_key="{{ $key }}" src="/upload/audio/story/{{ $story->image_audio }}" controls hidden type="audi/mpeg">
                        </audio>
                    </div>

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

                        <a class="btn btn-dark btn-social mx-2 microphone " style="opacity: 0.8;">
                            <i class="fas fa-microphone"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col" style="display: grid">
                <div class="btn">

                    <a href="" class="btn btn-primary previus" style="width: 100px; margin:20px;">Previus</a>
                    <a href="{{ route('story_remmember', $stories->id) }}" class="btn btn-primary remember" style="margin:20px;">Remember Vocabulary</a>
                    <a href="{{ route('show_story') }}" class="btn btn-primary story-list" style="float: right; margin:30px;">Story List</a>
                </div>
            </div>
        </div>
    </div>
    @if(session('message'))
    <span align="center" style="color:darkcyan; " class="notification alert-danger">
        <h5>{{ session('message')}} </h5>
        <a href="{{ route('review-comments') }}" class="btn btn-primary">Xem đánh giá</a>

    </span>


    @endif
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
            <h3 id="add-review-form-placeholder-title">Viết nhận xét của bạn về câu truyện: <span>{{ $stories->story_name }}</span></h3>
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('js/story_vocabulary.js')}}"></script>

</section>

@endsection
