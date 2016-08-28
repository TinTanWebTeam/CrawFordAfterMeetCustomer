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
        TaskCategory::create([
            'code' => 'IB',
            'name' => 'IB',
            'description' => 'Interim Bill',
        ]);
        TaskCategory::create([
            'code' => 'FB',
            'name' => 'FB',
            'description' => 'Final Bill',
        ]);
        TaskCategory::create([
            'code' => 'AA',
            'name' => 'TimeCode',
            'description' => 'Receive / analyse Instructions',
        ]);
        TaskCategory::create([
            'code' => 'AST',
            'name' => 'TimeCode',
            'description' => 'Contact / supervise Assist Adjuster',
        ]);
        TaskCategory::create([
            'code' => 'FF',
            'name' => 'GeneralExp',
            'description' => 'Legal Filing Fees',
        ]);
        TaskCategory::create([
            'code' => 'IN',
            'name' => 'CommPhotoExp',
            'description' => 'Interpreter Fees',
        ]);
        TaskCategory::create([
            'code' => 'CL',
            'name' => 'ConsultFeesExp',
            'description' => 'Consultants Fee',
        ]);
        TaskCategory::create([
            'code' => 'AF',
            'name' => 'TravelRelatedExp	',
            'description' => 'Air Fare',
        ]);
        TaskCategory::create([
            'code' => 'DB',
            'name' => 'Disbursements',
            'description' => 'Disbursements',
        ]);
    }
}
