@extends('layouts.main')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<!--begin::Page Title-->
										<h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
										<!--end::Page Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
											<li class="breadcrumb-item">
												<a href="{{ route('users.index') }}" class="text-muted">Users</a>
											</li>
											<li class="breadcrumb-item">
												<a class="text-muted">Add</a>
											</li>

										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page Heading-->
								</div>

							</div>
						</div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="">
                <div class="">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <h3 class="card-title">User Add</h3>

                        </div>

                        <!--begin::Form-->
                        {!! Form::open(array('id'=>'user_add','route' => 'users.store','method'=>'POST')) !!}
                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Name<span class="color-red-700">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"  />
                                    @error('name')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>


                                <div class="col-lg-6">
                                    <label>Username<span class="color-red-700">*</span></label>
                                    <input type="text" name="username" class="form-control" placeholder="Username"  />
                                    @error('username')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>


                            <div class="form-group row">

                                <div class="col-lg-6">
                                    <label>Email<span class="color-red-700">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"  />
                                    @error('email')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-lg-6">
                                    <label>Mobile Number<span class="color-red-700">*</span></label>
                                    <input type="text" name="mobile_no" class="form-control" placeholder="Mobile Number"  />
                                    @error('mobile_no')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                            </div>


                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Password<span class="color-red-700">*</span></label>
                                    <input type="text" id="password" name="password" class="form-control" placeholder="Password"  />
                                    @error('password')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Confirm Password<span class="color-red-700">*</span></label>
                                    <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm Password"  />
                                    @error('password_confirmation')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                            </div>


                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label>Role<span class="color-red-700">*</span></label>
                                    <div class="col-form-label">
                                        <select class="custom-select custom-select-lg mb-3 select2" name="role_id" id="role_id" required>
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                    </div>

                                </div>

                                <div class="col-lg-6" id="sez_div">
                                    <label>Special Economic Zone<span class="color-red-700">*</span></label>
                                    <div class="col-form-label">
                                        <select class="custom-select custom-select-lg mb-3 select2" name="special_economic_zone_id" id="special_economic_zone_id" required>
                                            <option value="">Select Zone</option>
                                            @foreach($specialEconomicZones as $specialEconomicZone)
                                                <option value="{{ $specialEconomicZone->id }}"> {{ $specialEconomicZone->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('special_economic_zone_id')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>



                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Status<span class="color-red-700">*</span></label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="user_status" value="1">
                                                <span></span>Active</label>


                                            <label class="radio radio-primary">
                                                <input type="radio" name="user_status" value="0">
                                                <span></span>Inactive</label>

                                        </div>
                                        @error('user_status')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('users.index') }}"  class="btn btn-secondary">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                        <!--end::Form-->
                    </div>

                </div>

            </div>
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
        $('#user_add').validate({
            ignore: ":hidden",
            rules: {
                name: "required",
                email: "required",
                username: "required",

                mobile_no: {
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11

					},
                    password: "required",
                password_confirmation : {
                    equalTo : '[name="password"]'
                },
                role_id: "required",
                special_economic_zone_id: "required",
                user_status: "required"
            },
            messages: {
                name: {
                    required: "Name is required."
                },
                email: {
                    required: "Email is required."
                },
                username: {
                    required: "Username is required."
                },
                mobile_no: {
                    required: "Mobile No is required."
                },
                password: {
                    required: "Password is required."
                },
                password_confirmation: {
                    required: "Confirm Password is required."
                },
                role_id: {
                    required: "Role is required."
                },
                special_economic_zone_id: {
                    required: "Special Economic Zone is required."
                },
                user_status: {
                    required: "Status is required."
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

        $('#role_id').change(function (){
            let role_id = $(this).val();
            if(role_id === '1' || role_id=== '2') {
                $('#special_economic_zone_id').val('');
                $('#special_economic_zone_id').trigger('change.select2');
                $('#sez_div').hide();
            }else {
                $('#sez_div').show();
            }
        });

    });
</script>
@endpush
