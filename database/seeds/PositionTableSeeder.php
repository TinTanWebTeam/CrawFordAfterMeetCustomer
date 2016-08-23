<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Position;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'code'=>'Adjuster',
            'name' => 'adjuster',
            'description' => 'Position Adjuster',
        ]);
        Position::create([
            'code'=>'Manager',
            'name' => 'manager',
            'description' => 'Position Manager',
        ]);
        Position::create([
            'code'=>'Employee',
            'name' => 'employee',
            'description' => 'Position Employee',
        ]);
    }
}
