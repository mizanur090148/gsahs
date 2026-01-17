<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of approved blogs.
     */
    public function index()
    {
        $blogs = Blog::approved()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'story' => 'required|string',
            'writer_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Blog::create([
            'title' => $request->title,
            'story' => $request->story,
            'writer_name' => $request->writer_name,
            'status' => 'pending', // Default to pending for admin approval
        ]);

        return back()->with('success', 'আপনার ব্লগটি সফলভাবে জমা দেওয়া হয়েছে। অ্যাডমিন অনুমোদনের পর এটি প্রকাশিত হবে।');
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        // Only show approved blogs
        if ($blog->status !== 'approved') {
            abort(404);
        }

        return view('blogs.show', compact('blog'));
    }
}
