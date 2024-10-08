<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_id',

        // Shipping details
        'shipping_first_name',
        'shipping_last_name',
        'shipping_address',
        'shipping_post_code',
        'shipping_city',
        'shipping_district',
        'shipping_phone',

        // Billing details
        'billing_first_name',
        'billing_last_name',
        'billing_address',
        'billing_post_code',
        'billing_city',
        'billing_district',
        'billing_phone',
        
        'payment_status',
        'shipping_status',

        'shipping_total',
        'total_discount',
        'total'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

}
