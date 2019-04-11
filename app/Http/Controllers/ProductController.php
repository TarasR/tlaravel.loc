<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function execute($slug) {
        $product = Product::whereSlug($slug)->firstOrFail();
        
        //dd($product->id);
        
        return view('default.product'. $product->view)->with(['data'=>$product, 
                                                              'title'=>'Table of product'
                                                              
                                                             ]);
        
    }
}
