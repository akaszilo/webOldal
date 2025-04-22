<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["name"]; 

    public function products()
{
    return $this->hasMany(Product::class);
}
}
