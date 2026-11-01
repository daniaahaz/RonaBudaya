<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rona Budaya | Cultural & Heritage Events</title>
    <style>
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
            gap: 20px;
            flex-wrap: wrap;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 18px;
        }

        
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            padding: 70px 8%;
            min-height: 380px;
            background-color: #f1dfc8;
            background-image:
                linear-gradient(
                    90deg,
                    rgba(255, 248, 240, 0.98) 0%,
                    rgba(255, 248, 240, 0.92) 42%,
                    rgba(255, 248, 240, 0.08) 100%
                ),
                url("/images/cultural-hero.jpg");
            background-size: cover;
            background-position: center;
            text-align: left;
        }

        .hero-content {
            max-width: 550px;
        }

        .hero h1 {
            font-family: Georgia, serif;
            font-size: 46px;
            line-height: 1.15;
            color: #511b2a;
            margin-bottom: 18px;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.7;
            max-width: 500px;
        }

        .button {
            display: inline-block;
            background: #702638;
            color: white;
            padding: 13px 26px;
            text-decoration: none;
            border-radius: 30px;
            margin-top: 18px;
            transition: background 0.2s;
        }

        .button:hover {
            background: #511b2a;
            color: white;
        }

        @media (max-width: 700px) {
            .hero {
                padding: 55px 7%;
                min-height: 300px;
                background-position: center;
            }

            .hero h1 {
        font-size: 34px;
            }
        }


        .hero h1 {
            font-size: 42px;
            margin-bottom: 12px;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.7;
        }

        .button {
            display: inline-block;
            background: #6b2737;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 18px;
        }

        footer {
            background: #34251f;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .hero-label {
            color: #702638;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 4px;
        }

        #backToTop {
            display: none;
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: #702638;
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <strong>RONA BUDAYA</strong>
            

            <div>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/#about') }}">About</a>
                <a href="{{ route('events.index') }}">Events</a>
                <a href="{{ route('performers.index') }}">Performers</a>
                <a href="{{ url('/#contact') }}">Contact</a>

                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest

                
                @auth
                    @if (auth()->user()->UserRole === 'user')
                        <a href="{{ route('bookings.index') }}">My Bookings</a>
                        <a href="{{ route('bookings.create') }}">Book an Event</a>
                    @endif

                    @if (auth()->user()->UserRole === 'admin')
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}"
                        style="display: inline;">
                        @csrf
                        <button type="submit"
                                style="background: transparent; border: none; color: white; cursor: pointer; margin-left: 18px; font-size: 16px;">
                            Logout
                        </button>
                    </form>
                @endauth

            </div>

        </nav>
    </header>

    <main>
        
        <section class="hero">
            <div class="hero-content">
                <p class="hero-label">CELEBRATE · EXPLORE · PRESERVE</p>

                <h1>Discover Malaysia's Cultural Heritage</h1>

                <p>
                    Explore cultural celebrations, traditional performances
                    and heritage events that bring our stories to life.
                </p>

                <a href="{{ route('events.index') }}" class="button">
                    Explore Events →
                </a>
            </div>
        </section>


        <section id="about" style="padding: 40px 8%; text-align: center; min-height: 250px;">
            <h2>About Rona Budaya</h2>
            <p>
                A platform for discovering and celebrating Malaysia's
                diverse cultural and heritage events.
            </p>
        </section>

        <section id="events" style="padding: 40px 8%; text-align: center;">
            <h2>Explore Cultural Events</h2>
            <p>Discover events, performers and cultural experiences.</p>
        </section>
    </main>

    <footer id="contact">
        <p>&copy; 2026 Rona Budaya. Celebrating culture and heritage.</p>
    </footer>

    <button id="backToTop" onclick="scrollToTop()">
        Back to Top ↑
    </button>

    <script>
        const backToTopButton = document.getElementById("backToTop");

        window.onscroll = function() {
            if (document.body.scrollTop > 200 ||
                document.documentElement.scrollTop > 200) {

                backToTopButton.style.display = "block";

            } else {
                backToTopButton.style.display = "none";
            }
        };

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    </script>
</body>
</html>
