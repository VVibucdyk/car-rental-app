<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>
<body>
    <h1>Edit Car</h1>

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" value="{{ $car->brand }}" required><br>

        <label for="model">Model:</label>
        <input type="text" id="model" name="model" value="{{ $car->model }}" required><br>

        <label for="license_plate">License Plate:</label>
        <input type="text" id="license_plate" name="license_plate" value="{{ $car->license_plate }}" required><br>

        <label for="daily_rate">Daily Rate:</label>
        <input type="number" id="daily_rate" name="daily_rate" value="{{ $car->daily_rate }}" step="0.01" required><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('cars.index') }}">Back to List</a>
</body>
</html>
