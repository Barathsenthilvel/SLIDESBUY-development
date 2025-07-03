@extends('layout.admin') 

@section('content')  
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                    <!--begin::Page Title-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Actions-->
                                    <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1 d-none">Today</a>
                                    <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1 d-none">Month</a>
                                    <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1 d-none">Year</a>
                                    <!--end::Actions-->
                                    <!--begin::Daterange-->
                                    <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
                                        <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
                                        <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                                    </a>
                                    <!--end::Daterange-->
                                    <!--begin::Dropdowns-->
                                    <div class="dropdown dropdown-inline d-none" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                        <a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="svg-icon svg-icon-success svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover py-5">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-drop"></i>
                                                        </span>
                                                        <span class="navi-text">New Group</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-list-3"></i>
                                                        </span>
                                                        <span class="navi-text">Contacts</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-rocket-1"></i>
                                                        </span>
                                                        <span class="navi-text">Groups</span>
                                                        <span class="navi-link-badge">
                                                            <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-bell-2"></i>
                                                        </span>
                                                        <span class="navi-text">Calls</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-gear"></i>
                                                        </span>
                                                        <span class="navi-text">Settings</span>
                                                    </a>
                                                </li>
                                                <li class="navi-separator my-3"></li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-magnifier-tool"></i>
                                                        </span>
                                                        <span class="navi-text">Help</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-bell-2"></i>
                                                        </span>
                                                        <span class="navi-text">Privacy</span>
                                                        <span class="navi-link-badge">
                                                            <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                    <!--end::Dropdowns-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <!--begin::Dashboard-->
                                <!--begin::Row-->
                                <div class="row">
                                    @if(!Auth::user()->is_vendor)
									<div class="col-xl-3">
										<!--begin::Stats Widget 29-->
										<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
											<!--begin::Body-->
											<div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-info">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$dashboad['User']}}</span>
												<span class="font-weight-bold text-muted font-size-sm"><a style="color: #3F4254 !important;" href="{{route('admin-customergroup')}}">Customers</a></span>

											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 29-->
									</div>
									
									<div class="col-xl-3">
										<!--begin::Stats Widget 30-->
										<div class="card card-custom bg-info card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$dashboad['Vendor']}}</span>
												<span class="font-weight-bold text-white font-size-sm"><a style="color: #ffffff !important;" href="{{route('admin-vendor')}}">Vendor</a></span>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 30-->
									</div>
									@endif
									<div class="col-xl-3">
										<!--begin::Stats Widget 31-->
										<div class="card card-custom bg-danger card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body" style="display: flex;flex-direction: row;flex-wrap: nowrap;justify-content: space-between;align-items: center;">
											    <div>
											      <span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
															<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
															<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
															<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
														</g>
													</svg>
													<!--end::Svg Icon-->
													
												</span>
												<span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$dashboad['Product']}}</span>
												<span class="font-weight-bold text-white font-size-sm"><a style="color: #ffffff !important;" href="{{route('admin-product')}}">Product</a></span>
											    </div>
											    <div>
											        @if(Auth::user()->is_vendor == null)
											        <span class="font-weight-bold text-white font-size-sm"><a style="color: #ffffff !important;" href="{{route('admin-product-group')}}">Add Product</a></span>
											        @else
											        <span class="font-weight-bold text-white font-size-sm"><a style="color: #ffffff !important;" href="{{route('admin-productv-group')}}">Add Product</a></span>
											        @endif
											        
											    </div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 31-->
									</div>
									<div class="col-xl-3">
										<!--begin::Stats Widget 32-->
										<div class="card card-custom bg-dark card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-white">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
															<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 text-hover-primary d-block">{{(Auth::user()->is_vendor)?count($dashboad['VendorNewOrder']):$dashboad['Order']}}</span>
												<span class="font-weight-bold text-white font-size-sm"><a style="color: #ffffff !important;" href="{{route('admin-order')}}">Order</a></span>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 32-->
									</div>
								</div>
                                <!--begin::Row-->
								<div class="row">
									<div class="col-lg-6">
										<!--begin::Card-->
										<div class="card card-custom gutter-b">
											<div class="card-header">
												<div class="card-title">
													<h3 class="card-label">Sales</h3>
												</div>
												<div class="card-toolbar">
													<select class="custom-select form-control" name="Year" id="Year">
														@foreach ($dashboad['Years'] as $year)
															<option value="{{$year}}">{{$year}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="card-body">
												<!--begin::Chart-->
												<div id="chart"></div>
												<!--end::Chart-->
											</div>
										</div>
										<!--end::Card-->
									</div>
									<div class="col-lg-6">
										<!--begin::Card-->
										<div class="card card-custom gutter-b">
											<div class="card-header">
												<div class="card-title">
													<h3 class="card-label">Order</h3>
												</div>
											</div>
											<div class="card-body">
												<!--begin::Chart-->
												<div id="chart3"></div>
												<!--end::Chart-->
											</div>
										</div>
										<!--end::Card-->
									</div>
                                    <div class="col-xl-6">
										<!--begin::Base Table Widget 3-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">New Products</span>
												</h3>
												<div class="card-toolbar">
													<a href="#" class="btn btn-light-primary btn-md py-2 font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
													<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
														<!--begin::Navigation-->
														<ul class="navi navi-hover">
                                                            @if(Auth::user()->is_vendor != null)
															<li class="navi-item">
																<a href="{{route('admin-productv2')}}" class="navi-link">
																	<span class="navi-icon">
																		<i class="flaticon2-shopping-cart-1"></i>
																	</span>
																	<span class="navi-text">View Vendor Product </span>
																</a>
															</li>
                                                            @else
                                                            <li class="navi-item">
																<a href="{{route('admin-product')}}" class="navi-link">
																	<span class="navi-icon">
																		<i class="flaticon2-shopping-cart-1"></i>
																	</span>
																	<span class="navi-text">View Admin Product</span>
																</a>
															</li>
                                                            <li class="navi-item">
																<a href="{{route('admin-productv2')}}" class="navi-link">
																	<span class="navi-icon">
																		<i class="flaticon2-shopping-cart-1"></i>
																	</span>
																	<span class="navi-text">View Vendor Product</span>
																</a>
															</li>
                                                            @endif
															<li class="navi-item">
															     @php
                                             if(Auth::user()->is_vendor != null || Auth::user()->is_vendor != ""){
            $link=route('admin-productv-group');
        }else{
            $link=route('admin-product-group');
        }
                                            @endphp
																<a href="{{$link}}" class="navi-link">
																	<span class="navi-icon">
																		<i class="flaticon2-shopping-cart-1"></i>
																	</span>
																	<span class="navi-text">Create Product</span>
																</a>
															</li>
														</ul>
														<!--end::Navigation-->
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2 pb-0">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-borderless table-vertical-center">
														<thead>
															<tr>
																<th class="p-0" style="width: 50px"></th>
																<th class="text-center" style="min-width: 150px">Prduct Name</th>
																<th class=" text-center" style="min-width: 140px">Base Price</th>
																<th class=" text-center" style="min-width: 100px">SKU</th>
															</tr>
														</thead>
														<tbody>
                                                            @foreach ($dashboad['NewProduct'] as $NewProduct)
															<tr>
																<td class="pl-0 py-5">
																	<div class="symbol symbol-45 symbol-light-success mr-2">
																		<span class="symbol-label">
																			<span class="svg-icon svg-icon-2x svg-icon-success">
																				<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																						<rect x="0" y="0" width="24" height="24"></rect>
																						<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																						<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
																					</g>
																				</svg>
																				<!--end::Svg Icon-->
																			</span>
																		</span>
																	</div>
																</td>
																<td class="text-center">
																	<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $NewProduct->product_title}}</a>
																</td>
																<td class="text-center">
																	<span class="text-muted font-weight-bold">{{ $NewProduct->product_base_price}}</span>
																</td>
																<td class="text-center">
																	<span class="text-muted font-weight-bold">{{$StoreConfig->productIdprefix}}{{ $NewProduct->product_sku}}</span>
																</td>
                                                            </tr>
                                                            @endforeach 
														</tbody>
													</table>
												</div>
												<!--end::table-->
											</div>
											<!--begin::Body-->
										</div>
										<!--end::Base Table Widget 3-->
									</div>
                                    @if(!Auth::user()->is_vendor)
                                    <div class="col-xl-6">
										<!--begin::Base Table Widget 3-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">New User</span>
												</h3>
												<div class="card-toolbar">
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2 pb-0">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-borderless table-vertical-center">
														<thead>
															<tr>
																<th class="p-0" style="width: 50px">Name</th>
																<th class="text-center" style="min-width: 150px">Email</th>
																<th class="text-center" style="min-width: 140px">Mobile No</th>
																<th class="text-center" style="min-width: 100px">Status</th>
															</tr>
														</thead>
														<tbody>
                                                            @foreach ($dashboad['NewCustomer'] as $NewCustomer)
															<tr>
																<td class="pl-0">
																	<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $NewCustomer->name}}</a>
																</td>
																<td class="text-center">
																	<span class="text-muted font-weight-bold">{{ $NewCustomer->email }}</span>
																</td>
																<td class="text-center">
																	<span class="text-muted font-weight-bold">{{ $NewCustomer->Phone }}</span>
																</td>
                                                                <td class="text-center">
																	<span class="text-muted font-weight-bold">{{ ($NewCustomer->status == '1')?'Active':'Deactive' }}</span>
																</td>
                                                            </tr>
                                                            @endforeach 
														</tbody>
													</table>
												</div>
												<!--end::table-->
											</div>
											<!--begin::Body-->
										</div>
										<!--end::Base Table Widget 3-->
									</div>
									@endif
									@if(!Auth::user()->is_vendor)
                                    <div class="col-xl-6">
										<!--begin::Base Table Widget 3-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">New Orders</span>
												</h3>
												<!--<div class="card-toolbar" style="width: 275px">-->
            <!--                                        <input class="form-control" type="text" value="" id="Search_order" placeholder="Order id"/>-->
            <!--                                        <div class="searchResult">-->
            <!--                                        </div>-->
												<!--</div>-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2 pb-0">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-borderless table-vertical-center">
														<thead>
															<tr>
																<th class="p-0" style="width: 50px">Details</th>
																<th class="text-center" style="min-width: 60px">Order ID</th>
																<th class="text-center" style="min-width: 140px">Order Status</th>
																<th class="text-center" style="min-width: 100px">pay Status</th>
															</tr>
														</thead>
														<tbody>
                                                            @foreach ($dashboad['NewOrder'] as $NewOrder)
															<tr>
																<td class="pl-0 py-5">
																	<span class="text-muted font-weight-bold">{{ $NewOrder->first_name.' '.$NewOrder->last_name}}</span><br>
                                                                    <span class="text-muted font-weight-bold">{{ $NewOrder->phone}}</span><br>
                                                                    <span class="text-muted font-weight-bold">{{ $NewOrder->email}}</span>
																</td>
																<td class="text-center">
																	<a href="{{route('admin-order-view',[$NewOrder->id])}}" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$StoreConfig->OrderIDPrefix}}{{ $NewOrder->id }}</a>
																</td>
																<td class="text-center">
																	<span class="text-muted font-weight-bold">{{ $NewOrder->delivery_status}}</span>
																</td>
																<td class="text-center">
																	<span class="text-muted font-weight-bold">{{ $NewOrder->payment_status}}</span>
																</td>
                                                            </tr>
                                                            @endforeach 
														</tbody>
													</table>
												</div>
												<!--end::table-->
											</div>
											<!--begin::Body-->
										</div>
										<!--end::Base Table Widget 3-->
									</div>
									@else
									<div class="col-xl-6">
										<!--begin::Base Table Widget 3-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">New Orders</span>
												</h3>
												<!--<div class="card-toolbar" style="width: 275px">-->
            <!--                                        <input class="form-control" type="text" value="" id="Search_order" placeholder="Order id"/>-->
            <!--                                        <div class="searchResult">-->
            <!--                                        </div>-->
												<!--</div>-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2 pb-0">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-borderless table-vertical-center">
														<thead>
															<tr>
																<th class="p-0" style="width: 50px"></th>
																<th class="text-center" style="min-width: 140px"></th>
																<th class="text-center" style="min-width: 100px"></th>
															</tr>
														</thead>
														<tbody>
                                                            @foreach ($dashboad['VendorNewOrder']->take(5) as $NewOrder)
															<tr>
																<td class="pl-0 ">
																	<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$StoreConfig->OrderIDPrefix}}{{ $NewOrder->id }}</a>
																</td>
																<td class="text-center">
																    @foreach($NewOrder['vendorItems'] as $item)
																	<span class="text-muted font-weight-bold">{{ $item->product_title }}</span><br>
																	@endforeach
																</td>
																<td class="text-center">
																	@foreach($NewOrder['vendorItems'] as $item)
																	<span class="text-muted font-weight-bold">{{ $item->manufacturerPrice }}</span><br>
																	@endforeach
																</td>
                                                            </tr>
                                                            @endforeach 
														</tbody>
													</table>
												</div>
												<!--end::table-->
											</div>
											<!--begin::Body-->
										</div>
										<!--end::Base Table Widget 3-->
									</div>
									@endif
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
 @endsection
 @push('script')
 <script>   
    // Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';
