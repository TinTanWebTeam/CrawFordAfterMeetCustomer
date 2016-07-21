<?php

use App\Claim;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ClaimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 5) as $index) {
            Claim::create([
                'code' => 'CODE' . str_random(3) . (string) date_timestamp_get(date_create()),
                'branchSeqNo'=>$faker->countryCode,
                'incident'=>$faker->countryCode,
                'assignmentTypeCode'=>$faker->countryCode,
                'accountCode'=>$faker->countryCode,
                'accountPolicyId'=>$faker->streetName,
                'insuredName'=>$faker->streetName,
                'insuredClaim'=>$faker->streetName,
                'tradingAs'=>$faker->streetName,
                'claimTypeCode'=>$faker->firstName,
                'lossDescCode'=>$faker->firstName,
                'catastrophicLoss'=>$faker->firstName,
                'sourceCode'=>$faker->firstName,
                'insurerCode'=>$faker->firstName,
                'lossLocation'=>$faker->address,
                'openDate'=>$faker->date(),

            ]);
        }
    }
}
