@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
                <h3>Mời bạn thêm từ vựng</h3>
        <form action="{{route('vocabulary.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
            <label for="cars">Chọn chủ đề</label>
                    <select name="id_topic" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
                    @foreach ($topic as $top)
                        <option value="{{ $top->id }}">{{$top->name_topic}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="mb-3">
                <label for="vocabulary" >Vocabulary-Name</label>
                <input type="" id="vocabulary" name="vocabulary_name" class="form-control" value="{{ old('vocabulary') }}" >
                <span class="custom-file-control"></span>

                @error('vocabulary')
                     <div class="arlet alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="vietsub" >VietSub</label>
                <input type="text" id="vietsub" name="vietsub" class="form-control" value="{{ old('vietsub') }}" >
                <span class="custom-file-control"></span>

                @error('vocabulary')
                     <div class="arlet alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="">Vocabulary-Image</label>
                <input type="file" id="image_topic" name="vocabulary_image" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="audio">Vocabulary-Audio</label>
                <input type="file" id="audio" name="vocabulary_audio" class="form-control" >
                <audio id="audio" controls>
                    <source src="" id="src">
                </audio>
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>
@endsection
