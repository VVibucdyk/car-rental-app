<!DOCTYPE html>
<html>
<head>
    <title>Car Details</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>
<body>
    <h1>Car Details</h1>

    <p><strong>Brand:</strong> {{ $car->brand }}</p>
    <p><strong>Model:</strong> {{ $car->model }}</p>
    <p><strong>License Plate:</strong> {{ $car->license_plate }}</p>
    <p><strong>Daily Rate:</strong> ${{ $car->daily_rate }}</p>

    <a href="{{ route('cars.edit', $car->id) }}">Edit</a>
    <a href="{{ route('cars.index') }}">Back to List</a>
</body>
</html>
