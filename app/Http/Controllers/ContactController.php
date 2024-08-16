<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
         return view('contact');
    } 

    public function sendContact(Request $request){




        $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);
    // $data = [
    //     'name' => $request->name,
    //     'email' => $request->email,
    //     'subject' => $request->subject,
    //     'message' => $request->message,
    // ];
    Mail::to('rashasaer199@gmail.com')->send(new ContactMail($data));
    return back()->with('success', 'your message has been sent successfully');
}
}
