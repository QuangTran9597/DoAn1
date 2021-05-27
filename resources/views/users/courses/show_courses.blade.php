@extends('users.index')

@section('title', 'English-Topics')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/course.css')}}">
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">

            <h2 class="section-heading text-uppercase">Danh sách khóa học </h2>
            <h3 class="section-subheading text-muted" style="margin-bottom: 20px;">Bạn là người mới? Bạn đã theo đuổi tiếng Anh một thời gian dài nhưng thiếu định hướng? Khóa học này chính là kim chỉ nam dành cho bạn.</h3>

        </div>
        <div class="course-in-category">
            @foreach ($courses as $key => $course )
            <a href="" class="course-item-detail">
                <div class="course-item-detail-img-box">
                    <img alt="course item image" class="course-item-detail-img" src="https://media.ucan.vn/upload/userfiles/organizations/1/1/thumbnails/tu-vung-co-ban1/180x90_cover.jpg">
                </div>
                <div class="course-item-detail-title">{{ $course->course_name }} </div>
                <p class="course-item-detail-summary">{{ $course->course_title }}</p>
            </a>
            @endforeach

        </div>
    </div>
</section>

@endsection
