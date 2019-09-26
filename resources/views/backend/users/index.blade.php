@extends('backend.layout.app')
@section('title')
	<title>Users</title>
@endsection

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
	                                            	
	                                                <th class="center"> Name </th>
	                                                <th class="center">Email</th>
	                                               
	                                                <th class="center">Created Date</th>
	                                                <th class="center"> Action </th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>

	                                        	@if ( isset($users) && count($users) )
	                                        		@foreach($users as $user)

												<tr class="odd gradeX">
													
													<td class="center">{{$user->name}}</td>
													<td class="center">{{$user->email}}</td>
													
													<td class="center">{{$user->created_at->diffForHumans()}}</td>
													<td class="center">
														<a href="{{ route('user.edit',$user->id) }}" class="btn btn-tbl-edit btn-xs">
															<i class="fa fa-pencil"></i>
														</a>
														<form style="padding:0px;margin:0px;display:inline;" id="form-{{$user->id}}" action="{{ route('user.destroy',$user->id) }}" method="POST">
															@csrf
															@method('DELETE')
														<a onclick="document.getElementById('form-{{$user->id}}').submit()" class="btn btn-tbl-delete btn-xs">
															<i class="fa fa-trash-o "></i>
														</a>
														</form>
													</td>
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
						<div class="tab-pane" id="tab2">
							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-purple">
													<div class="user-name">Pooja Patel</div>
													<div class="name-center">General Manager</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													A-103, shyam gokul flats, Mahatma Road <br />Mumbai
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header cyan-bgcolor">
													<div class="user-name">Smita Patil</div>
													<div class="name-center">Housekeeper</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													45, Krishna Tower, Near Bus Stop, Satellite,  <br />Ahmedabad
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header light-dark-bgcolor">
													<div class="user-name">John Smith</div>
													<div class="name-center">Cook</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													456, Estern evenue, Courtage area,  <br />New York
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-orange">
													<div class="user-name">Pooja Patel</div>
													<div class="name-center">General Manager</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													A-103, shyam gokul flats, Mahatma Road <br />Mumbai
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-green">
													<div class="user-name">Smita Patil</div>
													<div class="name-center">Housekeeper</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													45, Krishna Tower, Near Bus Stop, Satellite,  <br />Ahmedabad
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-danger">
													<div class="user-name">John Smith</div>
													<div class="name-center">Cook</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													456, Estern evenue, Courtage area,  <br />New York
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-black">
													<div class="user-name">Pooja Patel</div>
													<div class="name-center">General Manager</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													A-103, shyam gokul flats, Mahatma Road <br />Mumbai
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-yellow">
													<div class="user-name">Smita Patil</div>
													<div class="name-center">Housekeeper</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													45, Krishna Tower, Near Bus Stop, Satellite,  <br />Ahmedabad
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-pink">
													<div class="user-name">John Smith</div>
													<div class="name-center">Cook</div>
												</div>
												<img src="{{asset('backend/assets/img/user/usrbig3.jpg')}}" class="user-img"
													alt="">
												<p>
													456, Estern evenue, Courtage area,  <br />New York
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
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

