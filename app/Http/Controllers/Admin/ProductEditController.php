<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductEditController extends Controller      
{
    //
    public function execute(Product $product, Request $request) {
        //$product = Product::find($slug);
        $old = $product->toArray();
        

        if(view()->exists('default.edit_product')) {
            $title = 'sdsdsadsadasdsa';
            //$data = $old;
            dump($old);
            
            return view('default.edit_product')->with('data',$old)->with('title',$title);
        }
        abort(404);
    }
}
