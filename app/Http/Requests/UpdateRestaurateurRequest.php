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
            'email' => ['required'],
            'address' => ['required', 'max:100'],
            'p_iva' => ['required', 'max:11'],
            'image' => ['nullable'],
    ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'Il nome è obbligatorio',
            'name.max'        => 'Nome troppo lungo! Inserisci al massimo :max caratteri',
            'email.required'  => "L'email è obbligatoria",
            'address.required'  => "L'indirizzo è obbligatorio",
            'p_iva.required'  => "La partita iva è obbligatoria",
            // 'p_iva.numeric'  => 'La partita iva deve essere composta solo da numeri',
            'p_iva.max'        => 'Partita iva troppo lunga! Inserisci al massimo :max caratteri',
        ];
    }
}
