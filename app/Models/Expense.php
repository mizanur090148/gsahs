<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'purpose',
        'amount',
        'by_whom',
        'voucher',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];
}
