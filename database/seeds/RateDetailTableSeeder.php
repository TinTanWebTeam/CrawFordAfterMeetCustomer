<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\RateDetail;

class RateDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,5) as $index){
            $faker = Factory::create();
            RateDetail::create([
                'value'=>11.5,
                'description'=>$faker->paragraph(3),
                'rateTypeId'=>random_int(1,3),
            ]);
        }
    }
}
