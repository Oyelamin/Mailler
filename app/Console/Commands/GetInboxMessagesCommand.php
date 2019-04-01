<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imap;   //The Imap 
use App\Inbox;

class GetInboxMessagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:inbox';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will Fetch all inbox messages from the gmail account';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
            if(array_key_exists('name',$inbox['from'])){
                $name_sender= $inbox['from']['name'];
            }else{
                $name_sender = "NO Name User";
            }
            $from_name= $name_sender;
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
        $this->info("Inbox Message Collected Successfully!");

    }
}
