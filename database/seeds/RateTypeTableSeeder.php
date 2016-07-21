<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\RateType;

class RateTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $type = [
            'Flat',
            'Hourly',
            'Blend'
        ];
        foreach (range(1, 3) as $index) {
            RateType::create([
                'code' => $type[$index -1],
                'name' => $faker->userName,
                'description' => $faker->paragraph(3)
            ]);
        }
    }
}
