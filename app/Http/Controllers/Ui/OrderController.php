<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Auth::guard('customer')->user()->orders;
    	$carts = $orders->transform(function($cart,$key){
    		return unserialize($cart->cart);
    	});
    	return view('ui.order.index',compact('carts'));
    }
}
