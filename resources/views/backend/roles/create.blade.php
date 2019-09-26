@extends('backend.layout.app')

@push('css')
    
      <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/material/material.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/material_style.css')}}">

    <!-- animation -->
    <link href="{{asset('backend/assets/css/pages/animate_page.css')}}" rel="stylesheet">
    <!-- Template Styles -->
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
    

    <style>



</style>


@endpush()


@section('content')
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Staff Details</div>
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
                     <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="card-head">
                                        <header>Basic Information</header>
                                        <a href="{{ route('role.index') }}" class="btn btn-danger">Back</a>
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
                                    <form method="post" action="@if(isset($role))
                                    {{ route('role.update',$role->id) }} @else {{ route('role.store') }} @endif">
                                        @csrf
                                        @if (isset($role))
                                            @method('PATCH')
                                        @endif
                                        
                                    <div class="card-body row">
                                        <div class="col-lg-12 p-t-20"> 
                                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                             <input name="name" class = "mdl-textfield__input" type = "text" id = "txtFirstName" value={{@$role->name}}>
                                             <label class = "mdl-textfield__label">Name</label>

                                             @error('name')
                                             <span class="text-danger">{{$message}}</span>
                                             @enderror()
                                          </div>
                                        </div>
                                        
                                        <div class="col-lg-12 p-t-10"> 
                                            <h3>Roles</h3>
                                            @error('permission')
                                             <span class="text-danger">{{$message}}</span>
                                             @enderror()

                                            <div class="row">
                                            {{-- {{dd(permission_name($permissions))}} --}}
                                                @if (isset($permissions) && count($permissions))
                                                    @foreach($permissions as $permission)

                                           <div class="col-md-2 col-sm-2 col-4">
                              

                                        <div>
                                          <label>
                                            <input type="checkbox" name="permission[{{$permission->name}}]" class="option-input checkbox" {{isset($role) && in_array($permission->name,permission_name($role->permissions)) ? 'checked' : ''}} />
                                            <h5>{{$permission->name}}</h5>
                                          </label>

                                        </div>
                                           </div> 

                                         
                                         @endforeach()
                                                @endif
                                   </div> 
                                         </div>
                                         <div class="col-lg-12 p-t-20 text-center"> 
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                                        </div>

                                    </form>
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
    $(document).ready(function(){
        $('.cbx').change(function(){

            if(this.checked)
            {
                $(this).attr('checked','checked');
            }
            else
            {
                $(this).attr('checked','');
            }
        });
});
    </script>
@endpush