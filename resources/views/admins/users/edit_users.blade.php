@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-6 ">
            <h3>Edit User</h3>
            <form action="{{route('show_users.update', $users->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control"  name="name" require="" value="{{ $users->name}}">
                    <div id="" class="form-text"></div>

                    @error('name')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control"  name="email" require="" value="{{ $users->email}}">
                    <div id="" class="form-text"></div>

                    @error('email')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control"  name="password" require="">
                    <div id="" class="form-text"></div>

                    @error('password')
                    <div class="arlet alert-danger">{{$message}}</div>
                    @enderror
                </div>


                <label for="course_content">Quyền User</label>
                <select class="form-select" aria-label="Default select example" name="quyen">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>

                <hr>

                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
        <div class="col col-sm-6">

        </div>
    </div>
</div>
@endsection
