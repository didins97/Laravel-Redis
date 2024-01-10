<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i <= 500; $i++) {
            \DB::table('products')->insert([
                'name' => 'product '. $i,
                'image' => 'product'. $i. '.png',
                'category' => $faker->randomElement(['a', 'b', 'c', 'd', 'e']),
                'desc' => $faker->text()
            ]);
        }
    }
}
