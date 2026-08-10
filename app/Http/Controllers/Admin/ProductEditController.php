<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductEditController extends Controller
{
    //
    public function execute(Product $product, Request $request)
    {
        //$product = Product::find($slug);
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'price' => 'required|digits_between:0,1000000'
            ]);

            if ($validator->fails()) {
                return redirect()->route('productEdit', ['product' => $input['id']])->withErrors($validator);
            }

            $product->fill($input);
            if ($product->update()) {
                return redirect('products');
            }
        }

        $old = $product->toArray();
        if (view()->exists('default.edit_product')) {
            $title = 'Edit product';
            //$data = $old;
            return view('default.edit_product')->with('data', $old)->with('title', $title);
        }
        abort(404);
    }

    public function destroy(Product $product, int $id)
    {

        if ($product::destroy($id)) {
            return redirect()->route('products');
        }
    }
}
