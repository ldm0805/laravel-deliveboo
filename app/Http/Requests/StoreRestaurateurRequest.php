<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurateurRequest extends FormRequest
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
           'name' => ['required', 'max:50'],
           'email' => ['required', 'max:50', 'unique:restaurateurs'],
           'address' => ['required', 'max:100'],
           'p_iva' => ['required', 'max:11'],
           'image' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'email.required' => 'La mail è obbligatoria',
            'address.required' => "L'indirizzo è obbligatorio",
            'p_iva.required' => 'La P_IVA è obbligatoria',
            'image.required' => "L'immagine è obbligatorio"
        ];
    }
}
