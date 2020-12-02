<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	public $items = [];
	public $totalItems;
	public $totalPrice;

	public function __construct( $cart = null )
	{
	    $this->items = $cart->items;
        $this->totalItems = $cart->totalItems;
        $this->totalPrice = $cart->totalPrice;
		
		if ($cart) {
			$this->items = $cart->items;
            $this->totalItems = $cart->totalItems;
            $this->totalPrice = $cart->totalPrice;
		}
	}

	public function add($product)
	{
		$item = [
			'title' => $product->title,
			'price' => $product->price,
			'qty' => 0,
			'image' => $product->image
		];

		if( ! array_key_exists($product->id, $this->item) )
		{
			$this->items[$product->id] = $item;
			$this->totalQty += 1;
			$this->totalPrice += $product->price;
		} else {
			$this->totalQty += 1;
			$this->totalPrice += $product->price;
		}
		$this->items[$product->id]['qtn'] += 1;
	}

}
