<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId');
            $table->string('userName', 255);
            $table->string('userAvt', 255)->nullable();
            $table->string('userPhoneNumber', 20)->nullable();
            $table->text('userAddress')->nullable();
            $table->string('userEmail', 255)->unique();
            $table->string('userPassword', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
