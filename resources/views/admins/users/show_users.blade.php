@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Users</h3>
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
                    <th>Name</th>
                    <th>Email_User</th>
                    <th>Quyền</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="odd gradeX" align="center">
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email}} </td>
                    <td> {{ $user->quyen}} </td>

                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                        <a href="{{ route('show_users.edit', $user->id)}} " class="btn btn-success">Edit</a>
                    </td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                        <button type="button" class="btn btn-danger delete-topic" data-id="{{ $user->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($users->previousPageUrl())
        <a class="btn btn-primary" href="{{ $users->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $users->nextPageUrl() }}">Next</a>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-topic').click(function(e) {
            if (confirm('Are you sure DELETE ? ')) {
                $.ajax({
                    url: '/show_users/' + $(this).data('id'),
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
