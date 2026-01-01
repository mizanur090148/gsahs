<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function store(Request $request)
    {
        $request->merge([
            'participant_count' => $request->registration_type === 'single'
                ? 1
                : $request->participant_count,
        ]);
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'batch'             => 'required|integer',
            'father_name'       => 'required|string|max:255',
            'photo'             => 'nullable|image|max:2048',
            'screenshot'        => 'nullable|image|max:2048',
            'tshirt'            => 'required|string|in:S,M,L,XL,XXL',
            'phone'             => 'required|string|max:20',
            'email'             => 'nullable|email',
            'profession'        => 'nullable|string|max:255',
            'present_address'   => 'required|string',
            'registration_type' => 'required|in:single,group',
            'participant_count' => 'required_if:registration_type,group|integer|min:1|max:10',
            'amount'            => 'required|numeric',
            'sent_from'         => 'required',
            'terms_agreed'      => 'required|accepted',
        ]);

            // $validator = Validator::make($request->all(), [
            //     'name' => 'required|string|max:255',
            //     'batch' => 'required|integer',
            //     'father_name' => 'required|string|max:255',
            //     'blood' => 'required|string',
            //     'tshirt' => 'required|string|in:S,M,L,XL,XXL',
            //     'phone' => 'required|string|max:20',
            //     'email' => 'nullable|email',
            //     'profession' => 'nullable|string|max:255',
            //     'present_address' => 'required|string',
            //     'permanent_address' => 'required|string',
            //     'registration_type' => 'required|in:single,group',
            //     'participant_count' => 'required_if:registration_type,group|integer|min:1|max:10',
            //     'amount' => 'required|numeric',
            //     'terms_agreed' => 'required|accepted',
            // ]);

            // if ($validator->fails()) {
            //     dd($validator->errors()); // 👈 THIS is what you want
            // }

        // Handle file uploads
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('students/photos', 'public');
            $validated['photo'] = $photoPath;
        }

        if ($request->hasFile('screenshot')) {
            $screenshotPath = $request->file('screenshot')->store('students/screenshots', 'public');
            $validated['screenshot'] = $screenshotPath;
        }

        // Create student record
        $student = Student::create($validated);

        return redirect()->route('home')
            ->with('success', 'আপনার নিবন্ধন সফলভাবে সম্পন্ন হয়েছে!');
    }

    public function all()
    {
        $students = Student::where('status', 'approved')
            ->orderBy('batch', 'desc')
            ->paginate(20);

        return view('students.all', compact('students'));
    }
}
