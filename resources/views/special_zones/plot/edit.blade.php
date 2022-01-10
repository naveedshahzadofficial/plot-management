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
                            <a  class="text-muted">System Definitions</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('plots.index') }}" class="text-muted">Plots</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">Update</a>
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
                            <h3 class="card-title">Plot Update</h3>

                        </div>

                        <!--begin::Form-->
                        {!! Form::model($plot, ['id'=>'special_zone_edit','method' => 'put','route' => ['plots.update', $plot->id]]) !!}
                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Name</label>
                                    <input type="text" name="number" value="{{ $plot->number }}" class="form-control" placeholder="Name" />
                                    @error('number')
                                <div class="error">{{ $message }}</div>
                            @enderror
                                </div>



                                <div class="col-lg-6">
                                    <label>Area</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="area" @if($plot->area== 'Acre' ) checked @endif value="Acre">
                                                <span></span>Acre</label>


                                            <label class="radio radio-primary">
                                                <input type="radio" name="area" @if($plot->area== 'Kanal' ) checked @endif value="Kanal">
                                                <span></span>Kanal</label>
                                                @error('area')
                                <div class="error">{{ $message }}</div>
                            @enderror
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Latitide</label>
                                    <input type="text" name="latitide"  value="{{ $plot->latitide }}"   class="form-control" placeholder="Latitide"  />
                                    @error('latitide')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Longitude</label>
                                    <input type="text" name="longitude" class="form-control" value="{{ $plot->longitude }}" placeholder="Longitude"  />
                                    @error('longitude')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                </div>

                            </div>




                            <div class="form-group row">


                                <div class="col-lg-6">
                                    <label>Zones</label>
                                    <div class="col-form-label">
                                        <select class="form-control" name="zone_id"  required>

                                            @foreach($zones as $zone)
                                            <option value="{{ $zone->id }}" @if($zone->id== $plot->zone_id) ) selected @endif > {{ $zone->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('zone_id')
                                <div class="error">{{ $message }}</div>
                              @enderror
                                    </div>

                                </div>


                                <div class="col-lg-6">
                                    <label>Status</label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="status" @if($plot->status== 'Active' ) checked @endif value="Active">
                                                <span></span>Active</label>


                                            <label class="radio radio-primary">
                                                <input type="radio" name="status" @if($plot->status== 'Inactive' ) checked @endif value="Inactive">
                                                <span></span>Inactive</label>
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
                            <a href="{{ route('plots.index') }}" class="btn btn-secondary">Cancel</a>
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
        $('#special_zone_edit').validate({
            rules: {
                number: "required",
                zone_id: "required",
                area: "required",
                status: "required",
                latitide: "required",
                longitude: "required"
            },
            messages: {
                number: {
                    required: "Number is required."
                },
                zone_id: {
                    required: "Area Zone is required."
                },
                area: {
                    required: "Area No is required."
                },
                status: {
                    required: "Status is required."
                },
                latitide: {
                    required: "Latitide No is required."
                },
                longitude: {
                    required: "Longitude No is required."
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
                } else if (element.has('select').length) {
                    error.insertAfter(element.next());
                } else {
                    error.insertAfter(element);
                }
            }
        });


    });
</script>
@endpush
