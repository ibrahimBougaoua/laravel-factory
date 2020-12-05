<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ui\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
	public function index()
	{
    	$products = Product::paginate(4);
    	return view('ui.home',compact('products'));
	}

	public function show($id)
	{
		try {
			$product = Product::find($id);
			if ( ! $product )
				return redirect()->route('ui.product')->with(['error' => "this Product does't exists !"]);
			return view('ui.product.show',compact('product'));
		} catch (Exception $e) {
			return redirect()->route('ui.product')->with(['error' => "Somme error !"]);
		}
	}

	public function destroy($id)
	{
		$cart = new Cart(session()->get('cart'));
		$cart->delete($id);
		if( $cart->totalQty <= 0 )
		{
			session()->forget('cart');
		} else {
			session()->put('cart',$cart);
		}
		return redirect()->route('ui.product')->with(['success' => 'product deleted succesfully !']);
	}

	public function update(ProductRequest $request,$id)
	{
		dd($id);
		$cart = new Cart(session()->get('cart'));
		$cart->update($id,$request->quantity);
		session()->put('cart',$cart);
		return redirect()->route('product.viewCart')->with(['success' => 'updated succesfully !']);
	}
}
