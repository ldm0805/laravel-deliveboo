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
            'name' => 'required',
            'slug' => 'nullable',
            'surname' => 'required',
            'phone' => 'required',
            'mail' => 'required',
            'date' => 'nullable',
            'address' => 'required',
            'total' => 'required'

        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'ciao' => 'ciao',

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
