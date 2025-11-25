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
        Schema::create('icici_grid_cvs', function (Blueprint $table) {
            $table->id();
            $table->string('rto_cluster', 50)->index();
            $table->string('category', 50)->index();

            $table->string('value')->nullable();
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
        Schema::dropIfExists('icici_grid_cvs');
    }
};
