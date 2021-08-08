@extends('auth.app.layout')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="'index2.html'" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if($errors->any())
            <input type="hidden" value="@if($errors->first()) 1 @else 0 @endif" id="check">
        @endif
        <?php
        echo $errors->first();
        ?>
        <form action="{{url('login-check')}}" method="post" >
            @csrf
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    {{-- <div class="icheck-primary">
                         <input type="checkbox" id="remember">
                         <label for="remember">
                             Remember Me
                         </label>
                     </div>--}}
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mb-1">
            <a href="{{url('forgot')}}">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="{{url('registration')}}" class="text-center">Register a new membership</a>
        </p>
    </div>
    <!-- /.card-body -->
</div>
@endsection
