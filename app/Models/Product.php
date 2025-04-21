<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillabe = [
        "name",
        "price",
        "image_link",
        "desciption",
        "rating",
        "category_id",
        "brand_id",
        "sold_quantity"
    ];
    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }
}
