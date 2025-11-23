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
        Schema::create('icici_grid_cars', function (Blueprint $table) {
            $table->id();
            $table->string('rto_category', 50)->index(); // Geo / Vertical
            $table->string('rto_zone', 50)->index();     // North / South / East / West
            $table->string('rto_state', 100)->index();
            $table->string('rto_location', 150)->index();

            // Percentages stored as numbers, e.g. 25.0 => 25.00
            $table->decimal('pvt_car_new_1_3', 5, 2)->nullable();
            $table->string('pvt_car_petrol_cng_1_1_ncb')->nullable();
            $table->decimal('pvt_car_diesel_ev_1_1_ncb', 5, 2)->nullable();
            $table->decimal('saod_ncb', 5, 2)->nullable();
            $table->decimal('pvt_car_0_ncb_non_ncb', 5, 2)->nullable();
            $table->decimal('pvt_car_used_car', 5, 2)->nullable();
            $table->integer('period');
            $table->boolean('is_highlight')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icici_grid_cars');
    }
};
