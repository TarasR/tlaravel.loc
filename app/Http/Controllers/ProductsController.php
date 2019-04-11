<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductsController extends Controller
{
    //
    public function execute() {
        
        //$products = Product::all();
        //$products = Product::take(3)->get();
        //$products = Product::get(array('id', 'title', 'slug'));

        $products = DB::select("select * from `products`");      

        if(view()->exists('default.products')) {
            return view('default.products')->with(['data'=>$products, 
                                                   'title'=>'Table of products', 
                                                   'hTitle'=>$products[0]
                                                   ]);
        }
        //return redirect('default.index')->with(['title' => 'Laravel Project']);  
        abort(404);
    }
    
}
