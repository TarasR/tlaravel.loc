<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductsAddController extends Controller
{
    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'price' => 'required|digits_between:0,1000000',
            ]);

            if ($validator->fails()) {
                return redirect()->route('productsAdd')->withErrors($validator)->withInput();
            }

            Product::create($request->only('title', 'slug', 'price', 'description'));

            return redirect()->route('products');
        }

        $slug = Str::random(rand(30, 70));

        return view('default.add_product', ['title' => 'Add product', 'slug' => $slug]);
    }
}
