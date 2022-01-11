@extends('layouts.main')
@push('title', 'Split Plot')
@push('breadcrumb-items')
    <li class="breadcrumb-item">
        <a  class="text-muted">System Definitions</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('plots.index') }}" class="text-muted">Plots</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Split</a>
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
                            <h3 class="card-title">Split Plot</h3>

                        </div>

                        <!--begin::Form-->
                        {!! Form::open(array('id'=>'form_add_edit','route' => ['plots.split.store', $plot],'method'=>'POST')) !!}
                        <div class="card-body">

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Previous Plot No. <span class="color-red-700"></span></label>
                                    <span class="form-control">{{ number_format($plot->plot_no) }}</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Previous Size (Acres). <span class="color-red-700"></span></label>
                                    <span class="form-control">{{ number_format($plot->plot_size) }}</span>
                                </div>
                            </div>


                            <div class="cstm m_repeater_section">
                            <div  data-repeater-list="new_plots">
                                @for($index =0; $index<count(old('new_plots',array(1))); $index++)
                                @component('plots.plot-split-item', ['index'=> $index]) @endcomponent
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
                },

                hide: function(deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                isFirstItemUndeletable: true
            });
        });
    </script>
@endpush
