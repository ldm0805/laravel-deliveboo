<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Italiano', 'Cinese', 'Inglese', 'Giapponese', 'Indiano', 'Internazionale', 'Messicano', 'Spagnolo', 'Francese', 'Greco', 'Turco', 'Libanese', 'Marocchino', 'Coreano', 'Thailandese', 'Vietnamita', 'Brasiliano', 'Argentino', 'Peruviano', 'Colombiano', 'Venezuelano', 'Sudafricano', 'Etiopico', 'Egiziano', 'Russo', 'Tedesco', 'Olandese', 'Belga', 'Svizzero', 'Austriaco', 'Polacco', 'Svedese', 'Norvegese', 'Danese'];

        foreach($types as $type){
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Type::generateSlug($type);
            $newType->save();
        }
    }
}
