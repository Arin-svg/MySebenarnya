<!-- resources/views/PublicUserRegistration.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Public User Registration</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="PU_Name" placeholder="Name" value="{{ old('PU_Name') }}" required>
        <input type="text" name="PU_IC" placeholder="IC Number" value="{{ old('PU_IC') }}" required>
        <input type="number" name="PU_Age" placeholder="Age" value="{{ old('PU_Age') }}" required>
        <input type="text" name="PU_Address" placeholder="Address" value="{{ old('PU_Address') }}" required>
        <input type="email" name="PU_Email" placeholder="Email" value="{{ old('PU_Email') }}" required>
        <input type="text" name="PU_PhoneNum" placeholder="Phone Number" value="{{ old('PU_PhoneNum') }}" required>
        <select name="PU_Gender" required>
            <option value="">Select Gender</option>
            <option value="Male" {{ old('PU_Gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('PU_Gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        <input type="password" name="PU_Password" placeholder="Password" required>
        <input type="file" name="PU_ProfilePicture">

        <button type="submit">Register</button>
    </form>
</div>
@endsection
