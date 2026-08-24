<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminUpdatePostController extends Controller
{
    public function show(int $id): View
    {
        $article = Article::findOrFail($id);

        return view('default.update_post', ['article' => $article, 'title' => 'Update article']);
    }

    public function create(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $article = Article::findOrFail($request->input('id'));

        $this->authorize('update', $article);

        $article->fill($request->only('name', 'img', 'text'));
        $request->user()->articles()->save($article);

        return redirect()->back()->with('message', 'Article was updated');
    }
}
