@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Mời bạn thêm hình ảnh</h3>
            <form action="{{route('story_image.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="cars">Chọn truyện</label>
                    <select name="story_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        @foreach ($stories as $story)
                        <option value="{{ $story->id }}">{{ $story->story_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vocabulary">Image_name</label>
                    <input type="" name="image_name" class="form-control" value="{{ old('image_name') }}">
                    <span class="custom-file-control"></span>

                    @error('image_name')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="vietsub">VietSub</label>
                    <input type="text" id="vietsub" name="vietsub" class="form-control" value="{{ old('vietsub') }}">
                    <span class="custom-file-control"></span>

                    @error('vietsub')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" id="image" name="image" class="form-control" onchange="ImagesFileAsURL()">
                </div>
                <div id="displayImg">

                </div>

                <div class="mb-3">
                    <label for="audio">Image-Audio</label>
                    <input type="file" id="image_audio" name="image_audio" class="form-control">
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
        var fileSelected = document.getElementById('image').files;
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

    document.getElementById("image_audio").addEventListener("change", handleFiles, false);
</script>


@endsection
