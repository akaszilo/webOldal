<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_type extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryTypeFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillabe = [""];
}