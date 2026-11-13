<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
</head>
<body>
    <h2>Add New Student</h2>

    <!-- Validation Errors Show Karne ke Liye -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Student Create Form -->
    <form action="{{ route('students.store') }}" method="POST">
        @csrf <!-- Laravel CSRF Token (Zaroori hai) -->

        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <br>

        <div>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <br>

        <div>
            <label for="phone">Phone:</label><br>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
        </div>
        <br>

        <div>
            <label for="city_id">City:</label><br>
            <select name="city_id" id="city_id" required>
                <option value="">-- Select City --</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <button type="submit">Save Student</button>
    </form>

    <br>
    <a href="{{ route('students.index') }}">Back to Student List</a>
</body>
</html>