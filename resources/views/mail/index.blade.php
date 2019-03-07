@extends('layouts.app')

@section('content')

<div class="container-mail">
        
     <div class="mail-box">
            @include('layouts.validation')
                      <aside class="sm-side">
                          <div class="user-head">
                              <a class="inbox-avatar" href="javascript:;">
                                <i style="color: #dd0202;" class="fas fa-user-circle"></i>
                              </a>
                              <div class="user-name">
                                  <h5><a href="#">Blessing Ajala</a></h5>
                                  <span><a href="#">blessingcodephp@Gmail.com</a></span>
                              </div>
                              <a class="mail-dropdown pull-right" href="javascript:;">
                                  <i style="color:red;" class="fa fa-chevron-down"></i>
                              </a>
                          </div>
                          
                          <div class="inbox-body">
                              <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                                  Compose
                              </a>
                              <!-- Modal -->
                              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="button is-danger is-medium close" type="button">X</button>
                                              <h4 class="modal-title">Compose</h4>
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
                                                          <span class="btn green fileinput-button">
                                                            <i class="fas fa-paperclip"></i>
                                                            <span>Attachment</span>
                                                            {!! Form::file('a_file') !!}
                                                          </span>
                                                          <button class="button is-danger" type="submit">Send</button>
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
                                  <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>
    
                              </li>
                              <li>
                                  <a href="#"><i class="far fa-share-square"></i> Sent Mail</a>
                              </li>
                              <li>
                                  <a href="#"><i class="far fa-star"></i> Important</a>
                              </li>
                              <li>
                                  <a href="#"><i class="fas fa-drafting-compass"></i> Drafts <span class="label label-info pull-right">30</span></a>
                              </li>
                              <li>
                                  <a href="#"><i class="far fa-trash-alt"></i> Trash</a>
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
                                <h3>Inbox Messages</h3>
                                <form action="#" class="pull-right position">
                                    <div class="input-append">
                                        <input type="text" onmouseout="hideDiv()" onclick="showDiv()" v-on:input="shareValue" class="sr-input" placeholder="Search Mail">
                                        <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                    <div style="display: none;" id="writer" class="box">
                                    
                                        <p style="border: 1px solid silver;padding:10px;border-radius: 6px;" v-html="text"></p>

                                    </div>
                                </form>
                            </div>
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
                                     {{$mess_inbox->links()}}
                                 </ul>
                             
                             </div>
                             
                              <table class="table table-inbox table-hover">
                                <tbody>
                                        <?php if($mess_inbox):?>
                                        
                                        <?php  foreach($mess_inbox as $inbox):?>
                                        @if($unseen_message === $inbox->body)
                                        {{-- @if($inbox) --}}
                                  <tr class="unread">
                                      <td class="inbox-small-cells">
                                          <input type="checkbox" class="mail-checkbox">
                                      </td>
                                      <td id="n_color" class="inbox-small-cells"><a href="javascript:void(0)" onclick="addColor()"><i id="star" class="fa fa-star"></i></a></td>
                                      <td id="add_color" style="display: none;" class="inbox-small-cells"><a href="javascript:void(0)" onclick="removeColor()"><i id="red" style="color:red;" class="fa fa-star"></i></a></td>
                                      <td style="color: red;" class="view-message  dont-show"><a href='/mail/{{$inbox->id}}'><?php echo $inbox->fro_name; ?></a></td>
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
                                       <small> <?php echo $inbox->date;  ?></small>
                                    </td>
                                  </tr>

                                @else
                                <tr class="unread">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                    <td class="view-message  dont-show"><a href='/mail/{{$inbox->id}}'><?php echo $inbox->fro_name; ?></a></td>
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
                                     <small> <?php echo $inbox->date;  ?></small>
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
     function addColor(){

            document.getElementById('add_color').style.display='none';

            document.getElementById('n-color').style.display='block';

        }
        function removeColor(){

            document.getElementById('add_color').style.display='block';

            document.getElementById('n_color').style.display='none';

        }
        function showDiv(){

            document.getElementById('writer').style.display="block";

        }

        function hideDiv(){

            document.getElementById('writer').style.display='none';

        }

        new Vue({

            el: '#inbox-head',

            data:{

                text: ''

            },
            methods:{
                shareValue: function(event){
                    this.text= event.target.value;
                }
            }
        });
    </script>
       

  
@endsection

