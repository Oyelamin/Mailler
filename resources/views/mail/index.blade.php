@extends('layouts.app')

@section('content')

    <div class="container-mail">
            
        <div class="mail-box">
                
            <aside class="sm-side">

                <div class="user-head">

                    <a class="inbox-avatar" href="javascript:;">

                        <i style="color: #dd0202;border: 3px solid rgba(3, 3, 77, 0.151);padding: 5px;border-radius:50px;" class="fas fa-user-circle"></i>

                    </a>

                    <div class="user-name">

                        <h5>
                            
                            <a href="#">Admin Portal</a>
                        
                        </h5>

                        <span>
                            
                            <a href="#">adminmail@Gmail.com</a>
                        
                        </span>

                    </div>

                    <a class="mail-dropdown animated bounceInDown pull-right" href="javascript:;">

                        <i style="color:red;" class="fa fa-chevron-down"></i>

                    </a>

                </div>
                
                <div class="inbox-body">

                    <a href="#myModal" data-toggle="modal"  title="Compose"    class="hvr-bounce-to-right btn btn-compose">

                        Compose

                    </a>

                    <!-- Modal -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade animated bounceInDown" style="display: none;">
                        
                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">
                                    
                                    <button aria-hidden="true" data-dismiss="modal" class="button is-danger is-medium close" type="button">
                                        
                                        X
                                    
                                    </button>
                                    
                                    <h4 class="modal-title">
                                        
                                        Compose
                                    
                                    </h4>
                                </div>

                                <div class="modal-body">

                                    <form action="/send/mail" method="POST" role="form" enctype="multipart/form-data" class="form-horizontal">
                                    
                                        @csrf
                                        <div class="form-group">

                                            <label class="col-lg-2 control-label">To</label>

                                            <div class="col-lg-10">

                                                <input name="to" type="text" placeholder="" id="inputEmail1" class="form-control">

                                            </div>
                                        
                                        </div>
                                        
                                        <div class="form-group">

                                            <label class="col-lg-2 control-label">Subject</label>

                                            <div class="col-lg-10">

                                                <input name="subject" type="text" placeholder="" id="inputPassword1" class="form-control">
                                            
                                            </div>

                                        </div>
                                        
                                        <div class="form-group">

                                            <label class="col-lg-2 control-label">Message</label>

                                            <div class="col-lg-10">

                                                <textarea rows="10" cols="30" class="form-control" id="" name="message"></textarea>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-lg-offset-2 col-lg-10">
                                                <a style="padding: 20px;" href="javascript:voide(0)" onclick="showAttach()" id="showAttach"><i class="fas fa-paperclip"></i></a>
                                                <span style="display: none;" id="attach" class=" animated bounceInDown btn green fileinput-button">

                                                    <i class="fas fa-paperclip"></i>

                                                    <span>Attachment</span>

                                                    {!! Form::file('a_file') !!}

                                                </span>

                                                <button onclick="this.form.submit();this.disabled = true;" class="hvr-bounce-to-right button is-danger" type="submit">
                                                    
                                                    Send
                                                
                                                </button>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->

                    </div><!-- /.modal -->

                </div>

                <ul class="inbox-nav inbox-divider">

                    <li class="active">

                        <a href="#"><i class="fa fa-inbox">
                            
                            </i> <span>Inbox</span>  <span style="border-bottom-left-radius: 30px;height:35px;border:1px solid white;float: right;margin-top:-1px;padding:1px;" class="">2</span>

                        </a>

                    </li>

                    <li>

                        <a href="#">
                            
                            <i class="far fa-share-square"></i> Sent Mail
                        
                        </a>
                    </li>
                    <li>

                        <a href="#">
                            
                            <i class="far fa-star"></i> Important
                        
                        </a>
                    </li>


                    <li>

                        <a href="#">
                            
                            <i class="fas fa-drafting-compass"></i> Drafts 
                            <span style="border-bottom-left-radius: 30px;height:40px;border:1px solid white;float: right;margin-top:-1px;padding:1px;" class="">30</span>
                        
                        </a>
                    </li>

                    <li>

                        <a href="#">
                            
                            <i class="far fa-trash-alt"></i> Trash
                        
                        </a>

                    </li>

                </ul>
    
                <div class="inbox-body text-center">

                    <div class="btn-group">

                        <a class="btn mini btn-primary" href="javascript:;">

                            <i class="fa fa-plus"></i>

                        </a>

                    </div>

                    <div class="btn-group">

                        <a class="btn mini btn-success" href="javascript:;">

                            <i class="fa fa-phone"></i>

                        </a>

                    </div>

                    <div class="btn-group">

                        <a class="btn mini btn-info" href="javascript:;">

                            <i class="fa fa-cog"></i>

                        </a>

                    </div>

                </div>

            </aside>

            <aside class="lg-side">

                <div id="inbox-head" class="inbox-head">

                    <h3>INBOX</h3>

                    <form action="#" class="pull-right position">

                        <div class="input-append">

                            <input type="text" v-model="text" onmouseout="hideDiv()" onclick="showDiv()" v-on:input="shareValue" class="sr-input" placeholder="Search Mail">

                            <button class="btn sr-btn" type="button">
                                
                                <i class="fa fa-search"></i>
                            
                            </button>

                        </div>

                        <div style="display: none;" id="writer" class="box">
                        
                            <p style="border: 1px solid silver;padding:10px;border-radius: 6px;" v-html="text"></p>

                        </div>

                    </form>

                </div>

                @include('layouts.validation')

                <div class="inbox-body">

                    <div class="mail-option">
                        
                        <div class="chk-all">

                            <input type="checkbox" class="mail-checkbox mail-group-checkbox">

                            <div class="btn-group">

                                <a data-original-title="Refresh" data-placement="top" href="#" class="but mini tooltips">

                                    All

                                    <i class="fa fa-angle-down "></i>

                                </a>
                            
                            </div>

                        </div>
                    
                        
                        <div class="btn-group">

                            <a data-original-title="Refresh" data-placement="top"  href="/mail" class="btn mini tooltips">

                                <i class="fas fa-redo"></i>

                            </a>

                        </div>
                        
                        <ul class="unstyled inbox-pagination btn">
                            <a href="javascript:voide(0)" id="showPag" onclick="showPaginator()">Show More</a>
                            <div id="pag" style="display: none;" class="animated bounceInDown">
                                {{$mess_inbox->links('paginate.index')}}
                            </div>
                            

                        </ul>
                    
                    </div>
                    
                    <table class="table table-inbox table-hover">

                        <tbody>

                                <?php if($mess_inbox):?>
                                
                                <?php  foreach($mess_inbox as $inbox):?>

                                @if($inbox)

                            <tr class="unread">

                                <td class="inbox-small-cells">

                                    <input type="checkbox" class="mail-checkbox">

                                </td>

                                <td id="n_color" class="inbox-small-cells">
                                    
                                    <a href="javascript:void(0)" onclick="addColor()">
                                        
                                        <i id="star" class="fa fa-star"></i>
                                    
                                    </a>
                                
                                </td>

                                <td id="add_color" style="display: none;" class="inbox-small-cells">
                                    
                                    <a href="javascript:void(0)" onclick="removeColor()">
                                        
                                        <i id="red" style="color:red;" class="fa fa-star"></i>
                                    
                                    </a>
                                
                                </td>
                                <td style="color: red;" class="view-message  dont-show">
                                    
                                    <a href='/mail/{{$inbox->id}}'>
                                        
                                        <?php echo $inbox->fro_name; ?>
                                    
                                    </a>
                                
                                </td>

                                <td class="view-message "> 

                                <?php

                                    echo "<b>". $inbox->subject."</b> - <small>";

                                    if (strlen($inbox->body) > 50) {

                                            echo $inbox->fro."..";

                                    }else{

                                        echo $inbox->body;

                                    }

                                ?>

                                </td>

                                <td class="view-message  inbox-small-cells">

                                    @if($inbox->attachment > 0)

                                        <i style="color: red;" class="fa fa-paperclip"></i>

                                    @else
                                    @endif

                                </td>

                                <td class=" text-right">

                                    <small> <?php echo $inbox->date;  ?></small>

                                </td>

                            </tr>

                        @else

                        <tr class="unread">

                            <td class="inbox-small-cells">

                                <input type="checkbox" class="mail-checkbox">

                            </td>

                            <td class="inbox-small-cells">
                                
                                <i class="fa fa-star"></i>
                            
                            </td>

                            <td class="view-message  dont-show">
                                
                                <a href='/mail/{{$inbox->id}}'>
                                    
                                    <?php echo $inbox->fro_name; ?>
                                
                                </a>
                            
                            </td>

                            <td class="view-message "> 

                                <?php

                                    echo "<b>". $inbox->subject."</b> - <small>";

                                    if (strlen($inbox->body) > 50) {

                                        echo $inbox->fro."..";

                                    }else{

                                        echo $inbox->body;

                                    }

                                ?>

                            </td>

                            <td class="view-message  inbox-small-cells">

                                    @if($inbox->attachment > 0)

                                        <i class="fa fa-paperclip"></i>

                                    @else

                                    @endif

                            </td>

                            <td class=" text-right">

                                <small> 
                                    
                                    <?php echo $inbox->date;  ?>
                                
                                </small>

                            </td>

                        </tr>
            
                        @endif

                        <?php endforeach; ?>

                        <?php endif;?>
                            
                        </tbody>

                    </table>

                </div>

            </aside>

        </div>

    </div>
    <script>
        
        function showPaginator(){

            document.getElementById('pag').style.display='block';
            document.getElementById('showPag').style.display= 'none';

        }
        function showAttach(){

            document.getElementById('showAttach').style.display='none';
            document.getElementById('attach').style.display='block';

        }

    </script>
  
@endsection

