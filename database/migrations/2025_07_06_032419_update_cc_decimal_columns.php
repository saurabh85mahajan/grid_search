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
        Schema::table('ccs', function (Blueprint $table) {
            $table->decimal('od', 15, 2)->nullable()->change();
            $table->decimal('rider', 15, 2)->nullable()->change();
            $table->decimal('commission', 15, 2)->nullable()->change();
            $table->decimal('third_party_amount', 15, 2)->nullable()->change();
            $table->decimal('net', 15, 2)->nullable()->change();
            $table->decimal('total_amount', 15, 2)->nullable()->change();
            $table->decimal('ca_amount', 15, 2)->nullable()->change();
            $table->decimal('tp_amount', 15, 2)->nullable()->change();
            $table->decimal('ca_received_amount', 15, 2)->nullable()->change();
            $table->decimal('tp_received_amount', 15, 2)->nullable()->change();
            $table->decimal('total_paid_amount', 15, 2)->nullable()->change();
            $table->decimal('total_received_payout', 15, 2)->nullable()->change();
            $table->decimal('profit', 15, 2)->nullable()->change();
            $table->decimal('sum_issured', 15, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
