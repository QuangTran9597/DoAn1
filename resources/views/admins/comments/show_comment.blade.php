@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Comments</h3>
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
                    <th>User_name</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Rating</th>
                    <th>Created_at</th>

                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr class="odd gradeX" align="center">

                    <td> {{$comment->id}} </td>
                    <td> {{$comment->user_name}} </td>
                    <td> {{$comment->title}} </td>
                    <td> {{$comment->content}} </td>
                    <td> {{$comment->rating}} </td>
                    <td> {{$comment->created_at}} </td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                        <button type="button" class="btn btn-danger delete-lesson"
                            data-id="">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<script type="text/javascript">
// document.addEventListener('DOMContentLoaded', evt => {
//     $('.delete-lesson').click(function(e) {
//         if (confirm('Are you sure DELETE ? ')) {
//             $.ajax({
//                 url: '/lesson/' + $(this).data('id'),
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 },
//                 type: 'DELETE',
//                 success: function(result) {
//                     location.reload();
//                 }
//             });
//         }
//     });
// })
</script>
@endsection
