<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Restaurateur;

class RestaurateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurateurs = config('deliverboo.restaurateurs');
        foreach ($restaurateurs as $restaurateur) {
            $newRestaurateur = new Restaurateur();
            $newRestaurateur->name = $restaurateur['name'];
            $newRestaurateur->password = $restaurateur['password'];
            $newRestaurateur->email = $restaurateur['email'];
            $newRestaurateur->address = $restaurateur['address'];
            $newRestaurateur->image = $restaurateur['image'];
            $newRestaurateur->p_iva = $restaurateur['p_iva'];
            $newRestaurateur->slug = Restaurateur::generateSlug($restaurateur['name']);
            $newRestaurateur->save();
        }
    }
}
