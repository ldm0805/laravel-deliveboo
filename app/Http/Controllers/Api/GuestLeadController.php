<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Models\Order;
use App\Mail\GuestContact;


class GuestLeadController extends Controller
{
    public function store(Request $request){
        $form_data = $request->all();

        $validator = Validator::make($form_data,
        [
            'name' => 'required|max:50',
            'slug' => 'nullable',
            'surname' => 'required|max:70',
            'phone' => 'required|numeric',
            'mail' => 'required',
            'address' => 'required|max:100',
        ],[
            'name.required' => 'Il nome è richiesto',
            'name.max' => 'Il nome deve essere lungo massimo :max caratteri.',
            'surname.required' => 'Il cognome è richiesto',
            'surname.max' => 'Il cognome deve essere lungo massimo :max caratteri.',
            'phone.required' => 'Il numero di telefono è richiesto',
            // 'phone.max' => 'Il numero di telefono deve essere lungo massimo :max caratteri.',
            'phone.numeric' => 'Il numero di telefono deve essere composto da caratteri numerici.',
            'mail.required' => 'La mail è richiesta',
            'mail.email' =>"L'indirizzo mail deve essere valido",
            'address.required' => 'L\'indirizzo è richiesto',
            'address.max' => 'L\'indirizzo essere lungo massimo :max caratteri.',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newOrder = new Order();
        $newOrder->fill($form_data);
        $newOrder->save();
        Mail::to('info@deliveboo.com')->send(new GuestContact($newOrder));

        return response()->json([
            'success' => true
        ]);

    }
}
