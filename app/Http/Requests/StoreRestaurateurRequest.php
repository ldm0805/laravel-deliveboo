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
           'address' => ['required', 'max:100'],
           'image' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'address.required' => "L'indirizzo è obbligatorio",
            'image.required' => "L'immagine è obbligatoria"
        ];
    }
}
