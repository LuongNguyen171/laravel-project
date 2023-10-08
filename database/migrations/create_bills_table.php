<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id('billId');
            $table->string('userName', 255);
            $table->string('userEmail', 255);
            $table->text('userAddress');
            $table->string('userPhoneNumber', 20);
            $table->unsignedBigInteger('productId');
            $table->integer('quantityPurchased');
            $table->date('DatePurchase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
