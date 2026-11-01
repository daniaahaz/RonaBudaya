
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Performer | Rona Budaya</title>
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
            text-decoration: none;
            margin-right: 20px;
        }
        main {
            max-width: 650px;
            margin: 35px auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-top: 16px;
            font-weight: bold;
        }
        input, textarea {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            margin-top: 6px;
        }
        button {
            background: #702b3b;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }
        .error {
            color: red;
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
    <h1>Edit Performer</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('performers.update', $performer->PerformerId) }}"
          method="POST">
        @csrf
        @method('PUT')

        <label for="PerformerName">Performer Name</label>
        <input type="text" id="PerformerName" name="PerformerName"
               value="{{ old('PerformerName', $performer->PerformerName) }}"
               required>

        <label for="PerformanceType">Performance Type</label>
        <input type="text" id="PerformanceType" name="PerformanceType"
               value="{{ old('PerformanceType', $performer->PerformanceType) }}"
               required>

        <label for="PerformanceDescription">Description</label>
        <textarea id="PerformanceDescription"
                  name="PerformanceDescription"
                  rows="5" required>{{ old('PerformanceDescription', $performer->PerformanceDescription) }}</textarea>

        <button type="submit">Update Performer</button>
    </form>

    <p><a href="{{ route('performers.index') }}">Cancel and go back</a></p>
</main>
</body>
</html>
