<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Factory;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $factories = Factory::all();
        $categories = Category::all();
        $products = Product::paginate(8);
        return view('ui.home',compact('factories','categories','products'));
    }
}
