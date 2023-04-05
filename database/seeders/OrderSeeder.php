<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Order;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<50; $i++){

            $newOrder = new Order();

            $newOrder->name = $faker->word(50);
            $newOrder->slug = $faker->word(70);
            $newOrder->surname = $faker->word(70);
            $newOrder->phone = $faker->randomNumber(5);
            $newOrder->date = $faker->dateTimeThisCentury()->format('Y-m-d');
            $newOrder->total = $faker->randomNumber(3);
            $newOrder->address = $faker->word(100);
            $newOrder->mail = $faker->email();

            $newOrder->save();

        }
    }
}
