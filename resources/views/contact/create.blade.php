
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Rona Budaya</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff8f0;
            color: #432b25;
        }

        header {
            background: #682f35;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 650px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #682f35;
        }

        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #d8c5bd;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            height: 140px;
            resize: vertical;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 13px;
            background: #682f35;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #85464b;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            background: #e2f5e5;
            color: #246b35;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #682f35;
        }
    </style>
</head>

<body>

<header>
    <h1>Rona Budaya</h1>
    <p>Contact Us</p>
</header>

<div class="container">

    <h2>Send Us a Message</h2>
    <p>Have a question or suggestion? We would love to hear from you.</p>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <label>Your Name</label>
        <input type="text" name="ContactName"
            value="{{ old('ContactName', auth()->user()->UserName) }}">
        @error('ContactName')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Email Address</label>
        <input type="email" name="ContactEmail"
            value="{{ old('ContactEmail', auth()->user()->UserEmail) }}">
        @error('ContactEmail')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Subject</label>
        <input type="text" name="ContactSubject"
            value="{{ old('ContactSubject') }}">
        @error('ContactSubject')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Message</label>
        <textarea name="ContactMessage">{{ old('ContactMessage') }}</textarea>
        @error('ContactMessage')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Submit Message</button>
    </form>

    <a href="{{ url('/') }}" class="back">Back to Home</a>

</div>

</body>
</html>
