<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Mail;
use phpDocumentor\Reflection\Types\Resource_;

class Website extends Controller
{
    public function index(Request $request)
    {
        
        $title = $request->title;
        $des = $request->book_des;
        $data = ['data'=>$des]; 
        $email1 = DB::table('Customer')->pluck('Email');
        $count_email = count($email1);
        for ($i = 0; $i < $count_email; $i++){
            $user['to']= $email1[$i]; 
            $user['tiltle']= $title;     
            Mail::send('admin.mail', $data, function($message) use ($user){
            $message->to($user['to']);
            $message->subject($user['tiltle']);
            });
        }
        
        return view('admin.display_mail'); 
    }

    public function add_mail()
    {
        return view('admin.add_mail');
    }
}