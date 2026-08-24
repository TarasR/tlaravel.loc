<?php

namespace App\Http\Controllers;

use App\Product;

class ProductsController extends Controller
{
    public function execute()
    {
        $products = Product::all();

        return view('default.products', [
            'data' => $products,
            'title' => 'Table of products',
        ]);
    }
}
