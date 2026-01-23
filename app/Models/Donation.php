<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'father_name',
        'mobile',
        'address',
        'amount',
        'photo',
        'document',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];
}
