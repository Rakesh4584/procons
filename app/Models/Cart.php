<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Pivot\CartProduct;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_count',
        'sub_total',
        'total_discount',
        'total',
        'total_tax',
        'is_paid',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this
            ->belongsToMany(Product::class)
            ->using(CartProduct::class)
            ->withPivot([
                'quantity',
                'tax',
                'discount',
                'price',
            ]);
    }
}
