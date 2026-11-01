
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking - Rona Budaya</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff8f0;
            color: #34251f;
            margin: 0;
        }

        nav {
            background: #6b2737;
            padding: 22px 8%;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .container {
            background: white;
            max-width: 850px;
            margin: 50px auto;
            padding: 35px;
            border-radius: 10px;
        }

        h1 {
            color: #511b2a;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            box-sizing: border-box;
        }

        button {
            background: #702638;
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 25px;
        }

        .cancel {
            margin-left: 10px;
            color: #702638;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<nav>
    <a href="{{ url('/') }}"><strong>RONA BUDAYA</strong></a>
    <a href="{{ route('events.index') }}">Events</a>
    <a href="{{ route('performers.index') }}">Performers</a>
    <a href="{{ route('bookings.index') }}">My Bookings</a>
</nav>

<div class="container">

    <h1>Edit Booking</h1>

    <p>Update your booking information below.</p>

    <p>
        <strong>Event:</strong>
        {{ $booking->event->EventName ?? 'Event unavailable' }}
    </p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('bookings.update', $booking->BookingId) }}">

        @csrf
        @method('PUT')

        <label for="BookingDate">Booking Date</label>

        <input
            type="date"
            id="BookingDate"
            name="BookingDate"
            value="{{ old('BookingDate', $booking->BookingDate) }}"
            required
        >

        <label for="BookingNumOfTicket">Number of Tickets</label>

        <input
            type="number"
            id="BookingNumOfTicket"
            name="BookingNumOfTicket"
            min="1"
            value="{{ old('BookingNumOfTicket', $booking->BookingNumOfTicket) }}"
            required
        >

        <button type="submit">Update Booking</button>

        <a href="{{ route('bookings.index') }}" class="cancel">
            Cancel
        </a>

    </form>

</div>

</body>
</html>
