<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function show()
    {
        return view('default.about', ['title' => 'About']);
    }
}
