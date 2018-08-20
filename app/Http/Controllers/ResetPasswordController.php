<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $email = 'renouard.julien@gmail.com';
        $password = $request->input('password', '');
        $device = $request->input('device', '');
        $text = 'New administrator password is: ' . $password;


        if (!empty($password)) {
            Mail::send('emails.reset', ['title' => 'HACCP', 'content' => $text, 'device' => $device], function ($message) use ($email, $device) {
                $message->from('haccp.milday@gmail.com', 'HACCP');
                $message->to($email);
                $message->subject('Password reset for device: ' . $device);
            });
        }
    }
}
