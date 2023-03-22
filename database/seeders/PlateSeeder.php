<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plate;


class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plates = config('deliverboo.plates');
        foreach ($plates as $plate) {
            $newPlate = new Plate();
            $newPlate->name = $plate['name'];
            $newPlate->ingredients = $plate['ingredients'];
            $newPlate->image = $plate['image'];
            $newPlate->price = $plate['price'];
            $newPlate->visible = $plate['visible'];
            $newPlate->availability = $plate['availability'];
            $newPlate->description = $plate['description'];

            $newPlate->slug = Plate::generateSlug($plate['name']);
            $newPlate->save();
        }
    }
}
