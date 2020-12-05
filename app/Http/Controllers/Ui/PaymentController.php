<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Admin;
use Stripe;

class PaymentController extends Controller
{
    public function addToCart(Product $product)
    {
        if( session()->has('cart') ) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart',$cart);
        return redirect()->route('ui.product')->with(['success' => 'product added successfully']);
    }

    public function dispalyCart()
    {
        if( session()->has('cart') ) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        //dd($cart);
        return view('ui.cart.show',compact('cart'));
    }

    public function checkOut($amount)
    {
        return view('ui.cart.checkout',compact('amount'));
    }

    public function charge(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
                "amount" => $request->amount * 100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "Test payment from cc" 
        ]);

        $id = $charge['id'];
        session()->forget('cart');
        if ($id) {
            $admin = new Admin();
            $admin->orders()->create([
                'cart' => serialize(session()->get('cart'))
            ]);
            return redirect()->route('ui.product')->with(['success' => 'payment successfully !']);
        } else {
            return redirect()->route('ui.product')->with(['error' => 'payment error !']);
        }
        dd($request->stripeToken);
    }
}
