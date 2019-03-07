
@extends('layouts.app')

@section('content')
<div class="container-mail">
     <div class="mail-box">
                      <aside class="sm-side">
                          <div class="user-head">
                              <a class="inbox-avatar" href="javascript:;">
                                <i style="color: red;" class="fas fa-user-circle"></i>
                                  {{-- <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg"> --}}
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
                              <a style="cursor:not-allowed;" href="" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                                  Compose
                              </a>
                              <!-- Modal -->
                              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="button is-danger is-medium close" type="button">X</button>
                                              <h4 class="modal-title">Reply</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form method="POST" action="/mail/reply/{{$inbox->id}}" enctype="multipart/form-data" role="form" class="form-horizontal">
                                                  @csrf
                                           
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
                                                          <button class="btn btn-send" type="submit">Send</button>
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

                          <div class="inbox-body">
                             <div class="mail-option">
                                 
                                     
                                     <div class="btn-group">
                                        
                                         <a data-original-title="Refresh" data-placement="top" href="/mail" class="btn mini tooltips">
                                            <i style="color: red;font-size:20px; width:90px;" class="fas fa-long-arrow-alt-left"></i>
                                         </a>
                                     </div>
                                 
    
                                 <div class="btn-group">
                                     <a data-original-title="Refresh" data-placement="top" href="#" class="btn mini tooltips">
                                        <i style="color: red;font-size:17px; width:90px;" class="fas fa-redo"></i>
                                     </a>
                                 </div>
                                 <div class="btn-group hidden-phone">
                                        <a data-original-title="Refresh" data-placement="top" href="#" class="btn mini tooltips">
                                            <i style="color: red;font-size:17px; width:90px;" class="fas fa-trash-alt"></i>
                                        </a>
                                 </div>
                                 <div style="" class="btn-group">
                                    <a data-toggle="modal"  title="Compose" href="#myModal" href="#" class="btn mini blue"> 
                                        <i style="color: red;font-size:20px; width:90px;" class="fas fa-reply"></i> Reply
                                    </a>
                                       
                                </div>
                             </div>
                             @include('layouts.validation')
                              <table class="table table-inbox table-hover">
                                <tbody>

                                  <hr>
                                  <div class="first-show">
                                      {{$inbox->subject}}
                                  </div>
                                  <div class="m-show">
                                        <div class="s-show">
                                                <i style="font-size:30px;color: red;" class="fas fa-user-circle"></i>
                                                <div class="fro-name">
                                                    <div class="inf">
                                                        {{$inbox->fro_name}} <small>{{$inbox->fro}}</small>
                                                    </div>
                                                    
                                                </div>
                                                
                                        </div>
                                        <div class="date"><
                                            <small style="color:rgb(121, 5, 5);">
                                             sent on   {{$inbox->date}}
                                            </small>
                                            
                                        ></div>
                                  </div>
                                    
                                 <?php echo $inbox->body;?>
                                
                              </tbody>
                              
                              </table> 
                              
                          </div>
                      </aside>
                  </div>
    </div>
@endsection

