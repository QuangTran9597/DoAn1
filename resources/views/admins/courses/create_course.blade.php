@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Mời Bạn Thêm Khóa Học</h3>
            <form action="{{route('course.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Course_Name</label>
                    <input type="text" class="form-control" id="course_name" aria-describedby="" name="course_name" require="" value="{{ old('course_name')}}">
                    <div id="" class="form-text"></div>

                    @error('course_name')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="course_title">Course_Title</label>
                    <textarea class="form-control" name="course_title" placeholder="" id="floatingTextarea" rows="3" value="{{old('cours_title')}}"></textarea>
                    <span class="custom-file-control"></span>

                    @error('course_title')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course_content">Course_Content</label>
                    <textarea class="form-control" name="course_content" placeholder="" id="floatingTextarea" value="{{old('cours_title')}}" rows="4"></textarea>

                    <span class="custom-file-control"></span>

                    @error('course_content')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <select class="form-select" aria-label="Default select example" name="published">
                    <option selected>Published</option>
                    <option value="0">Not Publish</option>
                    <option value="1">Publish</option>
                </select>

                <hr>

                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>
@endsection
