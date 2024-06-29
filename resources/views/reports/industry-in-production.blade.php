@extends('layouts.main')
@push('title', 'Industrial Zones')
@push('breadcrumb-items')
    <li class="breadcrumb-item">
        <a  class="text-muted">Industry In Production at M-3 Industrial City</a>
    </li>
@endpush
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->

            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Industry In Production at M-3 Industrial City</h3>
                    </div>
                </div>
                @component('_components.alerts-default') @endcomponent
                <div class="card-body">
                    <!--begin: Search Form-->
                    <div class="kt-form kt-form--fit mb-15">
                        <div class="row mb-6">
                            <div class="col-lg-3 mb-lg-0 mb-6">
                                <label>Sector:</label>
                                <select class="form-control datatable-input" name="sector" id="sector" onchange="reDrawDataTable()" >
                                    <option value="">Select Sector</option>
                                    <option value="Automobiles">Automobiles</option>
                                    <option value="Building Material">Building Material</option>
                                    <option value="Chemical & Paints">Chemical & Paints</option>
                                    <option value="Electrical & Electronic">Electrical & Electronic</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Food Processing">Food Processing</option>
                                    <option value="Packaging">Packaging</option>
                                    <option value="Pharmaceuticals">Pharmaceuticals</option>
                                    <option value="Textiles">Textiles</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form-->

                    <!--begin: Datatable-->
                    <table class="table  data-table table-separate table-head-custom table-checkable" id="my_datatable">
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Business Name</th>
                            <th class="text-center">Sector</th>
                            <th class="text-center">In Production Since</th>
                        </tr>
                        </thead>

                    </table>
                    <!--end: Datatable-->
                </div>
            </div>


            <!--end::Row-->
            <!--begin::Row-->

            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@push('post-scripts')
    <script type="text/javascript">
        var myDataTable;
        $(function () {

            myDataTable = $('#my_datatable').DataTable({
                responsive: true,
                language: {
                    infoFiltered: ""
                },
                processing: true,
                pageLength: 30,
                serverSide: true,
                searching: true,
                ajax: {
                    url: '{{ route('reports.industry-in-production') }}',
                    type: "GET",
                    data: function (row) {
                        row.sector  = $('#sector').val();
                    }
                },
                columns: [
                    {data: 'sr_no', name: 'sr_no'},
                    {data: 'business_name', name: 'business_name'},
                    {data: 'sector_name', name: 'sector_name', class: 'text-center'},
                    {data: 'in_production_since', name: 'in_production_since', class: 'text-center'},
                ],
                order: [[0, 'asc']],
                dom: 'Blfrtip',

                lengthMenu: [
                    [10, 20, 30, 50, 100, -1],
                    ['10', '20', '30', '50', '100', 'All']
                ],
                buttons: [
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: 'Print',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-csv"></i>',
                        titleAttr: 'CSV',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }

                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel"></i>',
                        titleAttr: 'Excel',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf"></i>',
                        titleAttr: 'PDF',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    }
                ],
            });

        });


    </script>
@endpush
