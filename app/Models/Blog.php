<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'story',
        'writer_name',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    // Scope for approved blogs
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Scope for pending blogs
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
