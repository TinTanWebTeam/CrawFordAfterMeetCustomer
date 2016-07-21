<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\ExchangeRate;

class ExchangeRateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 2) as $index) {
            ExchangeRate::create([
                'code' => 'CODE' . str_random(3) . (string) date_timestamp_get(date_create()),
                'name' => $faker->name,
                'value' => 20.5,
                'description'=> $faker->paragraph(3)
            ]);
        }
    }
}
