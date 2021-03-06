@extends('users.index')

@section('title', 'English-Stories')

@section('content')

<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center" style="text-align: center;">
                <h2 class="section-heading text-uppercase">Learn English Through Stories</h2>
                <h3 class="section-subheading text-muted">Học tiếng anh qua những câu chuyện</h3>
        </div>
        <div class="row">
            @foreach ($stories as $story )
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content" ><i  class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="/upload/images/stories/{{ $story->story_image }}" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"> {{ $story->story_name }} </div>

                        <a class="btn btn-primary" href="{{ route('start_story', $story->id) }}" role="button">Bắt đầu học ngay</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
