<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Event | Rona Budaya</title>

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
            max-width: 700px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            margin-top: 8px;
        }

        .btn {
            display: inline-block;
            background: #702b3b;
            color: white;
            padding: 12px 18px;
            border: 0;
            border-radius: 5px;
            margin-top: 22px;
            cursor: pointer;
            text-decoration: none;
        }

        .error {
            color: #b00020;
            font-size: 14px;
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
    <h1>Book a Cultural Event</h1>
    <p>Complete the form below to submit your event booking.</p>

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

    @if ($events->isEmpty())
        <p>No events are available for booking yet.</p>
        <a class="btn" href="{{ route('events.index') }}">View Events</a>
    @else
        <form method="POST" action="{{ route('bookings.store') }}" id="bookingForm">
            @csrf

            <label for="EventId">Select Event</label>
            <select id="EventId" name="EventId" required>
                <option value="">-- Select a Cultural Event --</option>

                @foreach ($events as $event)
                    <option
                        value="{{ $event->EventId }}"
                        {{ old('EventId') == $event->EventId ? 'selected' : '' }}>
                        {{ $event->EventName }} - {{ $event->LocationName }}
                    </option>
                @endforeach
            </select>

            <label for="BookingDate">Booking Date</label>
            <input
                type="date"
                id="BookingDate"
                name="BookingDate"
                value="{{ old('BookingDate') }}"
                min="{{ date('Y-m-d') }}"
                required>

            <label for="BookingNumOfTicket">Number of Tickets</label>
            <input
                type="number"
                id="BookingNumOfTicket"
                name="BookingNumOfTicket"
                value="{{ old('BookingNumOfTicket', 1) }}"
                min="1"
                required>

            <button type="submit" class="btn">Submit Booking</button>
            <a href="{{ route('events.index') }}" class="btn">Cancel</a>
        </form>
    @endif
</main>
<script>
    const bookingForm = document.getElementById("bookingForm");

    if (bookingForm) {

        bookingForm.addEventListener("submit", function(event) {

            const eventInput = document.getElementById("EventId");
            const dateInput = document.getElementById("BookingDate");
            const ticketInput = document.getElementById("BookingNumOfTicket");

            // Check whether an event is selected
            if (eventInput.value === "") {
                event.preventDefault();
                eventInput.setCustomValidity("Please select a cultural event.");
                eventInput.reportValidity();
                return;
            }

            eventInput.setCustomValidity("");

            // Check whether booking date is entered
            if (dateInput.value === "") {
                event.preventDefault();
                dateInput.setCustomValidity("Please select a booking date.");
                dateInput.reportValidity();
                return;
            }

            // Check whether booking date is in the past
            const selectedDate = new Date(dateInput.value + "T00:00:00");

            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (selectedDate < today) {
                event.preventDefault();
                dateInput.setCustomValidity("Booking date cannot be in the past.");
                dateInput.reportValidity();
                return;
            }

            dateInput.setCustomValidity("");

            // Check number of tickets
            const tickets = Number(ticketInput.value);

            if (!Number.isInteger(tickets) || tickets < 1) {
                event.preventDefault();
                ticketInput.setCustomValidity("Please enter at least 1 ticket.");
                ticketInput.reportValidity();
                return;
            }

            ticketInput.setCustomValidity("");

        });

        // Clear custom validation messages when users change input
        document.querySelectorAll("#bookingForm input, #bookingForm select")
            .forEach(function(input) {
                input.addEventListener("input", function() {
                    input.setCustomValidity("");
                });

                input.addEventListener("change", function() {
                    input.setCustomValidity("");
                });
            });
    }
</script>
</body>
</html>
