
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event | Rona Budaya</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff8f0;
            color: #34251f;
        }

        header {
            background: #6b2737;
            color: white;
            padding: 22px 8%;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 750px;
            margin: 45px auto;
            padding: 35px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading h1 {
            font-family: Arial, sans-serif;
            color: #6b2737;
            margin-bottom: 10px;
        }

        .heading p {
            color: #806d64;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #511b2a;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d8c5bd;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            background: #fffdfb;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #6b2737;
            box-shadow: 0 0 4px rgba(107,39,55,0.2);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 6px;
        }

        .alert {
            background: #fce8e6;
            color: #a12622;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            padding: 13px 22px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
        }

        .btn-update {
            background: #6b2737;
            color: white;
            flex: 1;
        }

        .btn-update:hover {
            background: #511b2a;
        }

        .btn-cancel {
            background: #eee3dc;
            color: #511b2a;
        }

        .btn-cancel:hover {
            background: #dfcfc5;
        }

        footer {
            background: #34251f;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 22px;
            }

            nav {
                flex-direction: column;
                gap: 15px;
            }

            nav a {
                margin: 5px;
            }
        }
    </style>
</head>

<body>

<header>
    <nav>
        <strong>RONA BUDAYA</strong>

        <div>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('events.index') }}">Events</a>
            <a href="{{ route('performers.index') }}">Performers</a>
        </div>
    </nav>
</header>

<div class="container">

    <div class="heading">
        <h1>Edit Cultural Event</h1>
        <p>Update the information of your cultural and heritage event.</p>
    </div>

    @if ($errors->any())
        <div class="alert">
            Please check the form and correct the errors below.
        </div>
    @endif

    <form action="{{ route('events.update', $event->EventId) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Event Name</label>
            <input type="text" name="EventName"
                value="{{ old('EventName', $event->EventName) }}" required>
            @error('EventName')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Location Name</label>
            <input type="text" name="LocationName"
                value="{{ old('LocationName', $event->LocationName) }}" required>
            @error('LocationName')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>State</label>
            <input type="text" name="LocationState"
                value="{{ old('LocationState', $event->LocationState) }}" required>
            @error('LocationState')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Location Address</label>
            <input type="text" name="LocationAddress"
                value="{{ old('LocationAddress', $event->LocationAddress) }}" required>
            @error('LocationAddress')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Performer</label>
            <select name="PerformerId" required>
                @foreach ($performers as $performer)
                    <option value="{{ $performer->PerformerId }}"
                        {{ old('PerformerId', $event->PerformerId) == $performer->PerformerId ? 'selected' : '' }}>
                        {{ $performer->PerformerName }}
                    </option>
                @endforeach
            </select>
            @error('PerformerId')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Event Date</label>
            <input type="date" name="EventDate"
                value="{{ old('EventDate', $event->EventDate) }}" required>
            @error('EventDate')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Event Time</label>
            <input type="time" name="EventTime"
                value="{{ old('EventTime', substr($event->EventTime, 0, 5)) }}" required>
            @error('EventTime')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Event Description</label>
            <textarea name="EventDescription" required>{{ old('EventDescription', $event->EventDescription) }}</textarea>
            @error('EventDescription')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="buttons">
            <button type="submit" class="btn btn-update">
                Update Event
            </button>

            <a href="{{ route('events.index') }}" class="btn btn-cancel">
                Cancel
            </a>
        </div>

    </form>
</div>

<footer>
    <p>&copy; 2026 Rona Budaya. Celebrating Culture and Heritage.</p>
</footer>

</body>
</html>
