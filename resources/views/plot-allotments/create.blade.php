@extends('layouts.main')
@push('title', 'Add Plot Allotment')
@push('breadcrumb-items')
    <li class="breadcrumb-item">
        <a  class="text-muted">System Definitions</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('plot-allotments.index') }}" class="text-muted">Plot Allotment</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Add</a>
    </li>
@endpush
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="">
                <div class="">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <h3 class="card-title">Add Plot Allotment</h3>

                        </div>

                        <!--begin::Form-->
                        {!! Form::open(array('id'=>'form_add_edit','route' => 'plot-allotments.store','method'=>'POST')) !!}
                        <div class="card-body">

                            <div class="section_box mb-10">
                            <div class="row form-group">
                                @hasanyrole('Super Admin|Admin')
                                <div class="col-lg-6">
                                    <label>Special Economic Zone <span class="color-red-700">*</span></label>
                                        <select class="form-control select2" name="special_economic_zone_id">
                                            <option value="">Select Economic Zone</option>
                                            @foreach($specialEconomicZones as $specialEconomicZone)
                                                <option {{ old('special_economic_zone_id')== $specialEconomicZone->id ? 'selected': '' }} value="{{ $specialEconomicZone->id }}"> {{ $specialEconomicZone->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('special_economic_zone_id')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                </div>
                                @else
                                    <input type="hidden" name="special_economic_zone_id" value="{{ auth()->user()->special_economic_zone_id }}">
                                @endhasanyrole

                                <div class="col-lg-6">
                                        <label>Is the owner a Business? <span class="color-red-700">*</span></label>
                                        <div class="col-form-label">
                                            <div class="radio-inline">
                                                @isset($questions)
                                                    @foreach($questions as $question)
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="owner_question_id" value="{{ $question->id }}" {{ old('owner_question_id')==$question->id?'checked':'' }}>
                                                    <span></span>{{ $question->name }}</label>
                                                    @endforeach
                                                @endisset
                                            </div>
                                            @error('owner_question_id')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                            </div>
                            </div>

                            <h4 class="font-weight-bold section_heading text-white">
                                <span>Business Profile </span>
                            </h4>

                            <div class="section_box">

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Company/ Business Name <span class="color-red-700">*</span></label>
                                    <input maxlength="50" type="text" name="business_name" class="form-control" placeholder="Business Name" value="{{ old('business_name') }}" />
                                    @error('business_name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Business Structure <span class="color-red-700">*</span></label>
                                    <select class="form-control select2" name="business_structure_id">
                                        <option value="">Select Business Structure</option>
                                        @foreach($businessStructures as $businessStructure)
                                            <option {{ old('business_structure_id')== $businessStructure->id ? 'selected': '' }} value="{{ $businessStructure->id }}"> {{ $businessStructure->structure_name }} </option>
                                        @endforeach
                                    </select>
                                    @error('business_structure_id')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>SECP Company Incorporation No. (CUIN) <span class="color-red-700">*</span></label>
                                    <input maxlength="20" type="text" name="secp_company_incorporation_no" class="form-control" placeholder="SECP Company Incorporation No" value="{{ old('secp_company_incorporation_no') }}" />
                                    @error('secp_company_incorporation_no')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Company Incorporation Date <span class="color-red-700">*</span></label>
                                    <input maxlength="20" type="text" name="company_incorporation_date" class="form-control datepicker w-100" readonly placeholder="Company Incorporation Date" value="{{ old('company_incorporation_date') }}" />
                                    @error('company_incorporation_date')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row form-group">

                                <div class="col-lg-6">
                                    <label>Business Registration No. <span class="color-red-700">*</span></label>
                                    <input maxlength="20" type="text" name="business_registration_no" class="form-control" placeholder="Business NTN" value="{{ old('business_registration_no') }}" />
                                    @error('business_registration_no')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>National Tax Number (Business) <span class="color-red-700">*</span></label>
                                    <input maxlength="20" type="text" name="business_ntn" class="form-control" placeholder="Business NTN" value="{{ old('business_ntn') }}" />
                                    @error('business_ntn')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Company Structure <span class="color-red-700"></span></label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="company_structure" value="Joint Venture with Foreign Company" {{ old('company_structure')=='Joint Venture with Foreign Company'?'checked':'' }}>
                                                <span></span>Joint Venture with Foreign Company</label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="company_structure" value="Foreign Company" {{ old('company_structure')=='Foreign Company'?'checked':'' }}>
                                                <span></span>Foreign Company</label>
                                            <label class="radio radio-primary">
                                                <input type="radio" name="company_structure" value="Local Company" {{ old('company_structure')=='Local Company'?'checked':'' }}>
                                                <span></span>Local Company</label>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                            <!-- Section Basic Business Profile -->

                            <h4 class="mt-10 font-weight-bold section_heading text-white">
                                <span>Business Address</span>
                            </h4>

                            <div class="section_box">

                                <div class="row form-group">
                                    <div class="col-lg-6">
                                    <label>Address <span class="color-red-700">*</span></label>
                                    <input maxlength="254" type="text" name="business_address" class="form-control" placeholder="Address" value="{{ old('business_address') }}" />
                                    @error('business_address')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Province <span class="color-red-700">*</span></label>
                                        <select class="form-control select2" name="province_id" onchange="getProvinceDistricts(this)">
                                            <option value="">Select Province</option>
                                            @foreach($provinces as $province)
                                                <option {{ old('province_id')== $province->id ? 'selected': '' }} value="{{ $province->id }}"> {{ $province->province_name }} </option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label>District <span class="color-red-700">*</span></label>
                                        <select class="form-control select2 district_ids" name="district_id" onchange="getDistrictTehsils(this)" id="district_id">
                                            <option value="">Select District</option>
                                        </select>
                                        @error('district_id')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>City/ Tehsil <span class="color-red-700">*</span></label>
                                        <select class="form-control select2 tehsile_ids" name="tehsil_id" id="tehsil_id">
                                            <option value="">Select City</option>
                                        </select>
                                        @error('tehsil_id')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <h4 class="mt-10 font-weight-bold section_heading text-white">
                                <span>Business Contact Info</span>
                            </h4>

                            <div class="section_box">
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label>Landline Phone No. <span class="color-red-700">*</span></label>
                                        <input maxlength="20" type="text" name="business_phone_no" class="form-control" placeholder="Phone No." value="{{ old('business_phone_no') }}" />
                                        @error('business_phone_no')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Fax No. <span class="color-red-700"></span></label>
                                        <input maxlength="20" type="text" name="business_fax_no" class="form-control" placeholder="Fax No." value="{{ old('business_fax_no') }}" />
                                        @error('business_fax_no')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label>Website URL <span class="color-red-700"></span></label>
                                        <input maxlength="254" type="text" name="website_url" class="form-control" placeholder="Website URL" value="{{ old('website_url') }}" />
                                        @error('website_url')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email Address <span class="color-red-700"></span></label>
                                        <input maxlength="100" type="email" name="business_email_address" class="form-control" placeholder="Email Address" value="{{ old('business_email_address') }}" />
                                        @error('business_email_address')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h4 class="mt-10 font-weight-bold section_heading text-white">
                                <span>Principal Officer/ Focal Person</span>
                            </h4>

                            <div class="section_box">
                                <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Full Name <span class="color-red-700">*</span></label>
                                    <input maxlength="50" type="text" name="full_name" class="form-control" placeholder="Full Name" value="{{ old('full_name') }}" />
                                    @error('full_name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>CNIC No. <span class="color-red-700">*</span></label>
                                    <input maxlength="20" type="text" name="cnic_no" class="form-control cnic-no" placeholder="CNIC No." value="{{ old('cnic_no') }}" />
                                    @error('cnic_no')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                                <div class="row form-group">

                                    <div class="col-lg-6">
                                        <label>Mobile No. <span class="color-red-700">*</span></label>
                                        <input maxlength="50" type="text" name="mobile_no" class="form-control mobile-no" placeholder="Mobile No." value="{{ old('mobile_no') }}" />
                                        @error('mobile_no')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Email Address <span class="color-red-700"></span></label>
                                        <input maxlength="100" type="email" name="email_address" class="form-control" placeholder="Email Address" value="{{ old('email_address') }}" />
                                        @error('email_address')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label>Landline Phone No. <span class="color-red-700"></span></label>
                                        <input maxlength="20" type="text" name="phone_no" class="form-control" placeholder="Phone No." value="{{ old('phone_no') }}" />
                                        @error('phone_no')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Fax No. <span class="color-red-700"></span></label>
                                        <input maxlength="20" type="text" name="fax_no" class="form-control" placeholder="Fax No." value="{{ old('fax_no') }}" />
                                        @error('fax_no')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label>Status <span class="color-red-700"></span></label>
                                        <div class="col-form-label">
                                            <div class="radio-inline">
                                                <label class="radio radio-primary">
                                                    <input type="radio" name="person_status" value="Active" {{ old('person_status')=='Active'?'checked':'' }}>
                                                    <span></span>Active</label>

                                                <label class="radio radio-primary">
                                                    <input type="radio" name="person_status" value="Inactive" {{ old('person_status')=='Inactive'?'checked':'' }}>
                                                    <span></span>Inactive</label>

                                            </div>
                                            @error('person_status')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <h4 class="mt-10 font-weight-bold section_heading text-white">
                                <span>Permanent/ Postal Address</span>
                            </h4>
                            <div class="section_box">

                                <div class="rep-addresses m_repeater_section">

                                    <div  data-repeater-list="addresses">
                                        @for($index =0; $index<count(old('addresses',array(1))); $index++)
                                            @component('plot-allotments.address-item', ['index'=> $index, 'provinces'=> $provinces]) @endcomponent
                                        @endfor

                                    </div>
                                    <div class="text-right form-group">
                                        <div data-repeater-create="" class="btn btn btn-sm btn-success m-btn m-btn--icon m-btn--pill m-btn--wide">
                                                                        <span>
                                                                            <i class="la la-plus"></i>
                                                                            <span>Add More</span>
                                                                        </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <h4 class="mt-10 font-weight-bold section_heading text-white">
                                <span>Status</span>
                            </h4>


                            <div class="section_box">
                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Status <span class="color-red-700"></span></label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="status" value="1" {{ old('status')=='1'?'checked':'' }}>
                                                <span></span>Active</label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="status" value="0" {{ old('status')=='0'?'checked':'' }}>
                                                <span></span>Inactive</label>

                                        </div>
                                        @error('status')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('plot-allotments.index') }}"  class="btn btn-secondary">Cancel</a>
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
@endsection

@push('post-scripts')

    <script>
        $(document).ready(function() {
            'use strict';
            $('#form_add_edit').validate({
                rules: {
                    special_economic_zone_id: "required",
                    plot_no: "required",
                    plot_type: "required",
                    plot_size: "required",
                    plot_status: "required",
                    status: "required"
                },
                messages: {
                    special_economic_zone_id: {
                        required: "Economic Zone is required."
                    },
                    plot_no: {
                        required: "Plot No. is required."
                    },
                    plot_type: {
                        required: "Plot type is required."
                    },
                    plot_size: {
                        required: "Plot Size is required."
                    },
                    plot_status: {
                        required: "Plot Status is required."
                    },
                    status: {
                        required: "Status  is required."
                    }


                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-danger');
                },
                errorPlacement: function(error, element) {
                    if (element.attr("type") === "radio") {
                        error.insertAfter(element.parent().parent());
                    }else if(element.has('option').length) {
                        error.insertAfter(element.next());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $('.m_repeater_section').repeater({
                initEmpty: false,
                defaultValues: {
                    'text-input': 'foo'
                },
                show: function() {
                    $(this).slideDown();
                    $(this).find('.select2.select2-container').remove();
                    $(this).find('.select2').removeClass('select2-hidden-accessible');
                    $('.select2').select2();
                },

                hide: function(deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                isFirstItemUndeletable: true
            });

            $(".cnic-mask").inputmask("mask", {
                "mask": "99999-9999999-9"
            });

            $(".mobile-no").inputmask("mask", {
                "mask": "0399-9999999"
            });

        });

        let districts = {!! $districts??array() !!};
        let tehsils = {!! $tehsils??array() !!};

        function getProvinceDistricts(province_obj) {
            let province_id = $(province_obj).val();
            let district_obj = $(province_obj).parents('.form-group:first').next('.form-group:first').find('.district_ids');
            getDistricts(district_obj ,province_id);
        }

        function getDistrictTehsils(district_obj) {
            let district_id = $(district_obj).val();
            let tehsile_obj = $(district_obj).parents('.form-group:first').find('.tehsile_ids');
            getTehsils(tehsile_obj, district_id);
        }

        function getDistricts(district_obj ,province_id, selected_district) {
            $(district_obj).empty();
            var newOption = new Option("Select District", "", false, false);
            $(district_obj).append(newOption);
            var filter_districts = _.filter(districts, {'province_id': parseInt(province_id)});
            filter_districts.forEach(function (row) {
                $(district_obj).append('<option ' + (selected_district == row.id ? "selected" : "") + ' value="' + row.id + '">' + row.district_name_e + '</option>');
            });
            $(district_obj).trigger('change.select2');

        }

        function getTehsils(tehsile_obj, district_id, selected_tehsil) {
            $(tehsile_obj).empty();
            var newOption = new Option("Select Tehsil", "", false, false);
            $(tehsile_obj).append(newOption);
            var filter_tehsils = _.filter(tehsils, {'district_id': parseInt(district_id)});
            filter_tehsils.forEach(function (row) {
                $(tehsile_obj).append('<option ' + (selected_tehsil == row.id ? "selected" : "") + ' value="' + row.id + '">' + row.tehsil_name_e + '</option>');
            });
            $(tehsile_obj).trigger('change.select2');

        }

        @if(old('province_id'))
        var selected_district = {{ old('district_id') }};
        getDistricts('#district_id',{{ old('province_id') }}, selected_district);
        @endif

        @if(old('district_id'))
        var selected_tehsil = {{ old('tehsil_id') }};
        getTehsils('#tehsil_id',{{ old('district_id') }}, selected_tehsil);
        @endif

    </script>
@endpush
