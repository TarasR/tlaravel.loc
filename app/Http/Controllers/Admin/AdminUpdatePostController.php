<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Article;
use Gate;

class AdminUpdatePostController extends Controller
{
    //
    public function show(Request $reqiuest, $id) {
        
        $article = Article::find($id);
        //dump($article->text);
        
        if(view()->exists('default.update_post')){
            $title = 'Update article';
            return view('default.update_post')->with('article', $article)->with('title',$title);
        }
        abort(404);
    }

    public function create(Request $request) {

        $this->validate($request, [
            'name'=>'required'
        ]);

        $user = Auth::user();
        $data = $request->except('_token');
        $article = Article::find($data['id']);

        //if(Gate::/*forUser()->*/allows('update-article',$article)) {
        if(Gate::/*forUser()->*/allows('update',$article)) {            
            $article->name = $data['name'];
            $article->img = $data['img'];
            $article->text = $data['text'];
    
            $res = $user->articles()->save($article);
            return redirect()->back()->with('message', 'Article was updated');             
        }
        return redirect()->back()->with(['message' => 'You have\'t acsess']);





    }
}
