@extends('users.index')

@section('title', 'English-Stories')

@section('content')
<!-- <link rel="stylesheet" href="{{asset('css/pages/start_topics.css')}}"> -->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center" style="text-align: center;">
                <h2 class="section-heading text-uppercase">Cùng thử sức với các chủ đề nào</h2>
                <h3 class="section-subheading text-muted">Bạn đã sẵn sàng với các thử thách của chúng tôi chưa.</h3>
        </div>
        <div class="row">

            <div class="col-lg-4 col-sm-6 mb-4">

                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content" ><i  class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="/upload/images/{{ $lessons->lesson_image}}" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"> {{ $lessons->lesson_name }} </div>
                        <div class="portfolio-caption-heading"> Random Game </div>

                        <a class="btn btn-primary" href="{{ route('start_exams') }}" role="button">Bắt đầu học ngay</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 mb-4">

               <div class="portfolio-item">
                   <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                       <div class="portfolio-hover">
                           <div class="portfolio-hover-content" ><i  class="fas fa-plus fa-3x"></i></div>
                       </div>
                       <img class="img-fluid" src="/upload/images/{{ $lessons->lesson_image}}" alt="" />
                   </a>
                   <div class="portfolio-caption">
                       <div class="portfolio-caption-heading"> {{ $lessons->lesson_name }} </div>
                       <div class="portfolio-caption-heading"> Random Vocabulary </div>

                       <a class="btn btn-primary" href="" role="button">Bắt đầu học ngay</a>
                   </div>
               </div>
           </div>

           <div class="col-lg-4 col-sm-6 mb-4">

               <div class="portfolio-item">
                   <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                       <div class="portfolio-hover">
                           <div class="portfolio-hover-content" ><i  class="fas fa-plus fa-3x"></i></div>
                       </div>
                       <img class="img-fluid" src="/upload/images/{{ $lessons->lesson_image}}" alt="" />
                   </a>
                   <div class="portfolio-caption">
                       <div class="portfolio-caption-heading"> {{ $lessons->lesson_name }} </div>
                       <div class="portfolio-caption-heading"> Random Game </div>

                       <a class="btn btn-primary" href="" role="button">Bắt đầu học ngay</a>
                   </div>
               </div>
           </div>



        </div>
    </div>
</section>

@endsection
