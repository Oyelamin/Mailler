<?php

namespace App\Http\Controllers;
use App\Inbox;
use Illuminate\Http\Request;
use DB;
use Mail;
class ReplyController extends Controller
{
    public function index(){

        $uri= $_SERVER['REQUEST_URI'];

        $id= trim($uri,'/mail/reply');

        $inbox= DB::table('inboxes')->where('id', $id)->first();
       
        request()->validate([

            'message' => 'min:10'

        ]);

        $data= array(

            'to' => $inbox->fro,

            'subject' => $inbox->subject,

            'bodyMessage' => request('message'),

            'replyTo_address' => $inbox->fro,

            'replyTo_name' => $inbox->fro_name,

            'body_mess' => $inbox->body,

            'date' => $inbox->date,
            
            'a_file' => request('a_file')

        );

        Mail::send('send.reply', $data, function($message) use ($data)
        {

            $message->to($data['to']);

            $message->replyTo($data['replyTo_address'], $data['replyTo_name']);

            $message->subject($data['subject']);
            if(isset($data['a_file'])){
                $message->attach($data['a_file']->getRealPath(),array(

                    'as' => 'a_file.'.$data['a_file']->getClientOriginalExtension(),
                    'mime' => $data['a_file']->getMimeType()
                    
                    )

                );
            }
            

        });
        return redirect('/mail');
       
    }
}
