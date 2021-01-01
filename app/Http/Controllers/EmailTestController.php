<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;

class EmailTestController extends Controller
{
    public function simpleMail()
    {
        $subject = "TEST MAIL WITH SIMPLE MAIL";
        $data['user'] = User::find(1)->toArray();
        $data['invoiceData'] = ['TripId'=> 98798798456,'Name'=> "AssadUllah",'Rate'=> "$ 211.0",];
        $email = $data['user']['email'];
        
        Mail::send('mail.sample', $data, function($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
        });
    }

    public function mailUsingMailable()
    {
        $data['user'] = User::find(1)->toArray();
        $data['invoiceData'] = ['TripId'=> 98798798456,'Name'=> "AssadUllah",'Rate'=> "$ 211.0",];
        $data['subjectMail'] = "TEST MAIL WITH MAILABLE CLASS";
        $email = $data['user']['email'];

        Mail::to($email)->send(new OrderShipped($data));
    }

    public function mailUsingNotification()
    {
        $user = User::find(1);
        $user->notify(new InvoicePaid($user));
    }
}
