@extends('auth.master')

@section('content')

<div class="containier-fluid p-5">
    <div class="row justify-content-md-center">
        <div class="col-sm-5 col-sm-offset-4">
            <h1 class="text-center text-primary">Register</h1>
            <form action="{{ route('register-user') }}" method="post">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="Username"
                    value="{{old('username')}}">
                </div>
                <small class="text-danger">@error('username') {{$message}} @enderror</small>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="text" class="form-control" name="email" placeholder="Enter Valid email"
                    value="{{old('email')}}">
                </div>
                <small class="text-danger">@error('email') {{$message}} @enderror</small>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password"
                    value="{{old('password')}}">
                </div>
                <small class="text-danger">@error('password') {{$message}} @enderror</small>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                    <input type="password" class="form-control" name="cpassword" placeholder="Comfirm Password"
                    value="{{old('cpassword')}}">
                </div>
                <small class="text-danger">@error('cpassword') {{$message}} @enderror</small>
                <div class="input-group">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
                <div class="input-group">
                    <p class="">Already have an account?<a href="login" style="text-decoration:none;"> Login Here</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection