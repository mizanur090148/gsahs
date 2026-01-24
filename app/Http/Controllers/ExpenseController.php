<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::latest()->get();
        $totalExpense = Expense::sum('amount');
        
        return view('expenses.index', compact('expenses', 'totalExpense'));
    }
}
