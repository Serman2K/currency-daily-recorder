<?php

namespace App\Http\Requests;

use App\Rules\isCompositeUnique;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "currency" => ['required', 'in:EUR,USD,GBP', new isCompositeUnique('posts', ['currency' => $this->currency, 'date' => $this->date])],
            "date" => ['required', 'date'],
            "amount" => ['required', 'numeric'],
        ];
    }
}

// 'unique:posts,date,NULL,currency'
// 'unique:posts,currency,NULL,date'