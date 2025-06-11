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
        Schema::create('public_user', function (Blueprint $table) {
            $table->id();
            $table->string('PU_Name');
            $table->string('PU_Email')->unique();
            $table->string('PU_Password');
            $table->string('PU_Addresss');
            $table->string('PU_PhoneNum');
            $table->string('PU_Gender');
            $table->string('PU_ProfilePicture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_user');
    }
};
