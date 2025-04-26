<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'card_number',
        'name',
        'expiry_month',
        'expiry_year',
        'cvv',
    ];    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
