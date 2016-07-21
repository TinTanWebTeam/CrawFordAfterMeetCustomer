<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\TypeOfInsurance;

class TypeOfInsuranceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        TypeOfInsurance::create([
            'code' => 'CodeDefault',
            'name' => 'Default',
            'description' => $faker->paragraph(3)
        ]);

    }
}
