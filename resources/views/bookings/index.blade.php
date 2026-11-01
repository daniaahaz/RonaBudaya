<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings | Rona Budaya</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff8f0;
            color: #3b2925;
        }

        header {
            background: #702b3b;
            color: white;
            padding: 20px 6%;
        }

        header a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        main {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #e5d5c9;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f1dfcc;
        }

        .btn {
            display: inline-block;
            background: #702b3b;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<header>
    <strong>RONA BUDAYA</strong>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('events.index') }}">Events</a>
    <a href="{{ route('bookings.create') }}">Book an Event</a>
</header>

<main>
    <h1>My Bookings</h1>
    <p>View your cultural event booking history.</p>

    <a class="btn" href="{{ route('bookings.create') }}">
        + Book an Event
    </a>

    <form method="GET" action="{{ route('bookings.index') }}"
        style="margin-top: 20px; margin-bottom: 20px;">

        <input
            type="text"
            name="search"
            placeholder="Search event name..."
            value="{{ request('search') }}"
            style="padding: 10px; width: 250px;"
        >

        <select name="status" style="padding: 10px;">
            <option value="">All Statuses</option>

            @foreach($statuses as $status)
                <option value="{{ $status }}"
                    {{ request('status') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn">Search / Filter</button>

        <a href="{{ route('bookings.index') }}">Reset</a>
    </form>

    @if($bookings->isEmpty())
        <p>You have not made any bookings yet.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Booking Date</th>
                    <th>Number of Tickets</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>
                            {{ $booking->event
                                ? $booking->event->EventName
                                : 'Event unavailable' }}
                        </td>
                        <td>{{ $booking->BookingDate }}</td>
                        <td>{{ $booking->BookingNumOfTicket }}</td>
                        <td>{{ $booking->BookingStatus }}</td>

                        <td>
                            <a href="{{ route('bookings.edit', $booking->BookingId) }}">
                                Edit
                            </a>

                            <form method="POST"
                                action="{{ route('bookings.destroy', $booking->BookingId) }}"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this booking?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p><a href="{{ url('/') }}">Back to Home</a></p>
</main>

</body>
</html>