var chart;
var ChartData = JSON.parse(JSON.stringify(@php echo $dashboad['sales'] @endphp));
var Mounth = new Array();
var NetSales = new Array();
var NumberOrders = new Array();
var total = new Array();
for(var TempKey in ChartData){
    Mounth.push(TempKey);
    NetSales.push(ChartData[TempKey]['grandTotal']);
	total.push(ChartData[TempKey]['total'])
	NumberOrders.push(ChartData[TempKey]['ordercount']);
}

// Class definition
function generateBubbleData(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
      var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;
  
      series.push([x, y, z]);
      baseval += 86400000;
      i++;
    }
    return series;
  }

function generateData(count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = 'w' + (i + 1).toString();
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        series.push({
            x: x,
            y: y
        });
        i++;
    }
    return series;
}

var CustomKTWidgets = function () {

    var Custom_demo3 = function () {
		const apexChart = "#chart";
		var options = {
			series: [{
				name: 'Net Sales',
				data: NetSales
			},
			{
				name: 'Total',
				data: total
			}],
			chart: {
				type: 'bar',
				height: 350
			},
			plotOptions: {
				bar: {
					horizontal: false,
					columnWidth: '55%',
					endingShape: 'rounded'
				},
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				show: true,
				width: 2,
				colors: ['transparent']
			},
			xaxis: {
				categories: Mounth,
			},
			yaxis: {
				title: {
					text: '₹ (thousands)'
				}
			},
			fill: {
				opacity: 1
			},
			tooltip: {
				y: {
					formatter: function (val) {
						return val ;
					}
				}
			},
			colors: [primary,success]
		};

		chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
	}

	var Custom_demo33 = function () {
		const apexChart = "#chart3";
		var options = {
			series: [{
				name: 'Order Count',
				data: NumberOrders
			}],
			chart: {
				type: 'bar',
				height: 350
			},
			plotOptions: {
				bar: {
					horizontal: false,
					columnWidth: '55%',
					endingShape: 'rounded'
				},
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				show: true,
				width: 2,
				colors: ['transparent']
			},
			xaxis: {
				categories: Mounth,
			},
			yaxis: {
				title: {
					text: 'Order Count'
				}
			},
			fill: {
				opacity: 1
			},
			tooltip: {
				y: {
					formatter: function (val) {
						return val ;
					}
				}
			},
			colors: [primary,success]
		};

		chart3 = new ApexCharts(document.querySelector(apexChart), options);
		chart3.render();
	}
    return {
        init: function () {
            Custom_demo3();
			Custom_demo33();
        }
    }
}();

