
<!DOCTYPE html>
<html>
<head>
    <title>Event Details - Rona Budaya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff8f0;
            color: #3e2925;
            margin: 0;
        }

        nav {
            background-color: #762d40;
            padding: 20px 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 25px;
        }

        .container {
            padding: 30px;
        }

        .details {
            background: white;
            padding: 25px;
            border-radius: 8px;
            max-width: 750px;
        }

        .details p {
            margin: 15px 0;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            background: #762d40;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ url('/') }}"><strong>RONA BUDAYA</strong></a>
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('events.index') }}">Events</a>
    <a href="{{ route('performers.index') }}">Performers</a>
</nav>

<div class="container">

    <h1>Event Details</h1>

    <div class="details">

        <h2>{{ $event->EventName }}</h2>

        <p><strong>Location:</strong> {{ $event->LocationName }}</p>

        <p><strong>State:</strong> {{ $event->LocationState }}</p>

        <p><strong>Address:</strong> {{ $event->LocationAddress }}</p>

        <p><strong>Date:</strong> {{ $event->EventDate }}</p>

        <p><strong>Time:</strong> {{ $event->EventTime }}</p>

        <p><strong>Description:</strong></p>
        <p>{{ $event->EventDescription }}</p>

        <p><strong>Performer:</strong>
            {{ $event->performer->PerformerName ?? 'Not assigned' }}
        </p>

        @auth
            <a href="{{ route('bookings.create') }}" class="btn">
                Book This Event
            </a>
        @else
            <p>Please log in to book this event.</p>
            <a href="{{ route('login') }}" class="btn">Login</a>
        @endauth

    </div>

    <br>

    <a href="{{ route('events.index') }}">← Back to Events</a>

</div>

</body>
</html>
