<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PerformerInfo;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search');

        $eventsQuery = Event::with('performer');

        if ($search) {
            $eventsQuery->where(function ($query) use ($search) {
                $query->where('EventName', 'like', '%' . $search . '%')
                    ->orWhere('LocationName', 'like', '%' . $search . '%')
                    ->orWhere('LocationState', 'like', '%' . $search . '%');
            });
        }

        $events = $eventsQuery->get();
        $performers = PerformerInfo::all();

        return view('events.index', compact('events', 'performers', 'search'));
    }


    public function create()
    {
        $performers = PerformerInfo::all();

        return view('events.create', compact('performers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'EventName' => 'required|string|max:255',
            'LocationName' => 'required|string|max:255',
            'LocationState' => 'required|string|max:255',
            'LocationAddress' => 'required|string|max:255',
            'PerformerId' => 'required|exists:PerformerInfo,PerformerId',
            'EventDate' => 'required|date',
            'EventTime' => 'required',
            'EventDescription' => 'required|string',
        ]);

        Event::create($validated);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event added successfully.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $performers = PerformerInfo::all();

        return view('events.edit', compact('event', 'performers'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'EventName' => 'required|string|max:255',
            'LocationName' => 'required|string|max:255',
            'LocationState' => 'required|string|max:255',
            'LocationAddress' => 'required|string|max:255',
            'PerformerId' => 'required|exists:PerformerInfo,PerformerId',
            'EventDate' => 'required|date',
            'EventTime' => 'required',
            'EventDescription' => 'required|string',
        ]);

        $event->update($validated);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
