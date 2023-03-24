<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

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
            'address' => ['required', 'max:100'],
            'image' => ['nullable'],
    ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'Il nome è obbligatorio',
            'name.max'        => 'Nome troppo lungo! Inserisci al massimo :max caratteri',
            'address.required'  => "L'indirizzo è obbligatorio",
        ];
    }
}
