<!DOCTYPE html>
<html>
<head>
    <title>Cars List</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>
<body>
    <h1>Cars List</h1>
    <a href="{{ route('cars.create') }}">Add New Car</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>License Plate</th>
                <th>Daily Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->license_plate }}</td>
                    <td>${{ $car->daily_rate }}</td>
                    <td>
                        <a href="{{ route('cars.show', $car->id) }}">View</a>
                        <a href="{{ route('cars.edit', $car->id) }}">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
