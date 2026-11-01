<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Performer | Rona Budaya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff8f0;
            color: #3b2925;
            margin: 0;
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
            max-width: 650px;
            margin: 35px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
        }
        input, textarea, select {
            box-sizing: border-box;
            width: 100%;
            padding: 11px;
            margin-top: 7px;
        }
        button, .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 16px;
            border: 0;
            border-radius: 5px;
            background: #702b3b;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .error {
            color: #b00020;
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
    <h1>Add Performer</h1>
    <p>Enter the details of a cultural performer.</p>

    @if ($errors->any())
        <div class="error">
            <p>Please correct the following errors:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('performers.store') }}" method="POST">
        @csrf

        <label for="PerformerName">Performer Name</label>
        <input
            type="text"
            id="PerformerName"
            name="PerformerName"
            value="{{ old('PerformerName') }}"
            required
        >

        <label for="PerformanceType">Performance Type</label>
        <input
            type="text"
            id="PerformanceType"
            name="PerformanceType"
            value="{{ old('PerformanceType') }}"
            placeholder="Example: Traditional Dance"
            required
        >

        <label for="PerformanceDescription">Performance Description</label>
        <textarea
            id="PerformanceDescription"
            name="PerformanceDescription"
            rows="5"
            required
        >{{ old('PerformanceDescription') }}</textarea>

        <button type="submit">Save Performer</button>
        <a class="btn" href="{{ route('performers.index') }}">Cancel</a>
    </form>
</main>
</body>
</html>
