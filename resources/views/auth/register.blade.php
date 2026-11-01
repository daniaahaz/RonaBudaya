
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Rona Budaya</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fffaf3;
            min-height: 100vh;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* LEFT: REGISTER FORM */

        .form-panel {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: #fffaf3;
        }

        .form-content {
            width: 100%;
            max-width: 390px;
        }

        .brand {
            font-family: Georgia, serif;
            color: #702b3b;
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 3px;
            margin-bottom: 35px;
        }

        h1 {
            font-family: Georgia, serif;
            font-size: 32px;
            color: #3b2925;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #806c62;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            color: #49332e;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #dfcfc0;
            border-radius: 6px;
            background: white;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #702b3b;
            box-shadow: 0 0 0 2px rgba(112,43,59,0.12);
        }

        .error {
            color: #c0392b;
            font-size: 12px;
            margin-top: 6px;
        }

        .register-button {
            width: 100%;
            padding: 14px;
            background: #702b3b;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 8px;
            transition: 0.3s;
        }

        .register-button:hover {
            background: #511b2a;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #806c62;
            font-size: 13px;
        }

        .login-link a {
            color: #702b3b;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* RIGHT: BATIK PANEL */

        .batik-panel {
            width: 50%;
            background-image:
                linear-gradient(
                    rgba(76, 24, 40, 0.25),
                    rgba(76, 24, 40, 0.25)
                ),
                url("/images/batik-background.jpeg");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .batik-panel::before {
            content: "";
            position: absolute;
            inset: 20px;
            border: 1px solid rgba(221,180,105,0.7);
        }

        .batik-content {
            text-align: center;
            color: #fff8e9;
            max-width: 430px;
            position: relative;
            padding: 30px;
        }

        .batik-symbol {
            width: 155px;
            height: 155px;
            border-radius: 50%;
            background: #fff8e9;
            color: #702b3b;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 35px;
            font-family: Georgia, serif;
            font-size: 65px;
            border: 7px double #c69b56;
        }

        .batik-content h2 {
            font-family: Georgia, serif;
            font-size: 34px;
            letter-spacing: 3px;
            margin-bottom: 18px;
        }

        .batik-content p {
            color: #ead9bb;
            font-size: 15px;
            line-height: 1.8;
        }

        .tagline {
            color: #d9b879;
            font-size: 11px;
            letter-spacing: 4px;
            margin-top: 25px;
        }

        @media (max-width: 800px) {
            .container {
                flex-direction: column;
            }

            .form-panel {
                width: 100%;
                min-height: 100vh;
                padding: 35px 25px;
            }

            .batik-panel {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- REGISTER FORM -->

    <section class="form-panel">
        <div class="form-content">

            <div class="brand">RONA BUDAYA</div>

            <h1>Create an Account</h1>

            <p class="subtitle">
                Join Rona Budaya and discover the beauty
                of Malaysia's cultural heritage.
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <label for="name">Full Name</label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Enter your name"
                    >

                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="email">Email Address</label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        placeholder="Enter your email"
                    >

                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password">Password</label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Enter your password"
                    >

                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm your password"
                    >

                    @error('password_confirmation')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="register-button">
                    Create Account
                </button>

            </form>

            <div class="login-link">
                Already have an account?
                <a href="{{ route('login') }}">Log in</a>
            </div>

        </div>
    </section>

    <!-- BATIK DESIGN -->

    <section class="batik-panel">
        <div class="batik-content">

            <div class="batik-symbol">❀</div>

            <h2>RONA BUDAYA</h2>

            <p>
                Every pattern tells a story.
                Every tradition carries a legacy.
                Celebrate the richness of Malaysia's
                cultural heritage with us.
            </p>

            <div class="tagline">
                CELEBRATE · EXPLORE · PRESERVE
            </div>

        </div>
    </section>

</div>

</body>
</html>
