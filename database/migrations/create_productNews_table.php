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
        Schema::create('product_news', function (Blueprint $table) {
            $table->id('newsId'); 
            $table->unsignedBigInteger('productId');
            $table->string('newsTitle', 255);
            $table->date('newsPostDate');
            $table->string('newsImage', 255)->nullable();
            $table->text('newsDescription');

            
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_news');
    }
};
