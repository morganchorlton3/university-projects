<?php

use App\Company;
use App\ContactDetails;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'Tesco',
            'ownerUID' => 2,
            'employees' => 0,
            'reason' => 'Blah Blah',
            'status' => 2,
            'lastPayDate' => Carbon::now(),
            'nextPayDate' => Carbon::now(),
            'payFrequency' => 2,
            'breakFrequency' => 0,
            'sundayPay' => 1
        ]);

        ContactDetails::create([
            'companyID' => 1,
            'line1' => 'Comapny Address Line 1',
            'line2' => 'Comapny Address Line 2',
            'postCode' => 'Comapny PostCode',
            'phoneNumber' => '012345678',
        ]);
    }
}
