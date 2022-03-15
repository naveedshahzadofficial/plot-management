<div class="card card-custom gutter-b">
    <div class="card-header" style="background: transparent !important;">
        <h3 class="card-title">Update Allotment</h3>

    </div>

    <!--begin::Form-->
    {!! Form::open(array('id'=>'form_add_edit','route' => ['plot-allotments.allotments.update', $plotAllotment, $allotment],'method'=>'PUT')) !!}
    <div class="card-body">
        <div class="row form-group">
            <div class="col-lg-6">
                <label>Allotment Date <span class="color-red-700">*</span></label>
                <input type="text" readonly name="allotment_date" class="form-control datepicker" placeholder="Allotment Date" value="{{ old('allotment_date', $allotment->allotment_date) }}" style="width: 100% !important;" required />
                @error('allotment_date')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6">
                <label>Reference No. <span class="color-red-700"></span></label>
                <input type="text" name="reference_no" class="form-control" placeholder="Reference No." value="{{ old('reference_no', $allotment->reference_no) }}" />
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
                        <option {{ old('sector_id', $allotment->sector_id)== $sector->id ? 'selected': '' }} value="{{ $sector->id }}"> {{ $sector->name }} </option>
                    @endforeach
                </select>
                @error('sector_id')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <h4 class="font-weight-bold section_heading text-white">
            <span>Plot Allocation </span>
        </h4>
        <div class="section_box">
            <div class="cstm m_repeater_section">
                <div  data-repeater-list="plot_allocations">
                    @for($index =0; $index<count(old('plot_allocations',array(1))); $index++)
                        @component('allotments.plot-allocation-item', ['index'=> $index, 'plotAllotment'=>$plotAllotment]) @endcomponent
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




        <div class="row form-group">
            <div class="col-lg-6">
                <label>Status <span class="color-red-700">*</span></label>
                <div class="col-form-label">
                    <div class="radio-inline">
                        <label class="radio radio-primary">
                            <input type="radio" name="status" value="1" {{ old('status', $allotment->status)=='1'?'checked':'' }}>
                            <span></span>Active</label>

                        <label class="radio radio-primary">
                            <input type="radio" name="status" value="0" {{ old('status', $allotment->status)=='0'?'checked':'' }}>
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
        <a href="{{ route('plot-allotments.allotments.index', $plotAllotment) }}"  class="btn btn-secondary">Cancel</a>
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

        });

        function onChangeZone(obj){
            let parent_div = $(obj).closest('.special_zone');
            let special_economic_zone_id = parent_div.find('.special_economic_zone_id').val();
            let plot_type = parent_div.find('.plot_type:checked').val();
            let plot_id = parent_div.parent().find('.plot_id');
            $(plot_id).empty();
            $(plot_id).append('<option data-size="" value="">Select Plot</option>');
            $(plot_id).trigger('change.select2');
            if(plot_type && special_economic_zone_id) {
                getZonePlots(plot_id, plot_type, special_economic_zone_id);
            }
        }

        function getZonePlots(plot_id, plot_type, special_economic_zone_id){
            $.post('{{ route('plots.zone.ajax') }}', { plot_type:plot_type, special_economic_zone_id:special_economic_zone_id }, function (response){
                response.forEach(function (row) {
                    $(plot_id).append('<option data-size="'+row.plot_size+'"  value="' + row.id + '">' + row.plot_no + ' ('+ row.plot_size +' Acres)</option>');
                });
                $(plot_id).trigger('change.select2');
            }, "json");
        }

        function selectPlot(obj){
            let plot_size = $(obj).find(":selected").data("size");
            if(plot_size){
                $(obj).closest('.repeater-item').find('.plot_size').val(plot_size);
            }
        }

    </script>
@endpush
