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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id('imageId');
            $table->bigInteger('productId')->unsigned(); // Sử dụng unsigned để phản ánh kiểu dữ liệu trong bảng products
            $table->foreign('productId')->references('productId')->on('products');
            $table->string('productImage', 500);
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_Images');
    }
};
