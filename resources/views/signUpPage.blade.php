@extends('master')
@section('content')

<div class="container">
    <form action="/signupAuth" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">User Name</label>
            <input type="text" name="userName" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <a href="/login">
                Already have an account?
            </a>
        </div>
        @if (session('status'))
        <div class="alert alert-warning" role="alert">
            Error! {{ session('status') }}
        </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
