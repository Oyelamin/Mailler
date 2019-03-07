@extends('layouts.app')

@section('content')

    <div style="padding:20px;border-radius:10px;border: 2px solid silver;background: rgb(243, 242, 242);" class="notification">

            <h2 class="h2">{{$subject}}</h2> <<small style="text-align:right;">From Admin Portal></small><br><br>
        
        <h6 style="font-size: 15px;color:silver;">{{$bodyMessage}}</h6>
        <hr>
        <small style="float:left;">Powered by <span ><a style="color: green;text-decoration: none;" href="https://initsng.com">INITS LIMITED SOFTWARE SOLUTION</a></span> </small><br><br>
        <i style="float:right;color: silver;">Sent via <span style="color: red;" class="send-span">MailApp</span> by Blessing </i> 
    </div>

@endsection