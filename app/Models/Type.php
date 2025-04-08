<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    /** @use HasFactory<\Database\Factories\TypeFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillabe = ["product_type"];
}