<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'id' => 'required|integer|min:0',
            'brand_id' => 'required|integer|exists:brands,id',
            'plate' => ['required', 'string', 'regex:/^(([A-Za-z]{3}\d{3})|([A-Za-z]{3}\d{2}[A-Za-z]{1}))$/'],
        ];
    }
}
