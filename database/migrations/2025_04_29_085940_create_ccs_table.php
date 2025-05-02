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
        Schema::create('ccs', function (Blueprint $table) {
            $table->id();

            $table->string('proposal_type')->nullable();
            $table->string('last_year_entry_no')->nullable();
            $table->string('posp')->nullable();

            $table->integer('salutation_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->text('address_3')->nullable();
            $table->string('zipcode')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            //Nominee Details
            $table->string('relationship')->nullable();
            $table->string('nominee_name')->nullable();
            $table->string('nominee_dob')->nullable();
            
            // Vehicle details
            $table->integer('region_id')->nullable();
            $table->integer('business_lock_id')->nullable();
            $table->integer('insurance_company_id')->nullable();
            $table->string('policy_number')->nullable();
            $table->date('policy_issue_date')->nullable();
            $table->string('code')->nullable();

            $table->integer('product_id')->nullable();
            $table->integer('product_category_id')->nullable();
            $table->string('risk_category')->nullable();

            $table->date('inception_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('ncb_id')->nullable();
            $table->date('tp_inception_date')->nullable();
            $table->date('tp_expiry_date')->nullable();
            $table->string('idv')->nullable();

            $table->integer('py_insurance_company_id')->nullable();
            $table->string('py_policy_number')->nullable();
            $table->string('tarrif_rate')->nullable();
            $table->string('actual_tarrif')->nullable();
            $table->boolean('third_party')->default(false);

            $table->integer('make_id')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_sub_model')->nullable();
            $table->string('cc')->nullable();
            $table->string('yom')->nullable();
            $table->integer('fuel_type_id')->nullable();
            $table->integer('seating_capacity')->nullable();
            $table->string('registration_number_1')->nullable();
            $table->string('registration_number_2')->nullable();
            $table->string('registration_number_3')->nullable();
            $table->string('registration_number_4')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('chasis')->nullable();
            $table->integer('rto_id')->nullable();

            // Premium details
            $table->decimal('od', 10, 2)->nullable();
            $table->decimal('add_on', 10, 2)->nullable();
            $table->decimal('other', 10, 2)->nullable();
            $table->decimal('tp_premium', 10, 2)->nullable();
            $table->decimal('tp_tax', 10, 2)->nullable();
            $table->decimal('tppd', 10, 2)->nullable();
            $table->decimal('liab_cng', 10, 2)->nullable();
            $table->decimal('liab_passenger', 10, 2)->nullable();
            $table->decimal('liab_owner_driver', 10, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->decimal('total_premium', 10, 2)->nullable();
			$table->decimal('od_percentage', 10, 2)->nullable();
			$table->decimal('tp_percentage', 10, 2)->nullable();
            $table->decimal('specific_amount', 10, 2)->nullable();
            $table->json('add_on_coverages')->nullable();
            
            // // Payment details
            $table->string('payment_mode')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('cheque_trans_number')->nullable();
            $table->integer('bank_id')->nullable();
            $table->decimal('payment_amount', 10, 2)->nullable();
            
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ccs');
    }
};
