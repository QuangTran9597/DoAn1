@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Khóa Học</h3>
<br>
@if(session('message'))
<span align="center" style="color:darkcyan; " class="notification alert-danger">
    <h5>{{ session('message')}}</h5>
</span>

@endif

<div class="container">
    <div class="row">

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Course_Name</th>
                    <th>Course_Title</th>
                    <th>Course_Content</th>

                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course as $cou)
                <tr class="odd gradeX" align="center">
                    <td> {{$cou->id}} </td>
                    <td> {{$cou->course_name}} </td>
                    <td> {{$cou->course_title}} </td>
                    <td> {{$cou->course_content}} </td>

                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                        <a href="{{route('course.edit', $cou->id)}} " class="btn btn-success">Edit</a>
                    </td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                        <button type="button" class="btn btn-danger delete-course" data-id="{{ $cou->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($course->previousPageUrl())
        <a class="btn btn-primary" href="{{ $course->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $course->nextPageUrl() }}">Next</a>
    </div>
</div>


<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-course').click(function(e) {
            if (confirm('Are you sure DELETE Course ? ')) {
                $.ajax({
                    url: '/course/' + $(this).data('id'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    success: function(result) {
                        location.reload();
                    }
                });
            }
        });
    })
</script>
@endsection
