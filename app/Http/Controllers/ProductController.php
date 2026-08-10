<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function execute(string $slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();

        return view('default.product')->with([
            'data' => $product,
            'title' => 'Table of product'

        ]);
    }
}
