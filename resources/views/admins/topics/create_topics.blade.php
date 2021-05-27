@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Mời Bạn Thêm Chủ Đề</h3>
            <br>

            <form action="{{route('topics.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="cars">Chọn bài học</label>
                    <select name="lesson_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        @foreach ($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{$lesson->lesson_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Topic_Name</label>
                    <input type="text" class="form-control" name="topic_name" require="" value="{{ old('topic_name')}}">
                    <div id="" class="form-text"></div>

                    @error('topic_name')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lesson_title">Topic_Title</label>
                    <textarea class="form-control" name="topic_title" placeholder="" id="floatingTextarea" rows="3"></textarea>
                    <span class="custom-file-control"></span>

                    @error('topic_title')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lesson_content">Topic_Content</label>
                    <textarea class="form-control" name="topic_content" placeholder="" id="floatingTextarea" rows="4"></textarea>

                    <span class="custom-file-control"></span>

                    @error('topic_content')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Topic_Image</label>
                    <input type="file" id="topic_image" name="topic_image" class="form-control" onchange="ImagesFileAsURL()">
                    <!-- <span class="custom-file-control" id="displayImg"></span> -->
                    <br>

                    @error('topic_image')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror

                    <div id="displayImg">

                    </div>
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>

<script type="text/javascript">
    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('topic_image').files;
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
</script>
@endsection
