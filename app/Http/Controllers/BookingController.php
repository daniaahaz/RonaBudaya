<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display the booking form.
     */
    public function create()
    {
        $events = Event::all();

        return view('bookings.create', compact('events'));
    }


    /**
     * Display bookings for the logged-in user.
     */
    public function index(Request $request)
    {
        $query = Auth::user()
            ->bookings()
            ->with('event')
            ->orderByDesc('BookingId');

        // Search bookings by event name
        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('event', function ($eventQuery) use ($search) {
                $eventQuery->where('EventName', 'like', "%{$search}%");
            });
        
        }

        // Filter bookings by status
        if ($request->filled('status')) {
            $query->where('BookingStatus', $request->status);
        }

        $bookings = $query->get();

        // Get available booking statuses for this user
        $statuses = Auth::user()
            ->bookings()
            ->select('BookingStatus')
            ->distinct()
            ->pluck('BookingStatus');

        return view('bookings.index', compact('bookings', 'statuses'));
    }


    /**
     * Save a new booking.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'EventId' => ['required', 'exists:events,EventId'],
            'BookingDate' => ['required', 'date'],
            'BookingNumOfTicket' => ['required', 'integer', 'min:1'],
        ]);

        Booking::create([
            'UserId' => Auth::user()->UserId,
            'EventId' => $validated['EventId'],
            'BookingDate' => $validated['BookingDate'],
            'BookingNumOfTicket' => $validated['BookingNumOfTicket'],
            'BookingStatus' => 'Pending',
            'BookingCreatedTime' => now(),
            'BookingStatusTime' => now(),
        ]);

        return redirect('/')
            ->with('success', 'Your event booking has been submitted successfully.');
    }

    
    /**
    * Display the edit booking form.
    */
    public function edit($id)
    {
        $booking = Auth::user()
            ->bookings()
            ->with('event')
            ->findOrFail($id);

        return view('bookings.edit', compact('booking'));
    }

    /**
    * Update an existing booking.
    */
    public function update(Request $request, $id)
    {
        $booking = Auth::user()
            ->bookings()
            ->findOrFail($id);

        $validated = $request->validate([
            'BookingDate' => ['required', 'date'],
            'BookingNumOfTicket' => ['required', 'integer', 'min:1'],
        ]);

        $booking->BookingDate = $validated['BookingDate'];
        $booking->BookingNumOfTicket = $validated['BookingNumOfTicket'];

        $booking->save();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }


    /**
    * Delete an existing booking.
    */
    public function destroy($id)
    {
        $booking = Auth::user()
            ->bookings()
            ->findOrFail($id);

        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }

}
