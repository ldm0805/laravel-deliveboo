<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlateRequest extends FormRequest
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
           'name' => ['required', 'max:100', 'unique:plates'],
           'ingredients' => ['max:100'],
           'image' => ['required'],
           'price' => ['required', 'numeric', 'between:0,99.99'],
           'visible' => ['required'],
           'availability' => ['required'],
           'restaurateur_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'Il nome è obbligatorio',
            'name.max'        => 'Nome troppo lungo! Inserisci al massimo :max caratteri',
            'name.unique'     => 'Il nome è già presente',
            'ingredients.max' => 'Ingredienti troppo lungo! Inserisci al massimo :max caratteri',
            'image.required'  => "L'immagine è obbligatoria",
            'price.required'  => 'Il prezzo è obbligatorio',
            'price.numeric'  => 'Il prezzo deve essere composto solo da numeri',
            'price.between'  => 'Il prezzo deve essere compreso tra 0,99 e 99',
            'visible.required' => 'La visibilità del piatto è obbligatoria',
            'availability.required' => 'La disponibilità del piatto è obbligatorio',
        ];
    }
}
