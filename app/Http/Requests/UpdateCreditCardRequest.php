<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCreditCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'card_number' => 'required|string|size:16',
            'name' => 'required|string|max:255',
            'expiry_month' => 'required|integer|min:1|max:12',
            'expiry_year' => 'required|integer|min:' . date('Y'),
            'cvv' => 'required|string|size:3',
        ];
    }
}
