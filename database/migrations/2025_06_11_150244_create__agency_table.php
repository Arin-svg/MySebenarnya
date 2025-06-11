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
        Schema::create('agency', function (Blueprint $table) {
            $table->id();
            $table->string('A_Name');
            $table->string('A_UserName')->unique();
            $table->string('A_Password');
            $table->string('A_Email')->unique();
            $table->string('A_Addresss');
            $table->string('A_PhoneNum');
            $table->string('A_Category');
            $table->string('A_ProfilePicture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agency');
    }
};
