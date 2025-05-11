<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillabe = [
        'total',
        'status',
        'user_id',
        'product_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
