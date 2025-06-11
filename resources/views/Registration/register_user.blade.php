<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Public User Registration</title>
</head>
<body>
    <h2>Public User Registration</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <label>Full Name:</label>
        <input type="text" name="PU_Name" value="{{ old('PU_Name') }}" required><br>

        <label>IC Number:</label>
        <input type="number" name="PU_IC" value="{{ old('PU_IC') }}" required><br>

        <label>Age:</label>
        <input type="number" name="PU_Age" value="{{ old('PU_Age') }}" required><br>

        <label>Address:</label>
        <input type="text" name="PU_Address" value="{{ old('PU_Address') }}" required><br>

        <label>Email:</label>
        <input type="email" name="PU_Email" value="{{ old('PU_Email') }}" required><br>

        <label>Phone Number:</label>
        <input type="number" name="PU_PhoneNum" value="{{ old('PU_PhoneNum') }}" required><br>

        <label>Gender:</label>
        <select name="PU_Gender" required>
            <option value="">Select</option>
            <option value="Male" {{ old('PU_Gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('PU_Gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select><br>

        <label>Password:</label>
        <input type="password" name="PU_Password" required><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
