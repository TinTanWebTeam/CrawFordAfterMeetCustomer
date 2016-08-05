<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'PD',
            'name' => 'Pending',
            'description' => 'Status pending',
            'reference'=>'Bill'
        ]);
        Status::create([
            'code' => 'CP',
            'name' => 'Complete',
            'description' => 'Status Complete',
            'reference'=>'Bill'
        ]);
    }
}
