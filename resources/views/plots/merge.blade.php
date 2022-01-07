@extends('layouts.main')
@push('title', 'Merge Plots')
@push('breadcrumb-items')
    <li class="breadcrumb-item">
        <a  class="text-muted">System Definitions</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('plots.index') }}" class="text-muted">Plots</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Merge</a>
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
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Merge Plots</h3>

                        </div>

                        <!--begin::Form-->
                        {!! Form::open(array('id'=>'form_add_edit','route' => 'plots.merge.store','method'=>'POST')) !!}
                        <div class="card-body">

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Special Economic Zone <span class="color-red-700">*</span></label>
                                    <select class="form-control select2" name="special_economic_zone_id" id="special_economic_zone_id">
                                        <option value="">Select Economic Zone</option>
                                        @isset($data['specialEconomicZones'])
                                        @foreach($data['specialEconomicZones'] as $specialEconomicZone)
                                            <option {{ old('special_economic_zone_id')== $specialEconomicZone->id ? 'selected': '' }} value="{{ $specialEconomicZone->id }}"> {{ $specialEconomicZone->name }} </option>
                                        @endforeach
                                        @endisset
                                    </select>
                                    @error('special_economic_zone_id')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Plot Type <span class="color-red-700">*</span></label>
                                    <div class="col-form-label">
                                        <div class="radio-inline">
                                            <label class="radio radio-primary">
                                                <input type="radio" name="plot_type" class="plot_type" value="Industrial" {{ old('plot_type')=='Industrial'?'checked':'' }}>
                                                <span></span>Industrial</label>

                                            <label class="radio radio-primary">
                                                <input type="radio" name="plot_type" class="plot_type" value="Commercial" {{ old('plot_type')=='Commercial'?'checked':'' }}>
                                                <span></span>Commercial</label>

                                        </div>
                                        @error('plot_type')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Merge Plots <span class="color-red-700">*</span></label>
                                    <select class="form-control select2" multiple name="merge_plots[]" id="merge_plots">

                                    </select>
                                    @error('merge_plots')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>New Plot No. <span class="color-red-700">*</span></label>
                                    <input maxlength="10" type="text" name="plot_no" class="form-control money_format" placeholder="Total Area" value="{{ old('plot_no') }}" />
                                    @error('plot_no')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>New Plot Size (Acres) <span class="color-red-700">*</span></label>
                                    <input readonly maxlength="20" type="text" name="plot_size" class="form-control money_format" placeholder="Plot Size" value="{{ old('plot_size') }}" id="plot_size" />
                                    @error('plot_size')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
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
                    plot_type: "required",
                    plot_no: "required",
                    plot_size: "required",
                    "merge_plots[]": {
                        required: true,
                        minlength: 2,
                    },
                },
                messages: {
                    special_economic_zone_id: {
                        required: "Economic Zone is required."
                    },
                    plot_no: {
                        required: "New Plot No. is required."
                    },
                    plot_type: {
                        required: "Plot type is required."
                    },
                    plot_size: {
                        required: "New Plot Size is required."
                    },

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
        $("#special_economic_zone_id, .plot_type").change(function(){
            let plot_type = $('input[name="plot_type"]:checked').val();
            let special_economic_zone_id = $('#special_economic_zone_id').val();

            $('#merge_plots').empty();
            $('#merge_plots').trigger('change.select2');

            if(plot_type && special_economic_zone_id) {
                getZonePlots(plot_type, special_economic_zone_id);
            }
        });

        $('#merge_plots').change(function (){
           let merge_plots =  $('#merge_plots').val();
           $.post('{{ route('plots.merge-area.ajax') }}', {merge_plots:merge_plots}, function (response){
                $('#plot_size').val(response);
           });
        });

        function getZonePlots(plot_type, special_economic_zone_id){
            $.post('{{ route('plots.zone.ajax') }}', { plot_type:plot_type, special_economic_zone_id:special_economic_zone_id }, function (response){
                response.forEach(function (row) {
                    $('#merge_plots').append('<option data-size="'+row.plot_size+'"  value="' + row.id + '">' + row.plot_no + ' ('+ row.plot_size +' Acres)</option>');
                });
                $('#merge_plots').trigger('change.select2');
            }, "json");
        }


    </script>
@endpush
