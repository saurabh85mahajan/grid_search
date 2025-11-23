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
        Schema::create('digit_grid_cars', function (Blueprint $table) {
            $table->id();
            $table->string('rto_state', 100)->index();
            $table->string('rto_zone', 50)->index();

            // Percentages stored as numbers, e.g. 25.0 => 25.00
            $table->decimal('saod_petrol_non_hev', 5, 2)->nullable();
            $table->decimal('saod_petrol_hev', 5, 2)->nullable();
            $table->decimal('saod_non_petrol_non_hev', 5, 2)->nullable();
            $table->decimal('saod_non_petrol_hev', 5, 2)->nullable();
            $table->decimal('comp_petrol_non_hev', 5, 2)->nullable();
            $table->decimal('comp_petrol_hev', 5, 2)->nullable();
            $table->decimal('comp_non_petrol_non_hev', 5, 2)->nullable();
            $table->decimal('comp_non_petrol_hev', 5, 2)->nullable();
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
        Schema::dropIfExists('digit_grid_cars');
    }
};
