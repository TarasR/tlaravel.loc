<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('default.contact', ['title' => 'Contacts']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to(config('mail.from.address'))->send(new ContactMail($request->only('name', 'email', 'message')));

        return redirect()->route('contact')->with('message', 'Your message has been sent!');
    }
}
