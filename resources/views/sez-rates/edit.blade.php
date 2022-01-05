<div class="card card-custom gutter-b example example-compact">
    <div class="card-header" style="background: transparent !important;">
        <h3 class="card-title">Update SEZ Rate</h3>

    </div>

    <!--begin::Form-->
    {!! Form::open(array('id'=>'form_add_edit','route' => ['special-economic-zones.sez-rates.update', $specialEconomicZone, $sezRate],'method'=>'PUT')) !!}
    <div class="card-body">

        <div class="row form-group">

            <div class="col-lg-6">
                <label>Rate per Acre (PKR) <span class="color-red-700">*</span></label>
                <input type="text" name="rate_per_acre" class="form-control money_format" placeholder="Rate per Acre" value="{{ old('rate_per_acre', $sezRate->rate_per_acre) }}" />
                @error('rate_per_acre')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label>Date of Approval <span class="color-red-700">*</span></label>
                <input type="text" name="date_of_approval" readonly class="form-control datepicker" placeholder="Date of Approval" value="{{ old('date_of_approval', $sezRate->date_of_approval) }}" />
                @error('date_of_approval')
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
                            <input type="radio" name="status" value="1" {{ old('status', $sezRate->status)=='1'?'checked':'' }}>
                            <span></span>Active</label>

                        <label class="radio radio-primary">
                            <input type="radio" name="status" value="0" {{ old('status', $sezRate->status)=='0'?'checked':'' }}>
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
        <a href="{{ route('special-economic-zones.sez-rates.index', $specialEconomicZone) }}"  class="btn btn-secondary">Cancel</a>
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
                    rate_per_acre: "required",
                    date_of_approval: "required",
                    status: "required"
                },
                messages: {
                    rate_per_acre: {
                        required: "Rate per Acre is required."
                    },
                    date_of_approval: {
                        required: "Date of Approval is required."
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
