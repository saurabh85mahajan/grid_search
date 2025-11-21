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
        Schema::table('insurance_grid_raws', function (Blueprint $table) {
            $table->text('notice')->after('points')->nullable();
            $table->text('diff')->after('points')->nullable();
            $table->decimal('points')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insureance_grid_raws', function (Blueprint $table) {
            //
        });
    }
};
