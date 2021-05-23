@extends('users.index')

@section('title', 'English-Listen')

@section('content')
<!-- <link rel="stylesheet" href="{{asset('css/pages/start_topics.css')}}"> -->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            @foreach ($lessons as $less )
                <h2 class="section-heading text-uppercase">{{ $less->lesson_name }}</h2>
                <h3 class="section-subheading text-muted">{{ $less->lesson_title }}</h3>
            @endforeach

        </div>
        <div class="row">
            @foreach ($topics as $topic )
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content" ><i  class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="/upload/images/topics/{{$topic->topic_image}}" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"> {{ $topic->topic_name }} </div>
                        <a class="btn btn-primary" href="{{ route('start_listen_one', $topic->id)}}" role="button">Bắt đầu học ngay</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>

@endsection
