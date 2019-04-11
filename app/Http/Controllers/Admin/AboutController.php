<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AboutController extends Controller
{
    //
    public function show()
    {
        if(view()->exists('default.about')){

            $page = DB::select("select `name`, `text` from `pages` where `alias` = :alias ",['alias'=>'about']);            
            $title = 'My project About';

            /*            
            $data = DB::select("select * from articles");
            $tmpkeys = $data[0];
            */
            //dump($page);
            //return view('default.about')->with('data', $data)->with('title', $title)->with('hTitle',$tmpkeys);

            return view('default.about')->with('page', $page[0])->with('title', $title);
        }
    }
}
