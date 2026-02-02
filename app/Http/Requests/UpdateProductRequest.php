<?php

namespace App\Http\Requests;

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
            'name'      => 'required|string|max:255',
            'model'     => 'required|string|max:255',
            'price'     => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
          'name.required'       => 'Product name must be given!',
          'model.required'      => 'Model number must be given!',
            'price.required'    => 'Give me price!',
            'price.numeric'     => 'The price should be only number!',
            'price.min'         => "The price can't less than 0!",
        ];
    }
}
