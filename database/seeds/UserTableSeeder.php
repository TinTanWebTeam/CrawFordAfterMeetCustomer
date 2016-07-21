<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => crypt(Config::get('app.key'),'tintansoft'),
            'roleId' => 1,
            'firstName'=>'admin',
            'lastName'=>'admin',
            'salutation'=>'Ms',
            'positionId'=>1,
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => crypt(Config::get('app.key'),'tintansoft'),
            'roleId' => 2,
            'firstName'=>'user1',
            'lastName'=>'user2',
            'salutation'=>'Mrs',
            'positionId'=>2,
        ]);
    }
}
