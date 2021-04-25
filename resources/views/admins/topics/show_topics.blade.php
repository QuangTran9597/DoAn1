@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

         <thead>
             <tr align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Sửa</th>
                <th>Xóa</th>
             </tr>
         </thead>
         <tbody>
            @foreach($topics as $img)
              <tr class="odd gradeX" align="center">
                 <td>{{$img->id}}</td>
                 <td>{{$img->name_topic}}</td>
                 <td><img width="130px" src="/upload/images/{{$img->image_path}}" alt=""></td>
                 <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Sửa</a></td>
                 <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="">Xóa</a></td>
                 </tr>
              @endforeach
          </tbody>
     </table>
    </div>
</div>
@endsection
