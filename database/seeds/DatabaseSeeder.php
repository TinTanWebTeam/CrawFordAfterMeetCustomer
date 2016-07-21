<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RateTypeTableSeeder::class);
        $this->call(RateDetailTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(TypeOfDamageTableSeeder::class);
        $this->call(ExtendOfDamageTableSeeder::class);
        $this->call(TypeOfInsuranceTableSeeder::class);
        $this->call(InsuranceDetailTableSeeder::class);
        $this->call(SourceCustomerTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(BranchTypeTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(BrokerTableSeeder::class);
        $this->call(LineOfBusinessTableSeeder::class);
        $this->call(ClaimTableSeeder::class);
        $this->call(AssignmentTableSeeder::class);
        $this->call(BillTableSeeder::class);
        $this->call(TaskCategoryTableSeeder::class);
        $this->call(ClaimTaskDetailTableSeeder::class);
        $this->call(ExchangeRateTableSeeder::class);
    }
}
