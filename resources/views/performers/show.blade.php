
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performer Details | Rona Budaya</title>

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
            margin: 50px auto;
            padding: 35px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            font-family: Arial, sans-serif;
            color: #6b2737;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #806d64;
            margin-bottom: 30px;
        }

        .detail {
            padding: 15px 0;
            border-bottom: 1px solid #eee2d9;
            line-height: 1.6;
        }

        .detail strong {
            display: block;
            color: #6b2737;
            margin-bottom: 5px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #6b2737;
            color: white;
        }

        .btn-primary:hover {
            background: #511b2a;
        }

        .btn-secondary {
            background: #eee3dc;
            color: #511b2a;
        }

        footer {
            background: #34251f;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 60px;
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

    <h1>Performer Details</h1>
    <p class="subtitle">
        Discover the performers behind Malaysia's cultural heritage.
    </p>

    <div class="detail">
        <strong>Performer ID</strong>
        {{ $performer->PerformerId }}
    </div>

    <div class="detail">
        <strong>Performer Name</strong>
        {{ $performer->PerformerName }}
    </div>

    <div class="detail">
        <strong>Performance Type</strong>
        {{ $performer->PerformanceType }}
    </div>

    <div class="detail">
        <strong>Description</strong>
        {{ $performer->PerformanceDescription }}
    </div>

    <div class="buttons">
        @if (auth()->check() && auth()->user()->UserRole === 'admin')
            <a class="btn btn-primary"
               href="{{ route('performers.edit', $performer->PerformerId) }}">
                Edit Performer
            </a>
        @endif

        <a class="btn btn-secondary"
           href="{{ route('performers.index') }}">
            Back to Performers
        </a>
    </div>

</div>

<footer>
    <p>&copy; 2026 Rona Budaya. Celebrating Culture and Heritage.</p>
</footer>

</body>
</html>
