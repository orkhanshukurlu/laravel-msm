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
            $table->id();
            $table->string('phone');
            $table->string('message');
            $table->integer('response_code')->nullable();
            $table->string('response_text')->nullable();
            $table->timestamp('sent_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('msm_logs');
    }
};
