@extends('layouts.app')
@section('content')
    <h3>
        Hey you have a message via MailApp <i class="fas fa-mobile-alt"></i><span style="color: red;font-size: 15px;"> by Blessing</span>
    </h3>
    <div style="margin: auto;" class="notification">
        {{$bodyMessage}}
    </div>
    <hr>
    <p>
        Sent Via MailApp to <a href="{{$to}}">{{$to}}</a>
    </p>
@endsection