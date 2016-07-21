<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\TaskCategory;

class TaskCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $codes = [
            'SV',
            'DR',
            'AU',
            'EXP',
            'RA',
            'TA',
            'RF'
        ];
        $names = [
            'Site Visit',
            'Prepare & Dictate',
            'Audit',
            'Meeting with contractor',
            'Biding document',
            'Checking',
            'Review doc'
        ];
        foreach (range(1, 3) as $index) {
            TaskCategory::create([
                'code' =>  $codes[$index],
                'name' => $names[$index],
                'description' => $faker->paragraph(3)
            ]);
        }
    }
}