jQuery(document).ready(function () {
    CustomKTWidgets.init();
});
$("#Search_order").keyup(function(){
    var list = "";
    $.post( '{{route('get-order')}}',{ "_token": "{{ csrf_token() }}",search:$(this).val() }, function( data ) {
        data.forEach(e =>{
            list +='<p data-id='+e.id+' class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">'+e.order_id+'</p>'
        });
        $(".searchResult").html(list).show();
    });
});
$("#Year").change(function(){
    $.post( '{{route('get-chart')}}',{ "_token": "{{ csrf_token() }}",Year:$(this).val() }, function( data ) {
		Mounth = [];
		NetSales = [];
		NumberOrders = [];
		total = [];
		for(var key in data){ 
			Mounth.push(TempKey);
			NetSales.push(ChartData[TempKey]['grandTotal']);
			total.push(ChartData[TempKey]['total'])
			NumberOrders.push(ChartData[TempKey]['ordercount']);
		}
		chart3.updateOptions({
			series: [{
				name: 'Order Count',
				data: NumberOrders
			}],
			xaxis: {
				categories: Mounth,
			},
		})
		chart.updateOptions({
			series: [{
				name: 'Net Sales',
				data: NetSales
			},
			{
				name: 'Orders',
				data: total
			}],
			xaxis: {
				categories: Mounth,
			},
		})
    });
});
$(document).mouseup(function (e) {
    if ($(e.target).closest(".searchResult").length === 0) {
        $(".searchResult").hide();
    }
});
$('body').on('click','.searchResult p',function(){ var url = '{{route('admin-order-view1')}}/'+$(this).data('id'); window.location = url;});
</script>
@endpush