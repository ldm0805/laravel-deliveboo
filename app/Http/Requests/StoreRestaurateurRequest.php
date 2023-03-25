<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;


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
           'address' => ['required', 'max:100'],
           'image' => ['required'],
           'email' => ['required', 'email:rfc,dns'],
           'p_iva' => ['required', 'regex:/^[0-9]{11}$/'], 
           'password' => ['required', 'confirmed', 'min:8', 'uppercase'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => "Il nome può essere composto da massimo :max caratteri.",
            'address.required' => "L'indirizzo è obbligatorio",
            'address.max' => "L'indirizzo può essere composto da massimo :max caratteri.",
            'image.required' => "L'immagine è obbligatoria",
            'email.required' => "La mail è obbligatoria",
            'email.email' =>"L'indirizzo mail deve essere valido",
            'p_iva.required' =>"La partita iva è obbligatoria",
            'p_iva.regex' =>"La partita iva deve essere composta da soli numeri e deve essere lunga 11 caratteri",
            'password.required' =>"La password è obbligatoria",
            'password.confirmed' =>"Le password non coincidono",
            'password.min' => "La password deve essere composta da :min caratteri",
            'password.symbols' => "password contenga almeno una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale e che ogni carattere venga utilizzato almeno una volta",

        ];
    }
}
