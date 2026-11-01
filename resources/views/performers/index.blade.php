<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performers | Rona Budaya</title>
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
            padding: 8px 14px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 12px;
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
        .actions form {
            display: inline;
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
    <h1>Performers</h1>
    <p>Manage the traditional performers featured in Rona Budaya events.</p>

    @if (session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif

    
    @auth
        @if (auth()->user()->UserRole === 'admin')
            <a class="btn" href="{{ route('performers.create') }}">+ Add Performer</a>
        @endif
    @endauth


    
    <form action="{{ route('performers.index') }}" method="GET">
        <input
            type="text"
            name="search"
            placeholder="Search performer name or type"
            value="{{ request('search') }}"
        >

        <button type="submit">Search</button>

        <a href="{{ route('performers.index') }}">Reset</a>
    </form>


    @if ($performers->isEmpty())
        <p>No performers found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Performance Type</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($performers as $performer)
                    <tr>
                        <td>{{ $performer->PerformerName }}</td>
                        <td>{{ $performer->PerformanceType }}</td>
                        <td>{{ $performer->PerformanceDescription }}</td>
                        <td class="actions">
                            
                            <a href="{{ route('performers.show', $performer->PerformerId) }}">View</a>

                            @auth
                                @if (auth()->user()->UserRole === 'admin')
        
                                    <a href="{{ route('performers.edit', $performer->PerformerId) }}">Edit</a>
        
                                    <form
                                        method="POST"
                                        action="{{ route('performers.destroy', $performer->PerformerId) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this performer?')"
                                    >
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
