<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'required|string|max:20',
            'contact_message' => 'required|string',
        ]);

        ContactMessage::create([
            'name' => $validated['contact_name'],
            'email' => $validated['contact_email'],
            'phone' => $validated['contact_phone'],
            'message' => $validated['contact_message'],
        ]);

        return redirect()->route('home')
            ->with('success', 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে!');
    }
}
