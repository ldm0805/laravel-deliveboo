<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurateur;
use App\Models\Plate;

class RestaurateurController extends Controller
{
    public function index(){
        $restaurateurs = Restaurateur::with('plate','types')->paginate(3);
        return response()->json([
            'success' => true,
            'results' => $restaurateurs,
        ]);
    }
    public function show($slug){
        $restaurateur = Restaurateur::all()->where('slug', $slug)->first();


        $plates = Plate::all()->where('restaurateur_id', $restaurateur->id);

        if($plates){
            return response()->json([
                'success' => true,
                'plates' => $plates,
                'restaurateur' => $restaurateur,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => 'Nessun piatto trovato',
            ]);
        }
    }
}
