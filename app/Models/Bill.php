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

    ];
    protected $primaryKey = 'billId';

    public function user() {
        return $this->belongsTo(User::class, 'userEmail', 'userEmail');
    }

}
