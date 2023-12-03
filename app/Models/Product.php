<?php

namespace App\Models;
use App\Models\ProductImage;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'products';
    protected $fillable = [
        'productName',
        'styleId',
        'productImage',
        'productStatus',
        'productPrice',
        'productQuantity',
        'productSoldQt',
        'productInfor',
        'productIntro',
        'productDiscount',
        'productTmName'
    ];

    protected $primaryKey = "productId";
    public $timestamps = false;
    // Trong mô hình Product
    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'productId', 'productId');
    }
}