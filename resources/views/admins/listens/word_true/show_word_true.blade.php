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
                    <th>Listen_audio_id</th>
                    <th>Word_true</th>
                    <th>Status_true</th>
                    <th>Word_false</th>
                    <th>Status_false</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($words as $word)
                <tr class="odd gradeX" align="center">
                    <td> {{$word->id}} </td>
                    <td> {{$word->listen_audio_id}} </td>
                    <td> {{$word->word_true}} </td>
                    <td> {{$word->status_true}} </td>
                    <td> {{$word->word_false}} </td>
                    <td> {{$word->status_false}} </td>


                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                    <a href="{{route('word_true.edit', $word->id)}} " class="btn btn-success">Edit</a></td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                    <button type="button" class="btn btn-danger delete-lesson" data-id="{{ $word->id }}">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($words->previousPageUrl())
        <a class="btn btn-primary" href="{{ $words->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $words->nextPageUrl() }}">Next</a>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', evt => {
        $('.delete-lesson').click(function (e)  {
            if(confirm('Are you sure DELETE ? ')) {
                $.ajax({
                    url: '/word_true/' + $(this).data('id'),
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
