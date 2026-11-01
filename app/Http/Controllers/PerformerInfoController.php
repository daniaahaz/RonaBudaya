<?php

namespace App\Http\Controllers;

use App\Models\PerformerInfo;
use Illuminate\Http\Request;

class PerformerInfoController extends Controller
{
    
    public function index(Request $request)
    {
        $query = PerformerInfo::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('PerformerName', 'like', "%{$search}%")
                ->orWhere('PerformanceType', 'like', "%{$search}%");
            });
        }

        $performers = $query->get();

        return view('performers.index', compact('performers'));
    }


    public function create()
    {
        return view('performers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'PerformerName' => 'required|string|max:255',
            'PerformanceType' => 'required|string|max:255',
            'PerformanceDescription' => 'required|string',
        ]);

        PerformerInfo::create($validated);

        return redirect()
            ->route('performers.index')
            ->with('success', 'Performer added successfully.');
    }

    public function show(PerformerInfo $performer)
    {
        return view('performers.show', compact('performer'));
    }

    public function edit(PerformerInfo $performer)
    {
        return view('performers.edit', compact('performer'));
    }

    public function update(Request $request, PerformerInfo $performer)
    {
        $validated = $request->validate([
            'PerformerName' => 'required|string|max:255',
            'PerformanceType' => 'required|string|max:255',
            'PerformanceDescription' => 'required|string',
        ]);

        $performer->update($validated);

        return redirect()
            ->route('performers.index')
            ->with('success', 'Performer updated successfully.');
    }

    public function destroy(PerformerInfo $performer)
    {
        $performer->delete();

        return redirect()
            ->route('performers.index')
            ->with('success', 'Performer deleted successfully.');
    }

}
