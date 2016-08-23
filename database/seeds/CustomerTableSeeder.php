<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Customer;

class CustomerTableSeeder extends Seeder
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
//            Customer::create([
//                'code' => 'CODE' . str_random(3) . (string) date_timestamp_get(date_create()),
//                'fullName' => $faker->userName,
//                'address' => $faker->address,
//                'phone'=>$faker->phoneNumber,
//                'email'=>$faker->email,
//                'addressReserve'=>$faker->address,
//                'phoneReserve'=>$faker->phoneNumber,
//                'emailReserve'=>$faker->email,
//                'bankAccountNumber'=>$faker->bankAccountNumber,
//                'bankCardNumber'=>$faker->bankAccountNumber,
//                'bankAccountName'=>$faker->streetName,
//                'bankName'=>$faker->streetName,
//                'contactPersonFirstName'=>$faker->firstName,
//                'contactPersonLastName'=>$faker->lastName,
//                'contactPersonPhone'=>$faker->phoneNumber,
//                'contactPersonEmail'=>$faker->email,
//                'contactPersonFirstNameReserve'=>$faker->firstName,
//                'contactPersonLastNameReserve'=>$faker->lastName,
//                'contactPersonPhoneReserve'=>$faker->phoneNumber,
//                'contactPersonEmailReserve'=>$faker->email,
//                'sourceCustomerId'=>random_int(1,3),
//            ]);
//        }
    }
}
