<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imap;
use App\Inbox;
use DB;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    
    public function index(Inbox $inbox)
    {
       
        ini_set('max_execution_time','300');

        $email= new Imap();  //All Messages
    
        $inbox= null;
        //All Messages
        $connection= $email->connect(

            '{imap.gmail.com:993/imap/ssl}INBOX',   //Host Name
            'blessingcodephp@gmail.com',    //Username
            'Oyelamin'  //Password

        );
       
        //All Messages
        if($connection){
            
            //Inbox Array
            $inboxs= $email->getMessages('html');

        }

        //All Messages
        foreach($inboxs['data'] as $inbox){
            
            $subject= $inbox['subject'];
            $message= $inbox['message'];
            $date= $inbox['date'];
            $from_address= $inbox['from']['address'];
            $from_name= $inbox['from']['name'];
            $attachment= count($inbox['attachments']);
            
            // Store all Messages
           Inbox::create([

               'subject' => $subject,

               'body' => $message,

               'fro' => $from_address,

               'fro_name'  => $from_name,

               'date' => $date,

               'attachment' => $attachment

           ]);

        }

        $mess_inbox = DB::table('inboxes')->orderBy('id','desc')->groupBy('date')->paginate(30);

        return view('mail.index')->with('mess_inbox',$mess_inbox);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 
     * Display the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {

        $url= $_SERVER['REQUEST_URI'];

        $id= trim($url,'/mail');

        $inbox= DB::table('inboxes')->where('id', $id)->first();

        return view('mail.show')->with('inbox',$inbox);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inbox $inbox)
    {
        
        $inbox->delete();

        return redirect('/mail');

    }
}
