@extends('layout')

@section('content')

<div class="navbar-register">
    <div class="logo-wrapper">To-Do</div>
</div>

<div class="form-container">
    <form class="register-login-form" action="{{ route('login') }}" method='POST'>
        @csrf
        <input type="text" name="username" placeholder="Username">
        <input type="password" name='password' placeholder="Password">
        <div class='remember-me-container'>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
        </div>
        <input class='submit' type="submit" value='Login'>

        <div class='line'></div>
        <a href="{{ route('register')}}">Create an account</a>
    </form> 
</div>

@endsection 