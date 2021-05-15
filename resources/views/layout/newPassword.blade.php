@extends('home')
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                        and we'll send you a link to reset your password!</p>
                                </div>

                                @if(session('message'))
                                <span align="center" style="color:darkcyan; " class="notification alert-danger">
                                    <h5>{{ session('message')}}</h5>
                                </span>

                                @endif
                                <form class="user" action="{{ route('post.newPassword', $id)}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $id}}">


                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password"  placeholder="Password..." name="password" >
                                    </div>

                                    @error('password')
                                    <div class="arlet alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="repeate_password"  placeholder="Repeat Password..." name="repeat_password">
                                    </div>

                                    @error('repeat_password')
                                    <div class="arlet alert-danger">{{$message}}</div>
                                    @enderror


                                    <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register')}}">Create an Account!</a>
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

    </div>

    @endsection
