@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Mời bạn thêm từ vựng</h3>
            <form action="{{route('vocabulary.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="cars">Chọn chủ đề</label>
                    <select name="topic_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}">{{ $topic->topic_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vocabulary">Vocabulary-Name</label>
                    <input type="" name="vocabulary_name" class="form-control" value="{{ old('vocabulary') }}">
                    <span class="custom-file-control"></span>

                    @error('vocabulary')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="vietsub">VietSub</label>
                    <input type="text" id="vietsub" name="vietsub" class="form-control" value="{{ old('vietsub') }}">
                    <span class="custom-file-control"></span>

                    @error('vocabulary')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Vocabulary-Image</label>
                    <input type="file" id="vocabulary_image" name="vocabulary_image" class="form-control" onchange="ImagesFileAsURL()">
                </div>
                <div id="displayImg">

                </div>

                <div class="mb-3">
                    <label for="audio">Vocabulary-Audio</label>
                    <input type="file" id="vocabulary_audio" name="vocabulary_audio" class="form-control">
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

<script type="text/javascript">
    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('vocabulary_image').files;
        if (fileSelected.length > 0) {
            var fileToLoad = fileSelected[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById('displayImg').innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }

    function handleFiles(event) {

        var files = event.target.files;
        $('#audio').show();
        $("#src").attr("src", URL.createObjectURL(files[0]));
        document.getElementById("audio").load();
    }

    document.getElementById("vocabulary_audio").addEventListener("change", handleFiles, false);
</script>


@endsection
