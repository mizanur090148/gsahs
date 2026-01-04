<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsAndGallaryController extends Controller
{

    public function galary()
    {
        // Logic to fetch and display news list
        return view('galary');
    }
}
