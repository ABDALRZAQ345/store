<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'gt:0'],
            'discount' => ['required', 'integer', 'gte:0', 'lte:100'],
            'quantity' => ['required', 'integer', 'min:1'],
            'expire_date' => ['nullable', 'date', 'after_or_equal:today'],
            'photo' => ['nullable', 'image', 'max:3072'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
        ];
    }
}