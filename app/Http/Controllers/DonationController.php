<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        return view('donations.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'photo' => 'nullable|image|max:2048',
            'document' => 'required|file|max:5120',
        ]);

        // Handle file uploads
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('donations/photos', 'public');
            $validated['photo'] = $photoPath;
        }

        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('donations/documents', 'public');
            $validated['document'] = $documentPath;
        }

        Donation::create($validated);

        return redirect()->route('home')
            ->with('success', 'আপনার ডোনেশন সফলভাবে সম্পন্ন হয়েছে!');
    }
}
