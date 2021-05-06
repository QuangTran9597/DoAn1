@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
                <h3>Update Khóa Học</h3>
        <form action="{{route('course.update', $courses->id)}}" method="POST" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Course_Name</label>
                <input type="text" class="form-control" id="course_name" aria-describedby=""
                name="course_name" require="" value="{{ $courses->course_name }}">
                <div id="" class="form-text"></div>

                @error('course_name')
                     <div class="arlet alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="course_title" >Course_Title</label>
                <textarea class="form-control" name="course_title" placeholder="" id="floatingTextarea"
                rows="3" >{{ $courses->course_title }}</textarea>
                <span class="custom-file-control"></span>

                @error('course_title')
                     <div class="arlet alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="course_content" >Course_Content</label>
                <textarea class="form-control" name="course_content" placeholder="" id="floatingTextarea"
                rows="4">{{ $courses->course_content}}</textarea>

                <span class="custom-file-control"></span>

                @error('course_content')
                     <div class="arlet alert-danger">{{$message}}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>
@endsection
