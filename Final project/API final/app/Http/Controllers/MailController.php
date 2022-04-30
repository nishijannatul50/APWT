<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function sendEmail(){
    $details = [
        'title' => 'Adv Webtech Project',
        'body' => 'This is test mail.'
    ];

    Mail::to("jannatulferdousn19@gmail.com")->send(new TestMail($details));
    return "Email Send";
}
}