@extends('admins.dashboard')
@section('content')

<link rel="stylesheet" href="{{asset('css/admin_wellcome.css')}}">
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            @if(Auth::check())
            <h2 class="section-heading text-uppercase">Hello {{Auth::user()->name}} Have A Good Day ^_^ </h2>
            @endif
            <h3 class="section-subheading text-muted" style="margin-bottom: 20px;"></h3>
            <h3 class="section-subheading text-muted">Những bài học mới nhất trong tuần qua</h3>


        </div>
        <div class="row lessons">
            @foreach ($lessons as $lesson )

            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">

                        <img class="img-fluid" src="/upload/images/{{ $lesson->lesson_image }}" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"> {{ $lesson->lesson_name }} </div>

                    </div>

                </div>
            </div>

            @endforeach

        </div>

        <div class="row  topics">

            @foreach ($topics as $topic )

            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">

                        <img class="img-fluid" src="/upload/images/topics/{{ $topic->topic_image }}" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"> {{ $topic->topic_name }} </div>

                    </div>

                </div>
            </div>

            @endforeach

        </div>

        <div class="row stories">

            @foreach ($stories as $story )

            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">

                        <img class="img-fluid" src="/upload/images/stories/{{$story->story_image}}" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"> {{ $story->story_name }} </div>

                    </div>

                </div>
            </div>

            @endforeach

        </div>

    </div>
</section>
@endsection
