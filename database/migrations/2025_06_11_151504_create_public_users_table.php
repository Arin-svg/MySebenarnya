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
            Schema::create('public_users', function (Blueprint $table) {
            $table->string('PU_ID')->primary();
            $table->string('PU_Name');
            $table->string('PU_IC', 12);
            $table->integer('PU_Age');
            $table->string('PU_Address');
            $table->string('PU_Email')->unique();
            $table->string('PU_PhoneNum');
            $table->string('PU_Gender');
            $table->string('PU_Password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_users');
    }
};
