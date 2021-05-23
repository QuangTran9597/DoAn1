@extends('users.index')

@section('title', 'English-Topics')

@section('content')
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            @foreach ($less as $less1 )
                <h2 class="section-heading text-uppercase">{{ $less1->lesson_name }}</h2>
                <h3 class="section-subheading text-muted" style="margin-bottom: 20px;">{{ $less1->lesson_title }}</h3>
                <h3 class="section-subheading text-muted">{{ $less1->lesson_content }}</h3>
            @endforeach

        </div>
        <div class="row">
            @foreach ($lessons as $lesson )
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="/upload/images/{{$lesson->lesson_image}}" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"> {{ $lesson->lesson_name }} </div>
                        <a class="btn btn-primary" href="{{route('start_topics', $lesson->id)}}" role="button">Bắt đầu học ngay</a>

                    </div>

                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>



@endsection
