@extends('home')
@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        @if(session('message'))
                        <span align="center" style="color:darkcyan; " class="notification alert-danger">
                            <h5>{{ session('message')}}</h5>
                        </span>

                        @endif
                        <form class="user" action="{{ route('post.register')}}" method="POST">
                            @csrf
                            <div class="form-group">

                                <div class="from-group ">
                                    <input type="text" name="name" class="form-control form-control-user" value="{{ old('name')}}" placeholder="Name">
                                    @error('name')
                                    <div class="arlet alert-danger">{{$message}}</div>
                                    @enderror
                                </div>


                            </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" value="{{old('email')}}" placeholder="Email Address">

                                    @error('email')
                                    <div class="arlet alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">

                                    @error('password')
                                    <div class="arlet alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <input type="password" name="repeat_password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">

                                    @error('repeat password')
                                    <div class="arlet alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('forgot_password')}}">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
