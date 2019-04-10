<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Gate;

class AdminPostController extends Controller
{
    //


public function show() {
        if(view()->exists('default.add_post')) {
            $title = 'Add new article';
            return view('default.add_post')->with('title', $title);
        }
        abort(404);
    }

    public function create(Request $request) {
        
        if(Gate::denies('add-article')) {
            return redirect()->back()->with(['message'=>'You have no permisions']);
        }

        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $user = Auth::user();
        $data = $request->all();

        $res = $user->articles()->create([
            'name'=>$data['name'],
            'img'=>$data['img'],
            'text'=>$data['text']
        ]);

        return redirect()->back()->with('message','Material was added');
        
    }

}
