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
        Schema::create('insurance_grid_raws', function (Blueprint $table) {
            $table->id();
            $table->string('policy_group_id', 50)->nullable()->index();
            
            // Basic info - The only searchable fields
            $table->string('insurer', 50)->index();
            $table->string('segment', 50)->index();
            $table->string('policy_type', 50)->index();
            
            // Location (stored but not used for filtering)
            $table->text('location')->nullable();
            $table->text('location_remarks')->nullable();
            
            // All remarks - displayed only, not searchable
            $table->text('insurer_remarks')->nullable();
            $table->text('segment_remarks')->nullable();
            $table->text('policy_type_remarks')->nullable();
            $table->text('remarks_additional')->nullable();
            
            // Points
            $table->string('points', 12);
            
            $table->timestamps();
            
            // Simple indexes
            $table->index(['segment', 'policy_type', 'insurer']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_grid_raws');
    }
};
