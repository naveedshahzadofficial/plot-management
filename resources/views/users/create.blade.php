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
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"  />
                                    @error('name')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"  />
                                    @error('email')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                            </div>


                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Cnic No.</label>
                                    <input type="text" name="cnic_no" class="form-control" placeholder="Cnic No"  />
                                    @error('cnic_no')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile_no" class="form-control" placeholder="Mobile Number"  />
                                    @error('mobile_no')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                            </div>


                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Password:</label>
                                    <input type="text" id="password" name="password" class="form-control" placeholder="Password"  />
                                    @error('password')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Confirm Password:</label>
                                    <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm Password"  />
                                    @error('password_confirmation')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                            </div>


                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label>Role</label>
                                    <div class="col-form-label">
                                        <select class="custom-select custom-select-lg mb-3" name="roles" id="roles" required>
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

                                <div class="col-lg-6">
                                    <label>Status</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="user_status" value="Active">
                                                <span></span>Active</label>


                                            <label class="radio radio-primary">
                                                <input type="radio" name="user_status" value="Inactive">
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
            rules: {
                name: "required",
                email: "required",
                cnic_no: "required",

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
                roles: "required",
                user_status: "required"
            },
            messages: {
                name: {
                    required: "Name is required."
                },
                email: {
                    required: "Email is required."
                },
                cnic_no: {
                    required: "Cnic No is required."
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
                roles: {
                    required: "Role is required."
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


    });
</script>
@endpush
