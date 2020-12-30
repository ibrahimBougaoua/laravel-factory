<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart','customer_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public static function total()
    {
        $carts = Order::all()->transform(function($cart,$key){
            return unserialize($cart->cart);
        });
        $value = 0;
        foreach ($carts as $price) {
            $value += $price->totalPrice;
        }
        return $value;
    }

    public function costomer($value='')
    {
    	return $this->belongsTo('App\Models\Admin');
    }
}
