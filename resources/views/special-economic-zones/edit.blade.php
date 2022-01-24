@extends('layouts.main')
@push('title', 'Update Special Economic Zones')
@push('breadcrumb-items')
    <li class="breadcrumb-item">
        <a  class="text-muted">System Definitions</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('special-economic-zones.index') }}" class="text-muted">Special Economic Zones</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Update</a>
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
                            <h3 class="card-title">Update Special Economic Zone</h3>

                        </div>

                        <!--begin::Form-->
                        {!! Form::open(array('id'=>'form_add_edit','route' => ['special-economic-zones.update', $specialEconomicZone],'method'=>'PUT')) !!}
                        <div class="card-body">

                            @if(!auth()->user()->hasRole('Developer'))
                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Developer <span class="color-red-700">*</span></label>
                                    <select class="form-control select2" name="user_id">
                                        <option value="">Select Developer</option>
                                        @foreach($users as $user)
                                            <option {{ old('user_id', $specialEconomicZone->user_id)== $user->id ? 'selected': '' }} value="{{ $user->id }}"> {{ $user->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @else
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            @endif

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Name <span class="color-red-700">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $specialEconomicZone->name) }}" />
                                    @error('name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>District <span class="color-red-700">*</span></label>
                                        <select class="form-control select2" name="district_id">
                                            <option value="">Select District</option>
                                            @foreach($districts as $district)
                                                <option {{ old('district_id', $specialEconomicZone->district_id)== $district->id ? 'selected': '' }} value="{{ $district->id }}"> {{ $district->district_name_e }} </option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Total Area (Acres) <span class="color-red-700">*</span></label>
                                    <input type="text" name="total_area" class="form-control money_format" placeholder="Total Area" value="{{ old('total_area', $specialEconomicZone->total_area) }}" />
                                    @error('total_area')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Industrial Area (Acres) <span class="color-red-700">*</span></label>
                                    <input type="text" name="industrial_area" class="form-control money_format" placeholder="Industrial Area" value="{{ old('industrial_area', $specialEconomicZone->industrial_area) }}" />
                                    @error('industrial_area')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Industrial Total Plots <span class="color-red-700">*</span></label>
                                    <input type="text" name="industrial_total_plots" class="form-control money_format" placeholder="Industrial Plots" value="{{ old('industrial_total_plots', $specialEconomicZone->industrial_total_plots) }}" />
                                    @error('industrial_total_plots')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Commercial Area (Acres) <span class="color-red-700">*</span></label>
                                    <input type="text" name="commercial_area" class="form-control money_format" placeholder="Commercial Area" value="{{ old('commercial_area', $specialEconomicZone->commercial_area) }}" />
                                    @error('commercial_area')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Commercial Total Plots <span class="color-red-700">*</span></label>
                                    <input type="text" name="commercial_total_plots" class="form-control money_format" placeholder="Commercial Plots" value="{{ old('commercial_total_plots', $specialEconomicZone->commercial_total_plots) }}" />
                                    @error('commercial_total_plots')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Infrastructure Area (Acres) <span class="color-red-700">*</span></label>
                                    <input type="text" name="infrastructure_area" class="form-control money_format" placeholder="Infrastructure Area" value="{{ old('infrastructure_area', $specialEconomicZone->infrastructure_area) }}" />
                                    @error('infrastructure_area')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Parks Area (Acres) <span class="color-red-700">*</span></label>
                                    <input type="text" name="parks_area" class="form-control money_format" placeholder="Parks Area" value="{{ old('parks_area', $specialEconomicZone->parks_area) }}" />
                                    @error('parks_area')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Amenities Area (Acres) <span class="color-red-700">*</span></label>
                                    <input type="text" name="amenities_area" class="form-control money_format" placeholder="Amenities Area" value="{{ old('amenities_area', $specialEconomicZone->amenities_area) }}" />
                                    @error('amenities_area')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Other Area (Acres) <span class="color-red-700"></span></label>
                                    <input type="text" name="other_area" class="form-control money_format" placeholder="Other Area" value="{{ old('other_area', $specialEconomicZone->other_area) }}" />
                                    @error('other_area')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>


                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Latitude <span class="color-red-700">*</span></label>
                                    <input type="number" name="latitude" class="form-control" placeholder="latitude" value="{{ old('latitude', $specialEconomicZone->latitude) }}"  />
                                    @error('latitude')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Longitude <span class="color-red-700">*</span></label>
                                    <input type="number" name="longitude" class="form-control" placeholder="Longitude" value="{{ old('longitude', $specialEconomicZone->longitude) }}" />
                                    @error('longitude')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>



                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Status <span class="color-red-700">*</span></label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="status" value="1" {{ old('status', $specialEconomicZone->status)=='1'?'checked':'' }}>
                                                <span></span>Active</label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="status" value="0" {{ old('status', $specialEconomicZone->status)=='0'?'checked':'' }}>
                                                <span></span>Inactive</label>

                                        </div>
                                        @error('status')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('special-economic-zones.index') }}"  class="btn btn-secondary">Cancel</a>
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
                    user_id: "required",
                    name: "required",
                    district_id: "required",
                    total_area: "required",
                    industrial_area: "required",
                    industrial_total_plots: "required",
                    commercial_area: "required",
                    commercial_total_plots: "required",
                    infrastructure_area: "required",
                    parks_area: "required",
                    amenities_area: "required",
                    latitude: "required",
                    longitude: "required",
                    status: "required"
                },
                messages: {
                    user_id: {
                        required: "Developer is required."
                    },
                    name: {
                        required: "Name is required."
                    },
                    district_id: {
                        required: "District is required."
                    },
                    total_area: {
                        required: "Total Area is required."
                    },
                    industrial_area: {
                        required: "Industrial Area is required."
                    },
                    industrial_total_plots: {
                        required: "Industrial total plots is required."
                    },
                    commercial_area: {
                        required: "Commercial Area is required."
                    },
                    commercial_total_plots: {
                        required: "Commercial total plots is required."
                    },
                    infrastructure_area: {
                        required: "Infrastructure Area is required."
                    },
                    parks_area: {
                        required: "Parks Area is required."
                    },
                    amenities_area: {
                        required: "Amenities Area is required."
                    },
                    latitude: {
                        required: "Latitude No is required."
                    },
                    longitude: {
                        required: "Longitude No is required."
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


        });
    </script>
@endpush
