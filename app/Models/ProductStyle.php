<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStyle extends Model
{
    protected $table = 'product_style'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'styleId'; // Tên trường khóa chính

    // Các trường còn lại trong bảng
    protected $fillable = [
        'styleName',
        'description',
    ];

    // Các quan hệ với các model khác
    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'styleId', 'styleId');
    // }
}
