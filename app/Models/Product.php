<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "price",
        "image_link",
        "description", 
        "rating",
        "category_id",
        "brand_id",
        "sold_quantity",
        "instock",
        "ingredients",
        "howtouse"
    ];

    public function brand(): BelongsTo 
    {
        return $this->belongsTo(Brand::class);
    }
    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }
}
