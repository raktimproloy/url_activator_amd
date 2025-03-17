<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'tag',
        'amount',
        'duration',
        'status',
        'stripe_id',
        'url_count',
        'priority',
        'currency',
        'theme_color',
        'include',
    ];

    protected $casts = [
        'include' => 'array', // Ensure Laravel treats it as an array
    ];
}
