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
        Schema::create('mcmc', function (Blueprint $table) {
            $table->id();
            $table->string('M_Name');
            $table->string('M_UserName')->unique();
            $table->string('M_Password');
            $table->string('M_Email')->unique;
            $table->string('M_Addresss');
            $table->string('M_PhoneNum');
            $table->string('M_Gender');
            $table->string('M_ProfilePicture');
            $table->string('M_UserName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcmc');
    }
};
