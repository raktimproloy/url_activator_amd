<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'stripe_id',
        'stripe_session_id',
        'stripe_status',
        'stripe_price',
        'currency',
        'quantity',
        'invoice_id',
        'order_id',
        'package_slug',
        'payment_method',
        'payment_status',
        'subscription',
        'ends_at',
    ];

}
