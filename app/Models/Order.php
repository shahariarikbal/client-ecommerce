<?php

namespace App\Models;

use App\Models\CartOrderProduct;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function orderProducts(){
    	return $this->hasMany(CartOrderProduct::class, 'order_id')->where('type','order');
    }
}
