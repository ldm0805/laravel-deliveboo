<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurateurRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('restaurateurs')->ignore($this->restaurateur), 'max:50'],
            'email' => ['required'],
            'address' => ['required', 'max:100'],
            'p_iva' => ['required', 'max:11'],
            'image' => ['nullable'],
    ];
    }
}
