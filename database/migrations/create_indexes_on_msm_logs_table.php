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
        Schema::create('msm_logs', function (Blueprint $table) {
            $table->index('response_code', 'msm_logs_response_code_index');
            $table->index('phone', 'msm_logs_phone_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('msm_logs', function (Blueprint $table) {
            $table->dropIndex('msm_logs_response_code_index');
            $table->dropIndex('msm_logs_phone_index');
        });
    }
};
