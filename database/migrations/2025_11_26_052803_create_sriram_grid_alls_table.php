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
        Schema::create('sriram_grid_alls', function (Blueprint $table) {
            $table->id();
            $table->string('state', 50)->index();
            $table->string('category', 50)->index();

            $table->decimal('dis')->nullable();
            $table->string('value')->nullable();
            $table->string('policy_type')->nullable();
            $table->string('age')->nullable();
            $table->string('remarks')->nullable();
            $table->string('remarks_1')->nullable();

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
        Schema::dropIfExists('sriram_grid_alls');
    }
};
