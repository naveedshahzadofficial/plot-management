@extends('layouts.main')
@push('title', 'Add Plots')
@push('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{ route('plots.index') }}" class="text-muted">Plots</a>
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
                            <h3 class="card-title">Add Plot</h3>

                        </div>

                        <!--begin::Form-->
                        {!! Form::open(array('id'=>'form_add_edit','route' => 'plots.store','method'=>'POST')) !!}
                        <div class="card-body">

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
                                    <label>Plot No. <span class="color-red-700">*</span></label>
                                    <input maxlength="10" type="text" name="plot_no" class="form-control money_format" placeholder="Total Area" value="{{ old('plot_no') }}" />
                                    @error('plot_no')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Plot Type <span class="color-red-700">*</span></label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="plot_type" value="Industrial" {{ old('plot_type')=='Industrial'?'checked':'' }}>
                                                <span></span>Industrial</label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="plot_type" value="Commercial" {{ old('plot_type')=='Commercial'?'checked':'' }}>
                                                <span></span>Commercial</label>

                                        </div>
                                        @error('plot_type')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <label>Plot Size (Acres) <span class="color-red-700">*</span></label>
                                    <input maxlength="20" type="text" name="plot_size" class="form-control money_format" placeholder="Industrial Plots" value="{{ old('plot_size') }}" />
                                    @error('plot_size')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Plot Status <span class="color-red-700">*</span></label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="plot_status" value="Sold" {{ old('plot_status')=='Sold'?'checked':'' }}>
                                                <span></span>Sold</label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="plot_status" value="Unsold" {{ old('plot_status')=='Unsold'?'checked':'' }}>
                                                <span></span>Unsold</label>

                                        </div>
                                        @error('plot_status')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Latitude <span class="color-red-700"></span></label>
                                    <input type="number" name="latitude" class="form-control" placeholder="latitude" value="{{ old('latitude') }}"  />
                                    @error('latitude')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Longitude <span class="color-red-700"></span></label>
                                    <input type="number" name="longitude" class="form-control" placeholder="Longitude" value="{{ old('longitude') }}" />
                                    @error('longitude')
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
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('plots.index') }}"  class="btn btn-secondary">Cancel</a>
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


        });
    </script>
@endpush
