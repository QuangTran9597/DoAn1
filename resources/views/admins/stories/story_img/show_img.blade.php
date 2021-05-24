@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Hình Ảnh</h3>
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
                    <th>Story_id</th>
                    <th>Image_name</th>
                    <th>Vietsub</th>
                    <th>Image</th>
                    <th>Image_Audio</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                <tr class="odd gradeX" align="center">
                    <td> {{ $image->id}} </td>
                    <td> {{ $image->story_id}} </td>
                    <td> {{ $image->image_name}} </td>
                    <td> {{ $image->vietsub}} </td>

                    <td><img  src="/upload/images/stories/story_img/{{ $image->image}}" alt="" style="width:180px"></td>

                    <td><audio controls >
                            <source src="/upload/audio/story/{{ $image->image_audio }}" >
                    </audio></td>

                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                    <a href="" class="btn btn-success">Edit</a></td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                    <button type="button" class="btn btn-danger delete-vocabulary" data-id="{{ $image->id }}">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($images->previousPageUrl())
        <a class="btn btn-primary" href="{{ $images->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $images->nextPageUrl() }}">Next</a>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-lesson').click(function (e)  {
            if(confirm('Are you sure DELETE ? ')) {
                $.ajax({
                    url: '/lesson/' + $(this).data('id'),
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
