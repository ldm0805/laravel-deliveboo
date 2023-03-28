<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurateur;

class RestaurateurController extends Controller
{
    public function index(){
        $restaurateurs = Restaurateur::with('plate','types')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $restaurateurs,
        ]);
    }
    public function show($slug){
        $plate = Restaurateur::with('plate','types')->where('slug', $slug)->first();

        if($plate){
            return response()->json([
                'success' => true,
                'plate' => $plate,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => 'Nessun piatto trovato',
            ]);
        }
    }
}
