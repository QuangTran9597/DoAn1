@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Update Bài Học</h3>
            <br>

            <form action="{{ route('lesson.update', $lessons->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="cars">Chọn khóa học</label>
                    <select name="course_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        @foreach ($courses as $course)
                        <option value="{{ $course->id}}" {{ $course->lessons->contains($course->id) }} ? 'selected' : ''>
                            {{ $course->course_name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Lesson_Name</label>
                    <input type="text" class="form-control" name="lesson_name" require="" value="{{ $lessons->lesson_name}}">
                    <div class="form-text"></div>

                    @error('lesson_name')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lesson_title">Lesson_Title</label>
                    <textarea class="form-control" name="lesson_title" placeholder="" rows="3">{{$lessons->lesson_title}}</textarea>
                    <span class="custom-file-control"></span>

                    @error('lesson_title')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lesson_content">Lesson_Content</label>
                    <textarea class="form-control" name="lesson_content" placeholder="" rows="4">{{$lessons->lesson_content}}</textarea>

                    <span class="custom-file-control"></span>

                    @error('lesson_content')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Lesson_Image</label>
                    <input type="file" id="lesson_image" name="lesson_image" class="form-control" onchange="ImagesFileAsURL()">

                    <br>

                    <div id="displayImg">
                        <!-- <img src="/upload/images/{{$lessons->lesson_image}}" alt=""> -->
                    </div>
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>

<script type="text/javascript">
    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('lesson_image').files;
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
