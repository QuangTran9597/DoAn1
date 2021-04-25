@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
                <h3>Mời bạn thêm chủ đề</h3>
        <form action="{{route('topics.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên chủ đề</label>
                <input type="text" class="form-control" id="name_topic" aria-describedby="emailHelp"
                name="name_topic" require="" value="{{ old('name_topic')}}">
                <div id="" class="form-text"></div>
                
                @error('name_topic')
                     <div class="arlet alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Hinh" >Image_Topic</label>
                <input type="" id="image_topic" name="image_topic" class="form-control" value="{{ old('image_topic') }}" >
                <span class="custom-file-control"></span>

                @error('image_topic')
                     <div class="arlet alert-danger">{{$message}}</div>
                @enderror
            </div>
            <input type="file" id="image_topic" name="image_path" class="form-control" >

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>
@endsection
