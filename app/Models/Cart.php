<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'product_id', 
        'quantity',
        'price',
        'grand_total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user() {
        return $this->hasOne('App\Models\User','id','user_id');
        
    }
    public static function calculateGrandTotal($userId)
    {
        return self::where('user_id', $userId)->sum('total');
    }
}
