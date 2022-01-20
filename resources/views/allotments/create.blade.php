<div class="card card-custom gutter-b">
                        <div class="card-header" style="background: transparent !important;">
                            <h3 class="card-title">Add Allotment</h3>

                        </div>

                    <!--begin::Form-->
                    {!! Form::open(array('id'=>'form_add_edit','route' => ['plot-allotments.allotments.store', $plotAllotment],'method'=>'POST')) !!}
                        <div class="card-body">

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Allotment Date <span class="color-red-700">*</span></label>
                                    <input type="text" readonly name="allotment_date" class="form-control datepicker" placeholder="Allotment Date" value="{{ old('allotment_date') }}" style="width: 100% !important;" required />
                                    @error('allotment_date')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>Reference No. <span class="color-red-700"></span></label>
                                    <input type="text" name="reference_no" class="form-control" placeholder="Reference No." value="{{ old('reference_no') }}" />
                                    @error('reference_no')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Business Sector <span class="color-red-700">*</span></label>
                                    <select class="form-control select2" name="sector_id" required style="width: 100% !important;">
                                        <option value="">Select Business Sector</option>
                                        @foreach($sectors as $sector)
                                            <option {{ old('sector_id')== $sector->id ? 'selected': '' }} value="{{ $sector->id }}"> {{ $sector->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('sector_id')
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
                    allotment_date: "required",
                    status: "required"
                },
                messages: {
                    sector_id: {
                        required: "Business Sector is required."
                    },
                    allotment_date: {
                        required: "Allotment Date is required."
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
