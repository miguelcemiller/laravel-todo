@extends('layout')

@section('content')

<div class="navbar-container">
    <div class="navbar-items-container flex-row">
        <div class="logo-wrapper">To-Do</div>
        <div class="profile-container flex-row">
            <img class="profile-image"
                src="{{ asset('storage/' . auth()->user()->image_filename) }}">
            <div class="profile-username-logout-wrapper">
                <div class="profile-username"><span>@</span>{{ auth()->user()->username }}</div>
                <form class="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input class='logout' type="submit" value='Logout'>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="items-container">
    @if (!count($todos))
        <div>No todos</div>
    @else
        @foreach ($todos as $todo)
        <div class="item-container flex-row">
            <form id='update-form' action="{{ route('home') }}/{{ $todo->id }}" method="POST">
                @csrf
                @method('PUT')
                <input id="checkbox-js" type="checkbox" name='is_checked' {{ $todo->is_checked ? 'checked' : '' }} >
                <input class="{{ $todo->is_checked ? 'strikethrough' : ''}}" id='update-input' type="text" name="todo" value="{{ $todo->todo }}">
                <input class='save' type="submit" value='Save'>
            </form>

            <form action="{{ route('home') }}/{{ $todo->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class='delete-button-wrapper' type="submit">
                    <img class='delete' src="{{ asset('images/delete.svg') }}" alt="delete">
                </button>
            </form>
        </div>
        @endforeach
    @endif
</div>

<div class="new-item-container-container">
    <div class="new-item-container flex-row">
        <form class='form-add' action="{{ route('home') }}" method="POST">
            @csrf
            <input type="text" name='todo' placeholder='Type something...'>
            <input class='add' type="submit" value='Add'>
        </form>
    </div>
</div>

<script src='{{ asset('js/home.js') }}'></script>

@endsection