<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	public function index()
	{
    	$products = Product::all();
    	return view('ui.home',compact('products'));
	}
}
