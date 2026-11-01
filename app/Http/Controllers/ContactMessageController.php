<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ContactName' => ['required', 'string', 'max:255'],
            'ContactEmail' => ['required', 'email', 'max:255'],
            'ContactSubject' => ['required', 'string', 'max:255'],
            'ContactMessage' => ['required', 'string', 'max:2000'],
        ]);

        ContactMessage::create([
            'UserId' => Auth::user()->UserId,
            'ContactName' => $validated['ContactName'],
            'ContactEmail' => $validated['ContactEmail'],
            'ContactSubject' => $validated['ContactSubject'],
            'ContactMessage' => $validated['ContactMessage'],
        ]);

        return redirect()->route('contact.create')
            ->with('success', 'Your message has been submitted successfully.');
    }
}