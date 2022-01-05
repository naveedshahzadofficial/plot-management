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
                            <a class="text-muted">Failed Jobs</a>
                        </li>

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->

        </div>
    </div>


    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->

            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Failed Jobs
                            <span class="d-block text-muted pt-2 font-size-sm">List</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->

                        <!--begin::Button-->
                    
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">


                    <!--begin: Datatable-->
                   
                    <table class="table  data-table table-separate table-head-custom table-checkable" id="jobs_datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Payload</th>
                                    <th>Exception</th>
                                    <th>Fail Date</th>
                                <th width="280px">Action</th>
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
</div>
@endsection


@push('post-scripts')
<script type="text/javascript">
    $(function() {

   var table = $('#jobs_datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive:true,
            ajax: "{{ route('jobs.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false },
                {
                    data: 'payload',
                    name: 'payload'
                },
                {
                    data: 'exception',
                    name: 'exception'
                },
                {
                    data: 'failed_at',
                    name: 'failed_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>

@endpush