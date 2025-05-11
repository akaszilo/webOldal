<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'postCode',
        'city',
        'street',
        'houseNumber',
        'note',
        'country'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
