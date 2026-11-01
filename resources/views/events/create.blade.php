
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event | Rona Budaya</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff8f0;
            color: #35251f;
        }

        header {
            background: #702b3a;
            color: white;
            padding: 20px 6%;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        main {
            max-width: 750px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px #00000012;
        }

        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font: inherit;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            margin-top: 22px;
            padding: 11px 18px;
            border: none;
            border-radius: 5px;
            background: #702b3a;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
        }

        .cancel {
            background: #777;
            margin-left: 8px;
        }

        .error {
            color: #b00020;
            font-size: 14px;
        }

        .alert {
            padding: 12px;
            background: #ffe4e4;
            border-radius: 5px;
        }

        footer {
            margin-top: 40px;
            padding: 20px;
            background: #702b3a;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <strong>RONA BUDAYA</strong>
    <nav style="margin-top: 12px">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('events.index') }}">Events</a>
    </nav>
</header>

<main>
    <h1>Add a Cultural Event</h1>
    <p>Enter the details of the cultural or heritage event below.</p>

    @if ($errors->any())
        <div class="alert">
            <strong>Please correct the following:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <label for="EventName">Event Name</label>
        <input
            type="text"
            id="EventName"
            name="EventName"
            value="{{ old('EventName') }}"
            required
        >

        <label for="LocationName">Location Name</label>
        <input
            type="text"
            id="LocationName"
            name="LocationName"
            value="{{ old('LocationName') }}"
            required
        >

        <label for="LocationState">State</label>
        <input
            type="text"
            id="LocationState"
            name="LocationState"
            value="{{ old('LocationState') }}"
            required
        >

        <label for="LocationAddress">Full Address</label>
        <input
            type="text"
            id="LocationAddress"
            name="LocationAddress"
            value="{{ old('LocationAddress') }}"
            required
        >

        <label for="PerformerId">Performer</label>
        <select id="PerformerId" name="PerformerId" required>
            <option value="">-- Select a Performer --</option>

            @foreach ($performers as $performer)
                <option
                    value="{{ $performer->PerformerId }}"
                    {{ old('PerformerId') == $performer->PerformerId ? 'selected' : '' }}
                >
                    {{ $performer->PerformerName }}
                </option>
            @endforeach
        </select>

        @if ($performers->isEmpty())
            <p class="error">
                No performers are available. Add a performer before creating an event.
            </p>
        @endif

        <label for="EventDate">Event Date</label>
        <input
            type="date"
            id="EventDate"
            name="EventDate"
            value="{{ old('EventDate') }}"
            required
        >

        <label for="EventTime">Event Time</label>
        <input
            type="time"
            id="EventTime"
            name="EventTime"
            value="{{ old('EventTime') }}"
            required
        >

        <label for="EventDescription">Description</label>
        <textarea
            id="EventDescription"
            name="EventDescription"
            required
        >{{ old('EventDescription') }}</textarea>

        <button class="btn" type="submit">Save Event</button>
        <a class="btn cancel" href="{{ route('events.index') }}">Cancel</a>
    </form>
</main>

<footer>
    <p>&copy; {{ date('Y') }} Rona Budaya. Celebrating Malaysia's Heritage.</p>
</footer>

</body>
</html>
