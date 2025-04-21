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
        "price_sign",
        "currency",
        "image_link",
        "desciption",
        "rating",
        "category_id",
        "type_id",
        "tag_list",
        "created_at",
        "updated_at",
        "product_colors"
    ];
    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }
}
