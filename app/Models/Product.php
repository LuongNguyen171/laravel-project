<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'products';
   protected $primaryKey = 'productId';
   public function productImage()
   {
       return $this->hasMany(ProductImage::class, 'productId', 'productId');
   }
   
    public function style()
    {
        return $this->belongsTo(ProductStyle::class, 'styleId', 'styleId');
    }
}

