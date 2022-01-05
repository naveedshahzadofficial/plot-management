@extends('layouts.main')
@push('title', 'SEZ Rates')
@push('breadcrumb-items')
    <li class="breadcrumb-item">
        <a  class="text-muted">System Definitions</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('special-economic-zones.index') }}" class="text-muted">Special Economic Zones</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">SEZ Rates ({{ $specialEconomicZone->name }})</a>
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
                            <h3 class="card-label">SEZ Rates ({{ $specialEconomicZone->name }})

                            </h3>
                        </div>
                    </div>

                    @component('_components.alerts-default') @endcomponent

                    @includeWhen(!isset($sezRate), 'sez-rates.create')
                    @includeWhen($sezRate??false, 'sez-rates.edit')

                    <div class="card-body">
                    <!--begin: Search Form-->

                        <!--begin: Datatable-->
                        <table class="table  data-table table-separate table-head-custom table-checkable" id="my_datatable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Rate per Acre (PKR)</th>
                                <th>Date of Approval</th>
                                <th>Status</th>
                                <th>Action</th>
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
                    url: '{{ route('special-economic-zones.sez-rates.index', $specialEconomicZone) }}',
                    type: "GET",
                    data: function (row) {
                        row.test = 1;
                    }
                },
                columns: [
                    {data: 'id', searchable: false, visible: false, printable: false},
                    {data: 'rate_per_acre', name: 'rate_per_acre'},
                    {data: 'date_of_approval', name: 'date_of_approval'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[0, 'desc']],
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
