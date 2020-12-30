<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class FactoryController extends Controller
{
    public function show($id)
    {
        try {
            $factory = Factory::find($id);
            if ( ! $factory )
                return redirect()->route('ui.product')->with(['error' => "this Product does't exists !"]);
            return view('ui.factory.show',compact('factory'));
        } catch (Exception $e) {
            return redirect()->route('ui.product')->with(['error' => "Somme error !"]);
        }
    }
}
