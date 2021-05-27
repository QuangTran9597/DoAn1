@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Mời bạn thêm bài học</h3>
            <br>

            <form action="{{route('listen.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="cars">Chọn chủ đề</label>
                    <select name="topic_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}">{{$topic->topic_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Listen_Name</label>
                    <input type="text" class="form-control" id="" name="listen_name" require="" value="{{ old('listen_name')}}">
                    <div id="" class="form-text"></div>

                    @error('listen_name')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="audio">Listen_Audio</label>
                    <input type="file" id="listen_audio" name="listen_audio" class="form-control">
                    
                    @error('listen_audio')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                    <br>
                    <audio id="audio" controls>
                        <source src="" id="src">
                    </audio>

                </div>
                <br>

                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>

<script>
    function handleFiles(event) {

        var files = event.target.files;
        $('#audio').show();
        $("#src").attr("src", URL.createObjectURL(files[0]));
        document.getElementById("audio").load();
    }

    document.getElementById("listen_audio").addEventListener("change", handleFiles, false);
</script>


@endsection
