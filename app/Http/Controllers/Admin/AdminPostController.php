<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class AdminPostController extends Controller
{
    public function show()
    {
        return view('default.add_post', ['title' => 'Add new article']);
    }

    public function create(Request $request)
    {
        $this->authorize('add', new Article);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $request->user()->articles()->create($request->only('name', 'img', 'text'));

        return redirect()->back()->with('message', 'Material was added');
    }
}
