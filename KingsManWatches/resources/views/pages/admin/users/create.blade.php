@extends('layouts.admin')

@section('contentHeader')
    <h1>Add new user</h1>
@endsection

@section('content')
    <form id="userForm" action="{{ route('admin.users.store') }}" method="POST" class="standard-form">
        @csrf
        <div class="mb-3">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username"/>
            <span class="font-small error-message">User's username cannot contain special characters other than '_', must contain at least one alphabetical character and be between 4 and 25 characters long</span>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email"/>
            <span class="font-small error-message">name@example.com</span>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password"/>
            <span class="font-small error-message">User's password needs to be at least 6 characters long and contain at least one letter and one number</span>
        </div>
        <div class="mb-3">
            <label for="role">Role</label>
            <select class="form-control" name="role" id="role">
                @foreach($roles as $r)
                    <option @if($r->name === 'user') selected @endif value="{{ $r->id }}">{{ $r->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <input id="btnSubmit" class="btn btn-primary" type="submit" value="Submit" />
        </div>
        @include('partials.messages')
    </form>
@endsection

@section('additionalScripts')
    <script src="{{ asset('assets/js/form-validation.min.js') }}"></script>
    <script>
        const edit = false;
    </script>
    <script src="{{ asset('assets/js/admin/users.min.js') }}"></script>
@endsection
