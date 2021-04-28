@extends('admins.dashboard')
@section('content')
<h3 align="center">Danh Sách Các Khóa Học</h3>
<br>
<div class="container">
    <div class="row">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

         <thead>
             <tr align="center">
                <th>ID</th>
                <th>Course_Name</th>
                <th>Course_Title</th>
                <th>Course_Content</th>
                <th>View</th>
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
                 <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">View</a></td>
                 <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Sửa</a></td>
                 <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="">Xóa</a></td>
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
@endsection
