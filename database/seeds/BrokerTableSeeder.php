<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Broker;

class BrokerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Factory::create();
//        foreach (range(1, 5) as $index) {
//            Broker::create([
//                'code' => 'CODE' . str_random(3) . (string) date_timestamp_get(date_create()),
//                'firstName' => $faker->firstName,
//                'lastName' => $faker->lastName,
//                'phone' => $faker->phoneNumber,
//                'email'=> $faker->email,
//                'address'=>$faker->address,
//                'bankAccountNumber'=>$faker->bankAccountNumber,
//                'bankCardNumber'=>$faker->bankAccountNumber,
//                'bankAccountName'=>$faker->streetName,
//                'bankName'=>$faker->streetName
//
//            ]);
//        }
    }
}
