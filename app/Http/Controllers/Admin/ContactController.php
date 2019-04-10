<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContactRequest;

use Validator;

class ContactController extends Controller
{
    //
    
    protected $request;

/*
    //public function __construct(Request $request)
    public function __construct(ContactRequest $request)
    {
        $this->request = $request;        
    }
*/    
    //public function store(ContactRequest $request)       
    public function store(Request $request)       
    {        

//        dump($this->request);
        if($request->isMethod('post')) {
            // Ручная валидация данных
            

            $message = [
                'name.required' => 'Same message'
            ];
            $validator = Validator::make($this->request->all(),['email' => 'required'],$message);
            if($validator->fails()) {

                //return redirect()->route('contact')->withErrors($validator)->withInput();
            }


            // Ручная валидация данных

            // Автоматическая валидация данных
            /* 
            $rules = [
                'email' => 'required|email',
                'password' => 'required'
            ];
            //dump($this->request->all());

            $this->validate($this->request,$rules);
            //dump($errors->all());
            */
            // Автоматическая валидация данных
        }
        
        //dump($this->request->all());
        
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

    public function show(Request $request)  
    {        
    //Работа с сесиями старт 

        //$result = $request->session()->get('key','default');
        //$result = $request->session()->all();
//        $result = $request->session()->put('key', 'value');

//        dump($result);
//Работа с сесиями конец        

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