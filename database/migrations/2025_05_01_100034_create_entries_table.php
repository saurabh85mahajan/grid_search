<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('business_sourced_by')->nullable();
            $table->string('advisor_name')->nullable();
            $table->string('advisor_code')->nullable();
            $table->integer('business_type_id')->nullable();
            $table->string('name');
            $table->string('pan_card')->nullable();
            $table->string('mobile_no');
            $table->string('email')->nullable();

            $table->string('aadhaar_front')->nullable();
            $table->string('aadhaar_back')->nullable();
            
            // Nominee Information
            $table->string('nominee_name')->nullable();
            $table->date('nominee_dob')->nullable();
            $table->string('nominee_relationship')->nullable();
            
            // Insurance Details
            $table->integer('insurance_company_id');
            $table->integer('insurance_type_id')->nullable();
            $table->integer('life_insurance_type_id')->nullable();
            $table->integer('health_insurance_type_id')->nullable();
            $table->integer('general_insurance_type_id')->nullable();
            
            // Vehicle Information
            $table->integer('make_id')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_number')->nullable();

            //
            $table->decimal('idv', 15, 2)->nullable();
            $table->decimal('own_damage_premium', 15, 2)->nullable();
            $table->decimal('third_party_premium', 15, 2)->nullable();
            $table->date('od_risk_start_date')->nullable();
            $table->date('od_risk_end_date')->nullable();
            $table->date('tp_risk_start_date')->nullable();
            $table->date('tp_risk_end_date')->nullable();
            $table->string('policy_bond')->nullable();
            $table->string('rc_copy')->nullable();
            
            // Premium Information
            $table->integer('premium_frequency_id')->nullable();
            $table->decimal('sum_insured', 15, 2)->nullable();
            $table->integer('premium_paying_term')->nullable();
            $table->integer('policy_term')->nullable()->nullable();
            $table->decimal('premium_amount', 15, 2)->nullable();
            $table->date('risk_start_date')->nullable();
            $table->date('risk_end_date')->nullable();
            $table->string('policy_bond_receipt')->nullable();
            $table->integer('number_of_lives')->nullable();
            $table->decimal('premium_amount_total', 15, 2)->nullable();
            $table->decimal('out_percentage', 5, 2)->nullable();
            $table->decimal('net_od', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
