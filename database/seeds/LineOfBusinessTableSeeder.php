<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\LineOfBusiness;

class LineOfBusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 3) as $index) {
            LineOfBusiness::create([
                'code' => 'CODE' . str_random(3) . (string) date_timestamp_get(date_create()),
                'name' => $faker->userName,
                'description' => $faker->paragraph(3)
            ]);
        }
    }
}
