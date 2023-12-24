<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'userName',
        'userEmail',
        'userAddress',
        'userPhoneNumber',
        'productId',
        'quantityPurchased',
        'DatePurchase'
    ];
    protected $primaryKey = 'billId';
    public $timestamps = false;
}
