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
            ['name' => 'Acko General Insurance Limited'],
            ['name' => 'Axis Max Life Insurance Limited'],
            ['name' => 'Bajaj Allianz General Insurance Co Ltd'],
            ['name' => 'Cholamandalam MS General Insurance Company Ltd'],
            ['name' => 'Future Generali India Insurance Company Ltd'],
            ['name' => 'Go Digit General Insurance Ltd'],
            ['name' => 'Go Digit Life Insurance Limited'],
            ['name' => 'HDFC Ergo General Insurance Co Ltd'],
            ['name' => 'ICICI Lombard General Insurance Co Ltd'],
            ['name' => 'IFFCO-Tokio General Insurance Co Ltd'],
            ['name' => 'Liberty General Insurance Ltd'],
            ['name' => 'Magma HDI General Insurance Co Ltd'],
            ['name' => 'National Insurance Co Ltd'],
            ['name' => 'Navi General Insurance Limited'],
            ['name' => 'Pramerica Life Insurance Limited'],
            ['name' => 'Raheja QBE General Insurance Co Ltd'],
            ['name' => 'Reliance General Insurance Co Ltd'],
            ['name' => 'Royal Sundaram General Insurance Company Limited'],
            ['name' => 'SBI General Insurance Company Limited'],
            ['name' => 'Shriram General Insurance Company Ltd'],
            ['name' => 'Tata AIG General Insurance Co Ltd'],
            ['name' => 'The New India Assurance Co Ltd'],
            ['name' => 'The Oriental Insurance Co Ltd'],
            ['name' => 'United India Insurance Co Ltd'],
            ['name' => 'Universal Sompo General Insurance Co Ltd'],
            ['name' => 'Zuno General Insurance Ltd'],
            ['name' => 'Zurich Kotak General Insurance Company (I) Limited'],
        ];

        foreach ($companies as $company) {
            InsuranceCompany::firstOrCreate(
                ['name' => $company['name']],
                ['is_active' => true],
            );
        }
    }
}
