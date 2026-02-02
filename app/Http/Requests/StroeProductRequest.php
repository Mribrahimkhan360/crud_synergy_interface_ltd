<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StroeProductRequest extends FormRequest
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
            'name'  => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' =>  'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'The product name must be given!',
            'model.required'    => 'The model number must be given!',
            'price.required'    => 'The price must be given!',
            'price.numeric'     => 'The price should be numeric only!',
            'price.min'         => 'The price can not less than 0',
        ];
    }
}
