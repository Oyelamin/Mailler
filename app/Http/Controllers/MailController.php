<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
