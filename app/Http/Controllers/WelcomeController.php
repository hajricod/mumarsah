<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function contact(Request $request) {
        
        $data = array('name'=>"Virat Gandhi");
        
        Mail::send([], $data, function($message) {
            $message->to('hajricod@gmail.com', 'Ahmed')->subject('INFO');
            $message->from('info@mumarasah.com','Info Mumarasah');
        });

        echo "Basic Email Sent. Check your inbox.";
         
    }

    protected function validateContact() {

    }
}
