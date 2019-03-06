@if (count($errors) > 0)
    <div style="margin-top:50px;" class="box notification is-danger">
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    </div><br><br>
   
@endif

@if (session('success'))
    <div style="margin-top:50px;" class="box notification is-success">
        <div>{{session('success')}}</div>
    </div><br><br>

    
@endif

@if (session('error'))
    <div style="margin-top:50px;" class="box notification is-danger">
        <div>{{session('error')}}</div>
    </div><br><br>

    
@endif
