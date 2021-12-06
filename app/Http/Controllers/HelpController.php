<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Services\FAQService;

class HelpController extends Controller
{
    public  $faq_service ;
    
    public function __construct()
    {
        $this->faq_service = new FAQService();
    }
    
    
    public function faq($category){
        $faqs = $this->faq_service->getAll();
        return view('faq', compact('category','faqs'));
    }
    
    public function sendMail(Request $request){
        $data = array(
            'subject' => $request->subject,
            'emailAddr'=> $request->emailAddr,
            'content'=> $request->content
        );
        Mail::send('mail.mail_form', ['data' => $data], function($message) use ($data){
            $message->from($data['emailAddr']);
            $message->to('numva.201@gmail.com')->subject($data['subject']);
        });
        
        return redirect()->route('help','help');
    }
}
