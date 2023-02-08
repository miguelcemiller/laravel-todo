@extends('layout')

@section('content')

<div class="navbar-register">
    <div class="logo-wrapper">To-Do</div>
</div>

<div class="form-container">
    <form class="register-login-form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="image-container" onclick="document.querySelector('#image-upload').click();">
            <img class='image-placeholder' src="{{ asset('images/placeholder.svg') }}" draggable="false">
        </div>
        <input id="image-upload" type="file" name="image" accept="image/*" style="display: none" />
        <input type="text" name="username" placeholder="Username">
        <input type="password" name='password' placeholder="Password">
        <input class='submit' type="submit" value='Register'>
        
        <div class='line'></div>
        <a href="{{ route('login') }}">Sign in to your account</a>
    </form>
</div>

<script src='{{ asset('js/register.js') }}'></script>

@endsection