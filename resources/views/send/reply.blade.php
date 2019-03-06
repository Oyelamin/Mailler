
@extends('layouts.app')
@section('content')

    <div class="notification">
        <div class="cont">

            <h1 style="padding: 10px;">
                
                Re: {{$subject}}
            
            </h1><br>

                {{$bodyMessage}}

            <hr>
            <h3>
                <i class="fas fa-user-circle"></i>{{$replyTo_name}}
            </h3><
            <small>
                {{$replyTo_address}}
            </small>> <br>
            <p>
                On {{$date}} - {{$replyTo_name}}({{$replyTo_address}})  wrote:
            </p>

            <p>
                <?php echo $body_mess ?>
            </p>

        </div>
    </div><hr>
@endsection
