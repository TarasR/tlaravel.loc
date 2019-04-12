<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
Use Validator;

use Illuminate\Support\Str;



class ProductsAddController extends Controller
{
    //
    public function execute (Request $request) {
        if($request->isMethod('post')) {

            /*$this->validate($request, [
                'title' => 'required|max:255',
                //'slug' => 'required|alpha_dash',
                'price' => 'required|digits_between:0,1000000'
            ]);*/           

            
            $product = new Product;

            $data = $request->all();
            //dd($data);
            $validator = Validator::make($data, [
                'title' => 'required|max:255',
                //'slug' => 'required|alpha_dash',
                'price' => 'required|digits_between:0,1000000'
            ]);

            $res = $product->create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'price' => $data['price'],
                'description' => $data['description']
            ]);
            if($validator->fails()) {
                return redirect()->route('productsAdd')->withErrors($data)->withInput();
            }
            
            return redirect()->route('products');
                
        }
        


        if(view()->exists('default.add_product')) {            
            $slug = Str::random(rand ( 30 , 70) );

            $title = 'Page add product';            
            return view('default.add_product')->with(['title' => $title, 'slug' => $slug]);
        }
        abort(404);
    }
}
