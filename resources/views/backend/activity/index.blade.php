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
	

@endpush()


@section('content')

<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">All Staffs</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Staffs</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">All Staffs</li>
                            </ol>
                        </div>
                    </div>
					<ul class="nav nav-pills nav-pills-rose">
						<li class="nav-item tab-all"><a class="nav-link active show"
							href="#tab1" data-toggle="tab">List View</a></li>
						<li class="nav-item tab-all"><a class="nav-link" href="#tab2"
							data-toggle="tab">Grid View</a></li>
					</ul>
					<div class="tab-content tab-space">
	                   <div class="tab-pane active show" id="tab1">
						 <div class="row">
		                    <div class="col-md-12">
	                            <div class="card-box">
	                                <div class="card-head">
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
	                                <div class="card-body ">
	                                  <div class="table-scrollable">
	                                    <table class="table table-hover table-checkable order-column full-width" id="example4">
	                                        <thead>
	                                            <tr>
	                                                <th class="center"> Causer </th>
	                                                <th class="center">Description</th>
	                                               
	                                                <th class="center">Which</th>
	                                                <th class="center">When</th>
	                                                @can('delete-activity', User::class)
	                                                    
	                                                <th class="center"> Action </th>
	                                            
	                                                @endcan
	                                            	</tr>
	                                        </thead>
	                                        <tbody>

	                                        	@if ( isset($activities) && count($activities) )
	                                        		@foreach($activities as $activity)

												<tr class="odd gradeX">
													
													<td class="center">{{$activity->causer->name}}</td>

													<td class="center">{{$activity->description}}</td>
													<td class="text-center">{{$activity->subject->name}}</td>
													<td class="center">{{$activity->created_at->diffForHumans()}}</td>
													@can('delete-activity', User::class)
													    
													<td class="center">
														
														<form style="display: inline;" id="form-{{$activity->id}}" action="{{ route('activity.destroy',$activity->id) }}" method="post">
															@method('DELETE')
															@csrf
														<a onclick="document.getElementById('form-{{$activity->id}}').submit()" class="btn btn-tbl-delete btn-xs">
															<i class="fa fa-trash-o "></i>
														</a>
														</form>
													</td>
													@endcan()	
												</tr>
												
												@endforeach()
	                                        	@endif

											</tbody>
	                                    </table>
	                                  </div>
	                                </div>
	                            </div>
		                      </div>
		                  </div>
	                    </div>
					
					</div>
                </div>
            </div>
            <!-- end page content -->

@endsection()


@push('scripts')
	
	   <!-- start js include path -->
    <script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}" ></script>
    <script src="{{asset('backend/assets/plugins/popper/popper.min.js')}}" ></script>
    <script src="{{asset('backend/assets/plugins/jquery-blockui/jquery.blockui.min.js')}}" ></script>
	<script src="{{asset('backend/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
    <!-- Common js-->
	<script src="{{asset('backend/assets/js/app.js')}}" ></script>
    <script src="{{asset('backend/assets/js/layout.js')}}" ></script>
	<script src="{{asset('backend/assets/js/theme-color.js')}}" ></script>
	<!-- data tables -->
    <script src="{{asset('backend/assets/plugins/datatables/jquery.dataTables.min.js')}}" ></script>
 	<script src="{{asset('backend/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}" ></script>
 	<script src="{{asset('backend/assets/js/pages/table/table_data.js')}}" ></script>
	<!-- Material -->
	<script src="{{asset('backend/assets/plugins/material/material.min.js')}}"></script>
	<!-- animation -->
	<script src="{{asset('backend/assets/js/pages/ui/animations.js')}}" ></script>
    <!-- end js include path -->
@endpush()

