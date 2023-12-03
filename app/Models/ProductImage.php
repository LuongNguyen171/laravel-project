<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
   protected $table = 'product_images'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'imageId'; // Tên trường khóa chính
    protected $fillable = [
      'productId',
      'productImage',
      'description',
  ];
   public function products()
{
   return $this->belongsTo(Product::class, 'productId', 'productId');
}
   //protected $table = 'product_images';
   //protected $primaryKey = 'imageId';
}
?>