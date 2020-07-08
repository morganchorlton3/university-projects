<?php

use App\CompanyRole;
use Illuminate\Database\Seeder;

class CompanyRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyRole::Create([
            'company' => 1,
            'name' => 'Customer Delivery Driver',
            'payRate' => 9.68,
            'staffAssigned' => 0,
        ]);

        CompanyRole::Create([
            'company' => 1,
            'name' => 'Sales Assistant',
            'payRate' => 9.68,
            'staffAssigned' => 0,
        ]);
    }
}
