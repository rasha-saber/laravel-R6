<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
//التاسك
{
    public function index()
    {
        return view('contact');
    }

    public function contactsubmit(Request $request)
    {
    //     // return $request->all();
    //     // // return "form submitted";
    
        $name=$request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
       
        return 'Name : '.$name . 'Email : '. $email . 'Subject : '.$subject .  'Message : '. $message;
    }
}

