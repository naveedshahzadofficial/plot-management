@extends('layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Details-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
									<!--end::Title-->
									<!--begin::Separator-->
									<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Search Form-->
									<div class="d-flex align-items-center" id="kt_subheader_search">
										<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Profile</span>
									</div>
									<!--end::Search Form-->
								</div>
								<!--end::Details-->
								
								<!--end::Toolbar-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Card-->
								<div class="card card-custom">
									<!--begin::Card header-->
									<div class="card-header card-header-tabs-line nav-tabs-line-3x">
										<!--begin::Toolbar-->
										<div class="card-toolbar">
											
												 <div class="card-title align-items-start flex-column">
                                                <h3 class="card-label font-weight-bolder text-dark">Update Profile</h3>
                                            </div>
											
										</div>
										<!--end::Toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body px-0">
									@if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

	
										<form class="form" id="profile_update_form" action="{{ route('profile.update') }}"  method="post" enctype="multipart/form-data"  >
											@csrf
												<!--begin::Tab-->
												<div class="tab-pane show px-7 active" id="kt_user_edit_tab_1" role="tabpanel">
													<!--begin::Row-->
													<div class="row">
														<div class="col-xl-2"></div>
														<div class="col-xl-7 my-2">
															<!--begin::Row-->
															<div class="row">
																<label class="col-3"></label>
																<div class="col-9">
																	<h6 class="text-dark font-weight-bold mb-10">User Info</h6>
																</div>
															</div>
															<!--end::Row-->
															<!--begin::Group-->
															<div class="form-group row">
																<label class="col-form-label col-3 text-lg-right text-left">Avatar</label>
																<div class="col-9">
																		@if($user->avatar)
																		
																	<div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url({{asset('storage/users/'.$user->avatar)}})">
																
																	@else
																	<div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(assets/media/users/blank.png)">
																
																	@endif
																	<div class="image-input-wrapper"></div>
																		<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
																			<i class="fa fa-pen icon-sm text-muted"></i>
																			<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
																			<input type="hidden" name="profile_avatar_remove">
																			<input type="hidden" name="old_profile_avatar" value="{{ $user->avatar }}">
																		</label>
																		<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
																		<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
																	</div>
																</div>
															</div>
															<!--end::Group-->
															<div class="form-group row">
																<label class="col-3 text-lg-right text-left">Role</label>
																<div class="col-9">
																	{{  $user->roles()->pluck('name')->implode('') }}
																</div>
															</div>
															<!--begin::Group-->
															<div class="form-group row">
																<label class="col-form-label col-3 text-lg-right text-left">Name</label>
																<div class="col-9">
																	<input class="form-control form-control-lg form-control-solid" name='name' type="text" value="{{  $user->name  }}">
																	@error('name')
																<div class="error">{{ $message }}</div>
															@enderror
																</div>
															</div>
															<!--end::Group-->
					
															<!--begin::Group-->
															<div class="form-group row">
																<label class="col-form-label col-3 text-lg-right text-left">Contact Phone</label>
																<div class="col-9">
																	<div class="input-group input-group-lg input-group-solid">
																		<div class="input-group-prepend">
																			<span class="input-group-text">
																				<i class="la la-phone"></i>
																			</span>
																		</div>
																		<input type="text" class="form-control form-control-lg form-control-solid" name='mobile_no'  value="{{  $user->mobile_no   }}" placeholder="Phone">
																		@error('mobile_no')
																<div class="error">{{ $message }}</div>
															@enderror
																	</div>
																	<span class="form-text text-muted">We'll never share your email with anyone else.</span>
																</div>
															</div>
															<!--end::Group-->
															<!--begin::Group-->
															<div class="form-group row">
																<label class="col-form-label col-3 text-lg-right text-left">Email Address</label>
																<div class="col-9">
																	<div class="input-group input-group-lg input-group-solid">
																		<div class="input-group-prepend">
																			<span class="input-group-text">
																				<i class="la la-at"></i>
																			</span>
																		</div>
																		<input type="text" class="form-control form-control-lg form-control-solid"  name='email' readonly  value="{{  $user->email   }}" placeholder="Email">
																		@error('email')
																<div class="error">{{ $message }}</div>
															@enderror
																	</div>
																</div>
															</div>
															<!--end::Group-->
															<!--begin::Group-->
															<div class="form-group row">
																<label class="col-form-label col-3 text-lg-right text-left">Cnic No.</label>
																<div class="col-9">
																	<div class="input-group input-group-lg input-group-solid">
																		<input type="text"  class="form-control form-control-lg form-control-solid" name="cnic_no" placeholder="cnic_no" value="{{  $user->cnic_no   }}">
																		@error('cnic_no')
																<div class="error">{{ $message }}</div>
															@enderror	
																	</div>
																</div>
															</div>

															<div class="card-toolbar" style="padding-left: 25.60%;">
																<button type="submit" class="btn btn-success mr-2">Save Changes</button>
																<a href="{{ route('home') }}" type="reset" class="btn btn-secondary">Cancel</a>
															</div>
															<!--end::Group-->
														</div>
													</div>
													<!--end::Row-->
												</div>
											
											
											
										</form>
									</div>
									<!--begin::Card body-->
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>

@endsection


@push('post-scripts')
<script>
    $(document).ready(function() {
        'use strict';
        // Basic Form
        $('#profile_update_form').validate({
            rules: {
                name: "required",
                cnic_no: "required",
				
                mobile_no: {
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11
					}
            },
            messages: {
                name: {
                    required: "Name is required."
                },
                cnic_no: {
                    required: "Cnic No is required."
                },
                mobile_no: {
                    required: "Mobile No is required."
                }

            },
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-danger');
            },
            errorPlacement: function(error, element) {
                if (element.attr("type") == "radio") {
                    error.insertAfter(element.parent().siblings(":last"));
                } else if (element.has('option').length) {
                    error.insertAfter(element.next());
                } else {
                    error.insertAfter(element);
                }
            }
        });


    });
</script>

@endpush

