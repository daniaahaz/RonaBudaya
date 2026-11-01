<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | Rona Budaya</title>

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

        .btn {
            display: inline-block;
            background: #702b3b;
            color: white;
            padding: 10px 15px;
            border: 0;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        input {
            padding: 10px;
            width: 240px;
            max-width: 90%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        th, td {
            border: 1px solid #e5d5c9;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f1dfcc;
        }

        .message {
            background: #e5f5e5;
            padding: 12px;
        }
    </style>
</head>

<body>
<header>
    <strong>RONA BUDAYA</strong>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('events.index') }}">Events</a>
    <a href="{{ route('performers.index') }}">Performers</a>
</header>

<main>
    <h1>Cultural Events</h1>

    <p>Discover and manage Malaysia's cultural and heritage events.</p>

    @if(session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif

    
    @auth
        @if (auth()->user()->UserRole === 'admin')
            <a class="btn" href="{{ route('events.create') }}">
                + Add Event
            </a>
        @endif
    @endauth


    <form method="GET"
          action="{{ route('events.index') }}"
          style="margin-top: 25px;">

        <input
            type="text"
            name="search"
            placeholder="Search event name or location"
            value="{{ request('search') }}">

        <button class="btn" type="submit">Search</button>

        <a href="{{ route('events.index') }}">Reset</a>
    </form>

    @if($events->isEmpty())
        <p>No cultural events found. Add your first event.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Location</th>
                    <th>State</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Performer</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->EventName }}</td>
                        <td>{{ $event->LocationName }}</td>
                        <td>{{ $event->LocationState }}</td>
                        <td>{{ $event->EventDate }}</td>
                        <td>{{ $event->EventTime }}</td>
                        <td>
                            {{ $event->performer->PerformerName ?? 'Not assigned' }}
                        </td>
                        <td>
                            
                            <a href="{{ route('events.show', $event->EventId) }}">View</a>

                            @auth
                                @if (auth()->user()->UserRole === 'admin')
        
                                    <a href="{{ route('events.edit', $event->EventId) }}">Edit</a>
        
                                    <form method="POST"
                                          action="{{ route('events.destroy', $event->EventId) }}"
                                          style="display: inline;"
                                          onsubmit="return confirm('Delete this event?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">Delete</button>
                                    </form>
                                @endif
                            @endauth

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
