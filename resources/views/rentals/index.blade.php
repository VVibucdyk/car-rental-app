<!DOCTYPE html>
<html>
<head>
    <title>Rental List</title>
</head>
<body>
    <h1>Rental List</h1>
    <a href="{{ route('rentals.create') }}">Rent a Car</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Return Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->car->brand }} {{ $rental->car->model }}</td>
                    <td>{{ $rental->start_date }}</td>
                    <td>{{ $rental->end_date }}</td>
                    <td>{{ $rental->return_date ?? 'Not returned yet' }}</td>
                    <td>
                        @if (!$rental->return_date)
                            <form action="{{ route('rentals.return', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Return Car</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
