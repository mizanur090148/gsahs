<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class RegisteredController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();//where('status', 'approved');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('batch')) {
            $query->where('batch', $request->batch);
        }

        // Use paginate() instead of get() to enable pagination
        $alumni = $query->orderBy('id', 'desc')
            ->get(); // Changed from get() to paginate(12)

        // if ($request->ajax()) {
        //     return view('partials.alumni-cards', compact('alumni'));
        // }

        $studentCount = Student::count();
        $relativesCount = Student::sum('participant_count') - $studentCount;
        $totalIncome = Student::sum('amount');

        return view('registered-std', compact('alumni', 'studentCount', 'relativesCount', 'totalIncome'));
    }

    public function all(Request $request)
    {
        $query = Student::query();//where('status', 'approved');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('batch')) {
            $query->where('batch', $request->batch);
        }

        $alumni = $query->orderBy('batch', 'desc')
            ->paginate(20); // This already uses paginate()

        return view('alumni.all', compact('alumni'));
    }
}
