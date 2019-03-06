<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Send;
class SendMailController extends Controller
{
    public function index(Request $request){

        request()->validate([
            'to' => 'required|email',
            'subject'=> 'min:3',
            'message' => 'min:10'
        ]);
        $data= array(
            'to' => request('to'),
            'subject' => request('subject'),
            'bodyMessage' => request('message'),
            'a_file' => request('a_file')
        );
        $attach= request('a_file');
        Mail::send('send.temp', $data, function($message) use ($data){

            $message->from('blessingcodephp@gmail.com',"Blessing Ajala");
            $message->to($data['to']);
            $message->subject($data['subject']);
            // if(!empty($attach)){
            $message->attach($data['a_file']->getRealPath(),array(

                'as' => 'a_file.'.$data['a_file']->getClientOriginalExtension(),
                'mime' => $data['a_file']->getMimeType()
                
            )

            );
            // }
            
        });
        return redirect('/mail')->with('success','Mail Sent!');
    }
   
}
