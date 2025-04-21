<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillabe = ["orderId","postCode","city","street","houseNumber", "note"];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
