@extends('backend.layout.app')

@push('css')
    
      <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/material/material.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/material_style.css')}}">

    <!-- data tables -->
    <link href="{{asset('backend/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- animation -->
    <link href="{{asset('backend/assets/css/pages/animate_page.css')}}" rel="stylesheet">
    <!-- Template Styles -->
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
    <!-- dropzone -->
    <link href="{{asset('backend/assets/plugins/dropzone/dropzone.css')}}" rel="stylesheet" media="screen">
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css')}}" />



@endpush()


@section('content')
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add User  Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Staff</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Staff Details</li>
                            </ol>
                        </div>
                    </div>

                                      <form id="user_form" action=" @if(isset($user))
                                      {{ route('user.update',$user->id) }} @else {{ route('user.store') }} @endif" method="POST">

                                      @if (isset($user))
                                        @method('PATCH')
                                      @endif
                                      @csrf
                     <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="card-head">
                                        <header>Basic Information</header>
                                        <button id = "panel-button" 
                                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
                                           data-upgraded = ",MaterialButton">
                                           <i class = "material-icons">more_vert</i>
                                        </button>
                                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                           data-mdl-for = "panel-button">
                                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                                        </ul>
                                    </div>

                                    <div class="card-body row">
                                        <div class="col-lg-6 p-t-20"> 
                                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                             <input class = "mdl-textfield__input" type = "text" id = "txtFirstName" name="name" value="{{@$user->name}}">
                                             <label class = "mdl-textfield__label">Name</label>
                                             @error('name')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror()
                                          </div>
                                        </div>
                                         <div class="col-lg-6 p-t-20"> 
                                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                             <input class = "mdl-textfield__input" name="email" type = "email" id = "txtemail" value="{{@$user->email}}">
                                             <label class = "mdl-textfield__label" >Email</label>
                                              <span class = "mdl-textfield__error">Enter Valid Email Address!</span>
                                              @error('email')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror()
                                          </div>
                                        </div>
                                        <div class="col-lg-6 p-t-20"> 
                                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                             <input name="password" class = "mdl-textfield__input" type = "password" id = "txtPwd">
                                             <label class = "mdl-textfield__label" >Password</label>
                                             @error('password')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror()
                                          </div>
                                        </div>
                                        <div class="col-lg-6 p-t-20"> 
                                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                             <input name="password_confirmation" class = "mdl-textfield__input" type = "password" id = "txtConfirmPwd">
                                             <label class = "mdl-textfield__label" >Confirm Password</label>
                                          </div>
                                        </div>

                                        <div class="col-lg-12 p-t-20">
                                        <label class="control-label col-md-3">Roles</label>
                                         @error('roles')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror()
                                        

                                        <div class="row">

                                          @if (isset($roles) && count($roles))
                                            @foreach($roles as $role)
                                            
                                           <div class="col-md-2 col-sm-2 col-4">
                                            <label>
                                            <input type="checkbox" name="roles[{{$role->id}}]" class="option-input checkbox" {{isset($user) && in_array($role->id,role_name($user)) ? 'checked' : ''}} />
                                            <h5>{{$role->name}}</h5>
                                          </label>
                                           </div>

                                           @endforeach()
                                           @else 
                                           <h2 class="text-center">No roles found</h2>
                                          @endif
                                          </div> 
                                        </div>
                                       

                                           </form>
                                        
                                        <div class="col-lg-12 p-t-20">
                                        <label class="control-label col-md-3">Upload Profile Pic</label>
                                         <form  style="display:block;" id="user_dropzone" action="{{ url('/dropzone') }}" class="dropzone" method="POST">
                                          @csrf
                                         
                                            </form>
                                           </div>

                                        <div class="col-lg-12 p-t-20"> 
                                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                                            
                                          </div>
                                         </div>
                                         <div class="col-lg-12 p-t-20 text-center"> 
                                            <button onclick="document.getElementById('user_form').submit()" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                                        </div>
                                    </div>
                                       
                                </div>

                            </div>
                            
                        </div> 
                   
                </div>
            </div>
            <!-- end page content -->
            
@endsection

@push('scripts')
    <!-- start js include path -->
    <script src="{{asset('backend/assets/plugins/popper/popper.min.js')}}" ></script>
    
    <script src="{{asset('backend/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
    <!-- Common js-->
    <script src="{{asset('backend/assets/js/app.js')}}" ></script>
    <script src="{{asset('backend/assets/js/layout.js')}}" ></script>
    <script src="{{asset('backend/assets/js/theme-color.js')}}" ></script>
    <!-- Material -->
    <script src="{{asset('backend/assets/plugins/material/material.min.js')}}"></script>

    <!-- animation -->
    <script src="{{asset('backend/assets/js/pages/ui/animations.js')}}" ></script>
    <script src="{{asset('backend/assets/js/pages/material_select/getmdl-select.js')}}" ></script>
    <script  src="{{asset('backend/assets/plugins/material-datetimepicker/moment-with-locales.min.js')}}"></script>
    <script  src="{{asset('backend/assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
    <script  src="{{asset('backend/assets/plugins/material-datetimepicker/datetimepicker.js')}}"></script>
    <!-- dropzone -->
    <script src="{{asset('backend/assets/plugins/dropzone/dropzone.js')}}" ></script>
    <script src="{{asset('backend/assets/plugins/dropzone/dropzone-call.js')}}" ></script>
    <!-- end js include path -->

    <script>
       Dropzone.autoDiscover = false;

   $(document).ready(function () {

        var names = [];
        $("#user_dropzone").dropzone({
            maxFiles: 2000,
            maxFiles: 1,
            addRemoveLinks: true,
            url: "{{url('/upload_user_image')}}",
            success: function (file, response) {
                console.log(response);
            },
 //             removedfile: function(file) {

 //    x = confirm('Do you want to delete?');
 //    if(!x)  return false;
    
 //    for(var i=0;i<file.length;++i){

 //      if(file[i]==file.name) {

 {{-- //        $.post('{{url('//remove/dropzone')}}',  --}}
 {{-- //             {name:file[i],_token:{{csrf_token()}}}, --}}
 //           function(data,status){
 //             alert('file deleted');
 //             });
 //       }
 //    }
 // }
        });
   });
    </script>
@endpush