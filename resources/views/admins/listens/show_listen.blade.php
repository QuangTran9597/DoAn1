@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Bài Nghe</h3>
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
                    <th>Topic_id</th>
                    <th>Listen_name</th>
                    <th>Listen_audio</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listens as $listen)
                <tr class="odd gradeX" align="center">
                    <td> {{$listen->id}} </td>
                    <td> {{$listen->topic_id}} </td>
                    <td> {{$listen->listen_name}} </td>

                    <td><audio controls >
                            <source src="/upload/audio/listen/{{ $listen->listen_audio }}" >
                    </audio></td>


                    <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">View</a></td> -->
                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                    <a href="{{route('listen.edit', $listen->id)}} " class="btn btn-success">Edit</a></td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                    <button type="button" class="btn btn-danger delete-lesson" data-id="{{ $listen->id }}">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($listens->previousPageUrl())
        <a class="btn btn-primary" href="{{ $listens->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $listens->nextPageUrl() }}">Next</a>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-lesson').click(function (e)  {
            if(confirm('Are you sure DELETE ? ')) {
                $.ajax({
                    url: '/listen/' + $(this).data('id'),
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
