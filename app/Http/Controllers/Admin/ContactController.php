<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;        
    }
    
    public function show()       
    {        
//        dump($this->request);
        if($this->request->isMethod('post')) {
            
            $rules = [
                'email' => 'required|email',
                'password' => 'required'
            ];
            //dump($this->request->all());

            $this->validate($this->request,$rules);
        }
        
        dump($this->request->all());
        
        //print_r($this->request->all());
        //echo "<h1> {$this->request->email}</h1>";

        if (view()->exists('default.contact'))
        {
            $data = array('title'=>'LARAVEL PROJECT CONTACTS');
            return view('default.contact',$data);
        }
        else 
        {
            abort(404);
        }
    }
}

/*
ContactController
*/