<div class="card card-custom gutter-b example example-compact">
    <div class="card-header" style="background: transparent !important;">
        <h3 class="card-title">Update Master Plan</h3>

    </div>

    <!--begin::Form-->
    {!! Form::open(array('id'=>'form_add_edit','route' => ['special-economic-zones.master-plans.update', $specialEconomicZone, $masterPlan],'method'=>'PUT','files' => 'true')) !!}
    <div class="card-body">

        <div class="row form-group">


            <div class="col-lg-6">
                <label>Year <span class="color-red-700">*</span></label>
                <input type="text" name="year" class="form-control" placeholder="Year" value="{{ old('year', $masterPlan->year) }}" />
                @error('year')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label>Upload Master Plan File <span class="color-red-700">*</span>@if(!empty($masterPlan->master_plan_file))&nbsp;<a href="{{ Storage::url($masterPlan->master_plan_file) }}" target="_blank">View File</a> @endif</label>
                <input type="file" name="master_plan_file" class="form-control" />
                <input type="hidden" name="old_master_plan_file" class="form-control" value="{{ $masterPlan->master_plan_file }}" />
                @error('master_plan_file')
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
                            <input type="radio" name="status" value="1" {{ old('status', $masterPlan->status)=='1'?'checked':'' }}>
                            <span></span>Active</label>

                        <label class="radio radio-primary">
                            <input type="radio" name="status" value="0" {{ old('status', $masterPlan->status)=='0'?'checked':'' }}>
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
        <a href="{{ route('special-economic-zones.master-plans.index', $specialEconomicZone) }}"  class="btn btn-secondary">Cancel</a>
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
                    year: "required",
                    master_plan_file: {
                        required: {{$masterPlan->master_plan_file?'false':'true'}},
                        extension: "png|jpg|jpeg|pdf|doc|docx",
                        filesize : 5000000
                    },
                    status: "required"
                },
                messages: {
                    year: {
                        required: "Year is required."
                    },
                    master_plan_file: {
                        required: "Master Plan File is required.",
                        extension: "Master Plan must be a file of type: jpg, jpeg, png, pdf, doc, docx.",
                        filesize: "Master Plan file must not be greater than 5MB."
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
