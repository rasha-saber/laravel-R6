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





    function uploadForm() {
        return view('upload');
    }

    // public function upload(Request $request){
    //     $file_extension = $request->image->getClientOriginalExtension();
    //     $file_name = time() . '.' . $file_extension;
    //     $path = 'assets/images';
    //     $request->image->move($path, $file_name);
        
    //     return 'Uploaded';
    // }


    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);
    
    //     $file_extension = $request->image->getClientOriginalExtension();
    //     $file_name = time() . '.' . $file_extension;
    //     $path = $request->image->storeAs('public/images', $file_name);
    
    //     return 'Uploaded';
    // }

    function indexE() {
        return view('index');
    }


    function about() {
        return view('about');
    }
}

