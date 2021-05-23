@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Chủ Đề</h3>
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
                    <th>Topic_Name</th>
                    <th>Topic_Title</th>
                    <th>Topic_Content</th>
                    <th>Topic_Image</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                <tr class="odd gradeX" align="center">
                    <td> {{ $topic->id }} </td>
                    <td> {{ $topic->topic_name }} </td>
                    <td> {{ $topic->topic_title}} </td>
                    <td> {{ $topic->topic_content}} </td>
                    <td><img style="height: 130px;" src="/upload/images/topics/{{$topic->topic_image}}" alt=""></td>

                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                        <a href="{{ route('topics.edit', $topic->id)}} " class="btn btn-success">Edit</a>
                    </td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                        <button type="button" class="btn btn-danger delete-topic" data-id="{{ $topic->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($topics->previousPageUrl())
        <a class="btn btn-primary" href="{{ $topics->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $topics->nextPageUrl() }}">Next</a>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-topic').click(function(e) {
            if (confirm('Are you sure DELETE ? ')) {
                $.ajax({
                    url: '/topics/' + $(this).data('id'),
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
