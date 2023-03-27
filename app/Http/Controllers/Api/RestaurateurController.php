<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurateur;

class RestaurateurController extends Controller
{
    public function index(){
        $restaurateurs = Restaurateur::all();
        return response()->json([
            'success' => true,
            'results' => $restaurateurs,
        ]);
    }
}
