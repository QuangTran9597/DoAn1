@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Từ Vựng</h3>
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
                    <th>Vocabulary_Name</th>
                    <th>Vocabulary_VietSub</th>
                    <th>Vocabulary_Image</th>
                    <th>Vocabulary_Audio</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vocabularies as $vocabulary)
                <tr class="odd gradeX" align="center">
                    <td> {{ $vocabulary->id}} </td>
                    <td> {{ $vocabulary->vocabulary_name}} </td>
                    <td> {{ $vocabulary->vietsub}} </td>
                    <td><img  src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" alt="" style="width:180px"></td>

                    <td><audio controls >
                            <source src="/upload/audio/{{ $vocabulary->vocabulary_audio }}" >
                    </audio></td>

                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                    <a href="" class="btn btn-success">Edit</a></td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                    <button type="button" class="btn btn-danger delete-vocabulary" data-id="{{ $vocabulary->id }}">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ($vocabularies->previousPageUrl())
        <a class="btn btn-primary" href="{{ $vocabularies->previousPageUrl() }}">Previous</a>
        @endif

        <a class="btn btn-primary" href="{{ $vocabularies->nextPageUrl() }}">Next</a>
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
