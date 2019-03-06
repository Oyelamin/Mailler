<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentMessagesController extends Controller
{
    public function index(){
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'blessingcodephp@gmail.com';
        $password = 'Oyelamin';

        /* try to connect */
        $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

        /* grab emails */
        $emails = imap_search($inbox,'ALL');
        if($emails) {
	
            /* begin output var */
            $output = '';
            
            /* put the newest emails on top */
            rsort($emails);

            
            /* for every email... */
            foreach($emails as $email_number) {
            
                /* get information specific to this email */
                $overview = imap_fetch_overview($inbox,$email_number,0);
                $message = imap_fetchbody($inbox,$email_number,2);
                dd($overview);
            }
        }

    }
}
