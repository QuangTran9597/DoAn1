@extends('admins.dashboard')
@section('content')
<div class="container">

    @if(session('message'))
    <span align="center" style="color:red; " class="notification alert-danger">
        <h5>{{ session('message')}}</h5>
    </span>

    @endif
    <div class="row">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Lesson_Name</th>
                    <th>Lesson_Title</th>
                    <th>Lesson_Content</th>
                    <th>Lesson_Image</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lessons as $lesson)
                <tr class="odd gradeX" align="center">
                    <td> {{$lesson->id}} </td>
                    <td> {{$lesson->lesson_name}} </td>
                    <td> {{$lesson->lesson_title}} </td>
                    <td> {{$lesson->lesson_content}} </td>
                    <td><img width="130px" src="/upload/images/{{$lesson->lesson_image}}" alt=""></td>
                    <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">View</a></td> -->
                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                        <a href="{{route('lesson.edit', $lesson->id)}} " class="btn btn-success">Edit</a>
                    </td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                        <button type="button" class="btn btn-danger delete-lesson" data-id="{{ $lesson->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($lessons->previousPageUrl())
        <a class="btn btn-primary" href="{{ $lessons->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $lessons->nextPageUrl() }}">Next</a>

    </div>



</div>
@endsection
