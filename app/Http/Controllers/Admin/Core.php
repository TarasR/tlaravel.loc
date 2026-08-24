<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\View\View;

class Core extends Controller
{
    public function getArticles(): View
    {
        $articles = Article::all();

        return view('default.articles', ['articles' => $articles, 'title' => 'Articles']);
    }

    public function getArticle(int $id): View
    {
        $article = Article::findOrFail($id);

        return view('default.article', ['article' => $article, 'title' => $article->name]);
    }
}
