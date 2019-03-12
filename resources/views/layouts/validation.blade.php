@if (count($errors) > 0)

    <div id="verify" style="transition: right 4s ease-in;-webkit-transition: right 4s ease-in;-moz-transition: right 4s ease-in;margin-bottom:-20px;padding: 10px; margin-top:7px;width:50%;text-align:center;margin: auto;height:60px;" class="animated bounceInDown notification is-danger">

        @foreach ($errors->all() as $error)

            <div style="margin-top:20px;">
            
                {{$error}}
            
            </div>

        @endforeach

    </div>
    <br><br>
   
@endif

@if (session('success'))

    <div id="verify" style="transition: right 4s ease-in;-webkit-transition: right 4s ease-in;-moz-transition: right 4s ease-in;padding: 10px; margin-top:7px;width:50%;text-align:center;margin: auto;height:60px;" class="notification is-success animated bounceInDown">
        
        <div style="margin-top:20px;">
        
            {{session('success')}}
        
        </div>

    </div>

    <br><br>

@endif

@if (session('error'))

    <div id="verify" style="transition: right 4s ease-in;-webkit-transition: right 4s ease-in;-moz-transition: right 4s ease-in;padding: 10px; margin-top:7px;width:50%;text-align:center;margin: auto;height:60px;" class="notification is-danger animated bouceInDown">
        
        <div style="margin-top:20px;">
        
            {{session('error')}}
        
        </div>

    </div>
    
    <br><br>

@endif