@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Mời bạn thêm truyện</h3>
            <br>

            <form action="{{route('story.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Story_Name</label>
                    <input type="text" class="form-control"  name="story_name" require="" value="{{ old('story_name')}}">
                    <div id="" class="form-text"></div>

                    @error('story_name')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lesson_title">Story_Title</label>
                    <textarea class="form-control" name="story_title" placeholder="" id="floatingTextarea" rows="3"></textarea>
                    <span class="custom-file-control"></span>

                    @error('story_title')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lesson_content">Story_Content</label>
                    <textarea class="form-control" name="story_content" placeholder="" id="floatingTextarea" rows="4"></textarea>

                    <span class="custom-file-control"></span>

                    @error('story_content')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Link</label>
                    <textarea class="form-control" name="link" placeholder="" id="floatingTextarea" rows="1"></textarea>

                    <span class="custom-file-control"></span>

                    @error('link')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="">Story_Image</label>
                    <input type="file" id="story_image" name="story_image" class="form-control" onchange="ImagesFileAsURL()">

                    <br>
                    @error('story_image')
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
        var fileSelected = document.getElementById('story_image').files;
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
