@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Edit truyện</h3>
            <br>

            <form action="{{route('story.update', $stories->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="" class="form-label">Story_Name</label>
                    <input type="text" class="form-control"  name="story_name" require="" value="{{ $stories->story_name}}">
                    <div id="" class="form-text"></div>

                    @error('story_name')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lesson_title">Story_Title</label>
                    <textarea class="form-control" name="story_title" placeholder="" id="floatingTextarea" rows="3">{{ $stories->story_title}}</textarea>
                    <span class="custom-file-control"></span>

                    @error('story_title')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lesson_content">Story_Content</label>
                    <textarea class="form-control" name="story_content" placeholder="" id="floatingTextarea" rows="4">{{ $stories->story_content}}</textarea>

                    <span class="custom-file-control"></span>

                    @error('story_content')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Story_Image</label>
                    <input type="file" id="story_image" name="story_image" class="form-control" onchange="ImagesFileAsURL(this);">

                    <br>

                    <!-- <img src="/upload/images/stories/{{$stories->story_image}}" id="old_image" alt="">
                    <input hidden name="old_image" value="{{$stories->story_image}}"> -->

                    <img src="#" id="one" hidden>
                    <div id="displayImg">

                    </div>
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    //   $('#one').hide();
    //         function ImagesFileAsURL(input) {
    //             if (input.files && input.files[0]) {
    //             var reader = new FileReader();
    //             reader.onload = function(e) {
    //                 $('#old_image').hide();
    //                 $('#one').show();
    //                 $('#one')
    //                 .attr('src', e.target.result)
    //                 .width(300)
    //                 // .height(200);
    //             };
    //             reader.readAsDataURL(input.files[0]);
    //             }
    //         }

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
