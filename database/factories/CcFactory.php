<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cc>
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
        $riskStartDate = $this->faker->dateTimeBetween('-2 years', 'now');
        $riskEndDate = Carbon::parse($riskStartDate)->addYear();
        $tpStartDate = Carbon::parse($riskStartDate);
        $tpEndDate = Carbon::parse($tpStartDate)->addYears(3);
        
        // Generate base premium amounts
        $od = $this->faker->randomFloat(2, 1000, 10000);
        $rider = $this->faker->randomFloat(2, 500, 3000);
        $thirdPartyAmount = $this->faker->randomFloat(2, 1000, 5000);
        $gst = $this->faker->randomFloat(2, 12, 18);
        
        // Calculate derived values based on form logic
        $commission = $od + $rider;
        $net = $od + $rider + $thirdPartyAmount;
        $totalAmount = $net + ($net * ($gst / 100));
        
        // Generate percentage rates
        $paidPerCa = $this->faker->randomFloat(2, 5, 25);
        $paidPerTp = $this->faker->randomFloat(2, 3, 15);
        $receivedPerCa = $this->faker->randomFloat(2, 10, 35);
        $receivedPerTp = $this->faker->randomFloat(2, 5, 20);
        
        // Calculate commission amounts
        $caAmount = ($paidPerCa / 100) * $commission;
        $tpAmount = ($paidPerTp / 100) * $thirdPartyAmount;
        $caReceivedAmount = ($receivedPerCa / 100) * $commission;
        $tpReceivedAmount = ($receivedPerTp / 100) * $thirdPartyAmount;
        
        // Calculate totals and profit
        $totalPaidAmount = $caAmount + $tpAmount;
        $totalReceivedPayout = $caReceivedAmount + $tpReceivedAmount;
        $profit = $totalReceivedPayout - $totalPaidAmount;
        
        return [
            // User and broker details
            'user_id' => User::factory()->state(['organisation_id' => 1]),
            'broker' => $this->faker->randomElement(['Robinhood', 'Landmark', 'Certigo', 'Arham']),
            
            // Policy type and source
            'posp' => $this->faker->randomElement(['POSP', 'Non-POSP']),
            'source' => $this->faker->randomElement(['Agent', 'Self', 'Other']),
            
            // Personal information
            'salutation_id' => $this->faker->numberBetween(1, 3),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional(0.6)->firstName(),
            'last_name' => $this->faker->lastName(),
            'address_1' => $this->faker->streetAddress(),
            'address_2' => $this->faker->optional(0.7)->secondaryAddress(),
            'address_3' => $this->faker->optional(0.3)->secondaryAddress(),
            'zipcode' => $this->faker->numerify('######'),
            'city_id' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->numerify('##########'),
            
            // Nominee details
            'relationship' => $this->faker->randomElement(['Spouse', 'Child', 'Parent', 'Sibling']),
            'nominee_name' => $this->faker->name(),
            'nominee_dob' => $this->faker->date('Y-m-d', Carbon::now()->subYears(18)),
            
            // Business and insurance details
            'business_type' => $this->faker->randomElement(['Fresh', 'Port', 'Rollover']),
            'insurance_type' => $this->faker->randomElement(['Motor', 'Health', 'Marine']),
            'risk_start_date' => $riskStartDate,
            'risk_end_date' => $riskEndDate,
            'tp_start_date' => $tpStartDate,
            'tp_end_date' => $tpEndDate,
            
            // Policy details
            'policy_number' => $this->faker->regexify('[A-Z0-9]{10}'),
            'insurance_company_name' => $this->faker->randomElement([
                'HDFC', 'ICICI', 'Bajaj Allianz', 'Digit', 'United'
            ]),
            
            // Vehicle information
            'make_id' => $this->faker->numberBetween(1, 3),
            'vehicle_model' => $this->faker->randomElement(['Sedan', 'SUV', 'Hatchback', 'MUV']),
            'vehicle_sub_model' => $this->faker->optional(0.6)->word(),
            'cc' => $this->faker->numberBetween(800, 3500),
            'yom' => $this->faker->numberBetween(2015, Carbon::now()->year),
            'fuel_type_id' => $this->faker->numberBetween(1, 3),
            'registration_number_1' => strtoupper($this->faker->regexify('[A-Z]{2}')),
            'registration_number_2' => $this->faker->numberBetween(10, 99),
            'registration_number_3' => strtoupper($this->faker->optional(0.9)->regexify('[A-Z]{2}')),
            'registration_number_4' => $this->faker->numberBetween(1000, 9999),
            'engine_type' => $this->faker->regexify('[A-Z0-9]{6,12}'),
            'chasis' => $this->faker->regexify('[A-Z0-9]{10,17}'),
            'ncb' => $this->faker->randomElement(['0%', '20%', '25%', '35%', '45%', '50%']),
            'last_ncb' => $this->faker->randomElement(['0%', '20%', '25%', '35%', '45%', '50%']),
            
            // Premium details (base amounts)
            'od' => round($od, 2),
            'rider' => round($rider, 2),
            'third_party_amount' => round($thirdPartyAmount, 2),
            'gst' => round($gst, 2),
            'sum_issured' => $this->faker->numberBetween(50000, 1500000),
            
            // Calculated amounts
            'commission' => round($commission, 2),
            'net' => round($net, 2),
            'total_amount' => round($totalAmount, 2),
            
            // Commission rates (what we pay)
            'paid_per_ca' => round($paidPerCa, 2),
            'paid_per_tp' => round($paidPerTp, 2),
            
            // Commission amounts (what we pay)
            'ca_amount' => round($caAmount, 2),
            'tp_amount' => round($tpAmount, 2),
            
            // Commission rates (what we receive)
            'received_per_ca' => round($receivedPerCa, 2),
            'received_per_tp' => round($receivedPerTp, 2),
            
            // Commission amounts (what we receive)
            'ca_received_amount' => round($caReceivedAmount, 2),
            'tp_received_amount' => round($tpReceivedAmount, 2),
            
            // Summary calculations
            'total_paid_amount' => round($totalPaidAmount, 2),
            'total_received_payout' => round($totalReceivedPayout, 2),
            'profit' => round($profit, 2),
            
            // Document paths
            // 'last_policy' => $this->faker->optional(0.7)->filePath(),
            // 'rc' => $this->faker->optional(0.9)->filePath(),
            // 'pan_card' => $this->faker->optional(0.8)->filePath(),
            // 'aadhaar_front' => $this->faker->optional(0.8)->filePath(),
            // 'aadhaar_back' => $this->faker->optional(0.8)->filePath(),
            
            // Timestamps
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}