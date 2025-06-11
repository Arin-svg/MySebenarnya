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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('C_ID')
                  ->constrained('complaint')->onDelete('cascade');
            $table->foreignId('A_ID')
                  ->constrained('agency')->onDelete('cascade');
            $table->string('P_Status');
            $table->text('P_Notes');
            $table->time('P_Timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
