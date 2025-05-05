<?php

namespace Database\Factories;

use App\Models\Cc;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class CcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $policyIssueDate = $this->faker->dateTimeBetween('-2 years', 'now');
        $inceptionDate = Carbon::parse($policyIssueDate)->addDays($this->faker->numberBetween(0, 5));
        $expiryDate = Carbon::parse($inceptionDate)->addYear();
        $tpInceptionDate = Carbon::parse($inceptionDate);
        $tpExpiryDate = Carbon::parse($tpInceptionDate)->addYears(3);
        
        return [
            // Policy details
            'user_id' => User::factory()->state(['organisation_id' => 1]),
            'proposal_type' => $this->faker->randomElement(['Fresh', 'Renewal']),
            'last_year_entry_no' => $this->faker->optional(0.4)->regexify('[A-Z0-9]{8}'),
            'posp' => $this->faker->randomElement(['POSP', 'Non POSP']),
            
            // Personal information
            'salutation_id' => $this->faker->numberBetween(1, 3),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional(0.6)->firstName(),
            'last_name' => $this->faker->lastName(),
            'address_1' => $this->faker->streetAddress(),
            'address_2' => $this->faker->optional(0.7)->secondaryAddress(),
            'address_3' => $this->faker->optional(0.3)->secondaryAddress(),
            'zipcode' => $this->faker->numerify('#####'),
            'city_id' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->numerify('##########'),
            
            // Nominee details
            'relationship' => $this->faker->randomElement(['Spouse', 'Child', 'Parent', 'Sibling']),
            'nominee_name' => $this->faker->name(),
            'nominee_dob' => $this->faker->date('Y-m-d', Carbon::now()->subYears(18)),
            
            // Vehicle and policy details
            'region_id' => $this->faker->numberBetween(1, 3),
            'business_lock_id' => $this->faker->numberBetween(1, 3),
            'insurance_company_id' => $this->faker->numberBetween(1, 3),
            'policy_number' => $this->faker->regexify('[A-Z0-9]{10}'),
            'policy_issue_date' => $policyIssueDate,
            'code' => $this->faker->optional(0.7)->regexify('[A-Z0-9]{6}'),
            
            'product_id' => $this->faker->numberBetween(1, 3),
            'product_category_id' => $this->faker->numberBetween(1, 3),
            'risk_category' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            
            'inception_date' => $inceptionDate,
            'expiry_date' => $expiryDate,
            'ncb_id' => $this->faker->numberBetween(1, 3),
            'tp_inception_date' => $tpInceptionDate,
            'tp_expiry_date' => $tpExpiryDate,
            'idv' => $this->faker->numberBetween(50000, 1500000),
            
            'py_insurance_company_id' => $this->faker->optional(0.7)->numberBetween(1, 3),
            'py_policy_number' => $this->faker->optional(0.7)->regexify('[A-Z0-9]{10}'),
            'tarrif_rate' => $this->faker->randomFloat(2, 1, 5),
            'actual_tarrif' => $this->faker->randomFloat(2, 1, 5),
            'third_party' => $this->faker->boolean(20),
            
            // Vehicle information
            'make_id' => $this->faker->numberBetween(1, 3),
            'vehicle_model' => $this->faker->randomElement(['Sedan', 'SUV', 'Hatchback', 'MUV']),
            'vehicle_sub_model' => $this->faker->optional(0.6)->word(),
            'cc' => $this->faker->numberBetween(800, 3500),
            'yom' => $this->faker->numberBetween(2015, Carbon::now()->year),
            'fuel_type_id' => $this->faker->numberBetween(1, 3),
            'seating_capacity' => $this->faker->numberBetween(2, 8),
            'registration_number_1' => strtoupper($this->faker->regexify('[A-Z]{2}')),
            'registration_number_2' => $this->faker->numberBetween(10, 99),
            'registration_number_3' => strtoupper($this->faker->optional(0.9)->regexify('[A-Z]{2}')),
            'registration_number_4' => $this->faker->numberBetween(1000, 9999),
            'engine_type' => $this->faker->regexify('[A-Z0-9]{6,12}'),
            'chasis' => $this->faker->regexify('[A-Z0-9]{10,17}'),
            'rto_id' => $this->faker->numberBetween(1, 3),
            
            // Premium details
            'od' => $this->faker->randomFloat(2, 1000, 10000),
            'add_on' => $this->faker->randomFloat(2, 0, 2000),
            'other' => $this->faker->randomFloat(2, 0, 1000),
            'tp_premium' => $this->faker->randomFloat(2, 1000, 5000),
            'tp_tax' => $this->faker->randomFloat(2, 5, 18),
            'tppd' => $this->faker->randomFloat(2, 0, 1000),
            'liab_cng' => $this->faker->randomFloat(2, 0, 500),
            'liab_passenger' => $this->faker->randomFloat(2, 0, 500),
            'liab_owner_driver' => $this->faker->randomFloat(2, 0, 500),
            'tax' => $this->faker->randomFloat(2, 12, 18),
            'tax_amount' => $this->faker->randomFloat(2, 100, 2000),
            'total_premium' => $this->faker->randomFloat(2, 3000, 20000),
            'od_percentage' => $this->faker->randomFloat(2, 0, 10),
            'tp_percentage' => $this->faker->randomFloat(2, 0, 10),
            'specific_amount' => $this->faker->optional(0.3)->randomFloat(2, 100, 5000),
            'add_on_coverages' => json_encode($this->generateAddOnCoverages()),
            
            // Payment details
            'payment_mode' => $this->faker->randomElement(['card', 'cheque', 'dd', 'neft', 'other']),
            'payment_date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'cheque_trans_number' => $this->faker->optional(0.6)->regexify('[A-Z0-9]{6,12}'),
            'bank_id' => $this->faker->optional(0.8)->numberBetween(1, 3),
            'payment_amount' => $this->faker->randomFloat(2, 3000, 20000),
            
            // Timestamps
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
    
    /**
     * Generate random add-on coverages
     *
     * @return array
     */
    protected function generateAddOnCoverages(): array
    {
        $possibleCoverages = [
            'nil_dep', 'consumable', 'engine_protector', 'tyre_cover',
            'ncb_protector', 'r21', 'keycover', 'rsa', 'personal_belongings', 'spare_car'
        ];
        
        $selectedCoverages = [];
        $numCoverages = $this->faker->numberBetween(0, count($possibleCoverages));
        
        $randomKeys = array_rand($possibleCoverages, $numCoverages > 0 ? $numCoverages : 1);
        
        if ($numCoverages === 0) {
            return [];
        }
        
        if (!is_array($randomKeys)) {
            $randomKeys = [$randomKeys];
        }
        
        foreach ($randomKeys as $key) {
            $selectedCoverages[] = $possibleCoverages[$key];
        }
        
        return $selectedCoverages;
    }
}