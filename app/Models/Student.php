<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'batch',
        'father_name',
        'blood',
        'photo',
        'tshirt',
        'phone',
        'email',
        'profession',
        'present_address',
        'permanent_address',
        'registration_type',
        'participant_count',
        'amount',
        'status',
        'ref_code',
    ];

    protected $casts = [
        'batch' => 'integer',
        'participant_count' => 'integer',
        'amount' => 'decimal:2',
    ];
}
