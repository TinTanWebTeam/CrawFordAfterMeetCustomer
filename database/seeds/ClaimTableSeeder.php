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
                'brokerCode' => $faker->countryCode,
                'branchCode' => $faker->countryCode,
                'branchTypeCode' => $faker->countryCode,
                'accountPolicyId'=>$faker->streetName,
                'insuredFirstName'=>$faker->firstName,
                'insuredLastName'=>$faker->lastName,
                'insuredClaim'=>$faker->streetName,
                'tradingAs'=>$faker->streetName,
                'claimTypeCode'=>$faker->firstName,
                'lossDescCode'=>$faker->firstName,
                'catastrophicLoss'=>$faker->firstName,
                'sourceCode'=>$faker->firstName,
                'insurerCode'=>$faker->firstName,
                'lossLocation'=>$faker->address,
                'openDate'=>$faker->date(),
                'destroyedDate' => $faker->date(),
                'lineOfBusinessCode' => $faker->countryCode,
                'lossDate' => $faker->date(),
                'receiveDate' =>$faker->date(),
                'closeDate' => $faker->date(),
                'insuredContactedDate' => $faker->date(),
                'limitationDate' => $faker->date(),
                'policyInceptionDate'=> $faker->date(),
                'policyExpiryDate' => $faker->date(),
                'disabilityCode' => $faker->countryCode,
                'outComeCode' => $faker->countryCode,
                'lastChanged' => $faker->date(),
                'partnershipId' => $faker->countryCode,
                'adjusterCode' => $faker->countryCode,
                'rate' => (string)random_int(150,160),
                'feeType' => $faker->countryCode,
                'organization' => $faker->countryCode,
                'operatedAs' => $faker->countryCode,
                'miscInfo' => $faker->countryCode,
                'largeLossClaim' => $faker->countryCode,
                'policy' => $faker->countryCode,
                'reOpen' => $faker->date(),
                'eBoxDestroyed' => $faker->date(),
                'firstContact' => $faker->date(),
                'proscription' => $faker->date()
            ]);
        }
    }
}
