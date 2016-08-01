<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\ClaimTaskDetail;

class ClaimTaskDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 4) as $index) {
            ClaimTaskDetail::create([
                'professionalServices' => rand(1,3),
                'professionalServicesTime' => rand(1,10),
                'professionalServicesNote'=>$faker->paragraph(3),
                'expense' => rand(1,3)
            ]);
        }
    }
}
