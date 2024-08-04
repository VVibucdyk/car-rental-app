<!DOCTYPE html>
<html>
<head>
    <title>Rent a Car</title>
</head>
<body>
    <h1>Rent a Car</h1>

    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf

        <label for="car_id">Select Car:</label>
        <select id="car_id" name="car_id" required>
            @foreach ($cars as $car)
                <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} - ${{ $car->daily_rate }} per day</option>
            @endforeach
        </select><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br>

        <button type="submit">Rent</button>
    </form>

    <a href="{{ route('rentals.index') }}">Back to List</a>
</body>
</html>
