<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function show()
    {
        if (view()->exists('default.index')) {
            return view('default.index')->withTitle('Laravel Project');
        }
        return view('home');
    }
}
