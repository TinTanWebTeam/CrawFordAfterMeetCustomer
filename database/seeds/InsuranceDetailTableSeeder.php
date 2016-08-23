<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\InsuranceDetail;

class InsuranceDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Factory::create();
//        foreach (range(1, 30) as $index) {
//            InsuranceDetail::create([
//                'code' => 'CODE' . str_random(3) . (string) date_timestamp_get(date_create()),
//                'name' => $faker->name,
//                'description' => $faker->paragraph(1),
//                'typeOfInsuranceId'=>1
//            ]);
//        }
    }
}
