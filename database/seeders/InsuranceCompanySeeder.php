<?php

namespace Database\Seeders;

use App\Models\InsuranceCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            ['name' => 'ACKO GENERAL INSURANCE LIMITED'],
            ['name' => 'AXIS MAX LIFE INSURANCE LIMITED'],
            ['name' => 'BAJAJ ALLIANZ GENERAL INSURANCE CO LTD'],
            ['name' => 'CHOLAMANDALAM MS GENERAL INSURANCE COMPANY LTD'],
            ['name' => 'FUTURE GENERALI INDIA INSURANCE COMPANY LTD'],
            ['name' => 'GO DIGIT GENERAL INSURANCE LTD'],
            ['name' => 'GO DIGIT LIFE INSURANCE LIMITED'],
            ['name' => 'HDFC ERGO GENERAL INSURANCE CO LTD'],
            ['name' => 'ICICI LOMBARD GENERAL INSURANCE CO LTD'],
            ['name' => 'IFFCO-TOKIO GENERAL INSURANCE CO LTD'],
            ['name' => 'LIBERTY GENERAL INSURANCE LTD'],
            ['name' => 'MAGMA HDI GENERAL INSURANCE CO LTD'],
            ['name' => 'NATIONAL INSURANCE CO LTD'],
            ['name' => 'NAVI GENERAL INSURANCE LIMITED'],
            ['name' => 'PRAMERICA LIFE INSURANCE LIMITED'],
            ['name' => 'RAHEJA QBE GENERAL INSURANCE CO LTD'],
            ['name' => 'RELIANCE GENERAL INSURANCE CO LTD'],
            ['name' => 'ROYAL SUNDARAM GENERAL INSURANCE COMPANY LIMITED'],
            ['name' => 'SBI GENERAL INSURANCE COMPANY LIMITED'],
            ['name' => 'SHRIRAM GENERAL INSURANCE COMPANY LTD'],
            ['name' => 'TATA AIG GENERAL INSURANCE CO LTD'],
            ['name' => 'THE NEW INDIA ASSURANCE CO LTD'],
            ['name' => 'THE ORIENTAL INSURANCE CO LTD'],
            ['name' => 'UNITED INDIA INSURANCE CO LTD'],
            ['name' => 'UNIVERSAL SOMPO GENERAL INSURANCE CO LTD'],
            ['name' => 'ZUNO GENERAL INSURANCE LTD'],
            ['name' => 'ZURICH KOTAK GENERAL INSURANCE COMPANY (I) LIMITED'],
        ];

        foreach ($companies as $company) {
            InsuranceCompany::firstOrCreate(
                ['name' => $company['name']],
                ['is_active' => true],
            );
        }
    }
}
