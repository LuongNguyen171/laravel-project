<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
   public function product()
{
    return $this->belongsTo(Product::class, 'productId', 'productId');
}
   //protected $table = 'product_images';
   //protected $primaryKey = 'imageId';
}
?>