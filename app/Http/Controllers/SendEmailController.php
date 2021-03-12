<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;



use Mail;

class SendEmailController extends Controller
{
    //
    function index()
    {
     return view('index');
    }


    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

     Mail::to('talalothmanse@gmail.com')->send(new SendMail($data));
     return redirect()->route('backToEmailForm')->with('success', 'Thanks for contacting me!');

    }

   


}
