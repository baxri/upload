<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $email = 'giorgi.bibilashvili89@gmail.com';
        $password = $request->input('password', '');
        $text = 'New administrator password is: ' . $password;

        if (!empty($password)) {
            Mail::send('emails.reset', ['title' => 'HACCP',  'content' => $text], function ($message) use ($email) {
                $message->from('haccp.milday@gmail.com', 'HACCP');
                $message->to($email);
                $message->subject('Password Reset');
            });
        }
    }
}
