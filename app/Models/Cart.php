<?php

namespace App\Models;

class Cart
{
	public $items = [];
	public $totalQty;
	public $totalPrice;

	public function __construct( $cart = null )
	{
	    $this->items = [];
        $this->totalQty = 0;
        $this->totalPrice = 0;
		
		if ($cart) {
			$this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
		}
	}

	public function add($product)
	{
		$item = [
			'id' => $product->id,
			'name' => $product->name,
			'unit_price' => $product->unit_price,
			'description' => $product->description,
			'qty' => 0,
		];

		if( ! array_key_exists($product->id, $this->items) )
		{
			$this->items[$product->id] = $item;
			$this->totalQty += 1;
			$this->totalPrice += $product->unit_price;
		} else {
			$this->totalQty += 1;
			$this->totalPrice += $product->unit_price;
		}
		$this->items[$product->id]['qty'] += 1;
	}

	public function delete($id)
	{
		if( array_key_exists($id, $this->items) )
		{
			$this->totalPrice -= $this->items[$id]['unit_price'] * $this->items[$id]['qty'];
			$this->totalQty -= $this->items[$id]['qty'];
			unset($this->items[$id]);
		}
	}

	public function update($id,$qty)
	{
		if( array_key_exists($id, $this->items) )
		{
			$this->totalQty -= $this->items[$id]['qty'];
			$this->totalPrice -= $this->items[$id]['unit_price'] * $this->items[$id]['qty'];
			$this->items[$id]['qty'] = $qty;
			$this->totalQty += $qty;
			$this->totalPrice += $this->items[$id]['unit_price'] * $this->items[$id]['qty'];;
		}
	}

}
