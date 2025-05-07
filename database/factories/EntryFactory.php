<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entry>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['organisation_id' => 2]),
            'business_sourced_by' => $this->faker->name(),
            'advisor_name' => $this->faker->name(),
            'advisor_code' => $this->faker->regexify('[A-Z0-9]{8}'),
            'business_type_id' => $this->faker->randomElement([1, 2, 3]),

            // Customer Information
            'name' => $this->faker->name(),
            'mobile_no' => $this->faker->numerify('##########'),
            'email' => $this->faker->safeEmail(),
            'pan_card' => null, // File uploads will be null in factory
            'aadhaar_front' => null, // File uploads will be null in factory
            'aadhaar_back' => null, // File uploads will be null in factory

            // Nominee Details
            'nominee_name' => $this->faker->name(),
            'nominee_relationship' => $this->faker->randomElement(['Spouse', 'Child', 'Parent', 'Sibling']),
            'nominee_dob' => $this->faker->date(),

            // Insurance Details
            'insurance_company_id' => $this->faker->randomElement([1, 2, 3]),
            'insurance_type_id' => $this->faker->randomElement([1, 2, 3]),
            'life_insurance_type_id' => $this->faker->randomElement([1, 2, 3]),
            'health_insurance_type_id' => $this->faker->randomElement([1, 2, 3]),
            'general_insurance_type_id' => $this->faker->randomElement([1, 2, 3]),

            // Vehicle Details
            'make_id' => $this->faker->randomElement([1, 2, 3]),
            'vehicle_model' => $this->faker->randomElement(['Sedan', 'SUV', 'Hatchback', 'Compact']),
            'vehicle_number' => strtoupper($this->faker->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}')),

            // Policy Details
            'idv' => $this->faker->numberBetween(100000, 2000000),
            'third_party_premium' => $this->faker->numberBetween(2000, 10000),
            'own_damage_premium' => $this->faker->numberBetween(5000, 20000),
            'od_risk_start_date' => $this->faker->date(),
            'od_risk_end_date' => $this->faker->date(),
            'tp_risk_start_date' => $this->faker->date(),
            'tp_risk_end_date' => $this->faker->date(),
            'risk_start_date' => $this->faker->date(),
            'risk_end_date' => $this->faker->date(),
            'policy_bond' => null, // File uploads will be null in factory
            'rc_copy' => null, // File uploads will be null in factory
            'premium_frequency_id' => $this->faker->randomElement([1, 2, 3]),
            'premium_paying_term' => $this->faker->numberBetween(1, 20),
            'policy_term' => $this->faker->numberBetween(1, 50),
            'sum_insured' => $this->faker->numberBetween(500000, 10000000),
            'premium_amount' => $this->faker->numberBetween(10000, 100000),
            'premium_amount_total' => $this->faker->numberBetween(10000, 120000),
            'policy_bond_receipt' => null, // File uploads will be null in factory
            'number_of_lives' => $this->faker->numberBetween(1, 9),
            'out_percentage' => $this->faker->numberBetween(1, 100),
            'net_od' => $this->faker->numberBetween(5000, 50000),
        ];
    }
}
