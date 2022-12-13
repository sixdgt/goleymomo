<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Subscribe;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    
    function subscribe(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'message' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return new JsonResponse(['success' => false, 'message' => $validator->errors()], 422);
        }  

        $email = $request->email;
        $name = $request->name;
        $message = $request->message;

        $subscriber = Subscriber::create([
                'email' => $email,
                'name' => $name,
                'message' => $message,
            ]
        ); 

        if ($subscriber) {
            \Mail::send('emails.contact', array(
                'name' => $name,
                'email' => $email,
                'messages' => $message,
            ), function($message) use ($request){
                $message->from($request->email);
                $message->to('goleymomo@gmail.com', 'Contact Us')->subject('contact us');
            });

            return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    
        }
    }
}
