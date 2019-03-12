<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\PhpImap\Mailbox;
use Gmail;
use LaravelGmail;

class FetchInboxController extends Controller
{
   public function index(){

      $messages = LaravelGmail::message()->subject('test')->unread()->preload()->all();
      foreach ( $messages as $message ) {
         $body = $message->getHtmlBody();
         $subject = $message->getSubject();
      }

   }
}
//Web client 1