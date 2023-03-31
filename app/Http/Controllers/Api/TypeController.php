<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Restaurateur;
use Illuminate\Support\Facades\DB;







class TypeController extends Controller
{
    public function index(){
        $types = Type::all();
        return response()->json([
            'success' => true,
            'results' => $types,
        ]);
    }

    public function show($slug){
        $types = Type::all()->where('slug', $slug)->first();

        
        $restaurateurs = DB::table('restaurateurs')
            ->join('restaurateur_type', 'restaurateurs.id', '=', 'restaurateur_type.restaurateur_id')
            ->join('types', 'restaurateur_type.type_id', '=', 'types.id')
            ->where('types.slug', '=', $slug)
            ->select('restaurateurs.*', DB::raw('GROUP_CONCAT(types.name SEPARATOR ", ") as types'))
            ->groupBy('restaurateurs.id')
            ->get();

        if($restaurateurs){
            return response()->json([
                'success' => true,
                'restaurateurs' => $restaurateurs,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => 'Nessun piatto trovato',
            ]);
        }
    }
    public function showTwo($slug){
        $types = Type::all()->where('slug', $slug)->first();

        
        $restaurateurs = DB::table('restaurateurs')
            ->join('restaurateur_type', 'restaurateurs.id', '=', 'restaurateur_type.restaurateur_id')
            ->join('types', 'restaurateur_type.type_id', '=', 'types.id')
            ->where('types.slug', '=', $slug)
            ->select('restaurateurs.*', DB::raw('GROUP_CONCAT(types.name SEPARATOR ", ") as types'))
            ->groupBy('restaurateurs.id')
            ->get();

        if($restaurateurs){
            return response()->json([
                'success' => true,
                'restaurateurs' => $restaurateurs,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => 'Nessun piatto trovato',
            ]);
        }
    }
}
