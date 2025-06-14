@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Public User Registration</h2>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="PU_Name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="PU_Email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="PU_Password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirm Password:</label>
            <input type="password" name="PU_Password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
