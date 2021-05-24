@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Truyện</h3>
<br>
@if(session('message'))
    <span  align="center" style="color:darkcyan; " class="notification alert-danger">
        <h5>{{ session('message')}}</h5>
    </span>

@endif

<div class="container">
    <div class="row">

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Story_Name</th>
                    <th>Story_Title</th>
                    <th>Story_Content</th>
                    <th>Story_Image</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stories as $story)
                <tr class="odd gradeX" align="center">
                    <td> {{$story->id}} </td>
                    <td> {{$story->story_name}} </td>
                    <td> {{$story->story_title}} </td>
                    <td> {{$story->story_content}} </td>
                    <td><img  src="/upload/images/stories/{{$story->story_image}}" alt=""></td>
                    <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">View</a></td> -->
                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                    <a href="{{route('story.edit', $story->id)}} " class="btn btn-success">Edit</a></td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                    <button type="button" class="btn btn-danger delete-lesson" data-id="{{ $story->id }}">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($stories->previousPageUrl())
        <a class="btn btn-primary" href="{{ $stories->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $stories->nextPageUrl() }}">Next</a>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-lesson').click(function (e)  {
            if(confirm('Are you sure DELETE ? ')) {
                $.ajax({
                    url: '/story/' + $(this).data('id'),
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
