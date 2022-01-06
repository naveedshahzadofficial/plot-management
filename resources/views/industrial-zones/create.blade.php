<div class="card card-custom gutter-b example example-compact">
                        <div class="card-header" style="background: transparent !important;">
                            <h3 class="card-title">Add Industrial Zone</h3>

                        </div>

                    <!--begin::Form-->
                    {!! Form::open(array('id'=>'form_add_edit','route' => ['special-economic-zones.industrial-zones.store', $specialEconomicZone],'method'=>'POST')) !!}
                        <div class="card-body">

                            <div class="row form-group">

                                <div class="col-lg-6">
                                    <label>Focused Industrial Sector <span class="color-red-700">*</span></label>
                                    <select class="form-control select2" name="sector_id">
                                        <option value="">Select Sector</option>
                                        @foreach($sectors as $sector)
                                            <option {{ old('sector_id')== $sector->id ? 'selected': '' }} value="{{ $sector->id }}"> {{ $sector->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('sector_id')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="col-lg-6">
                                    <label>Area (Acres) <span class="color-red-700">*</span></label>
                                    <input type="text" maxlength="13" name="area" class="form-control money_format" placeholder="Area" value="{{ old('area') }}" />
                                    @error('area')
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
                            <a href="{{ route('special-economic-zones.index') }}"  class="btn btn-secondary">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                    <!--end::Form-->

                    </div>

@push('post-scripts')

    <script>
        $(document).ready(function() {
            'use strict';
            $('#form_add_edit').validate({
                rules: {
                    sector_id: "required",
                    area: "required",
                    status: "required"
                },
                messages: {
                    sector_id: {
                        required: "Industrial Sector is required."
                    },
                    area: {
                        required: "Area is required."
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
