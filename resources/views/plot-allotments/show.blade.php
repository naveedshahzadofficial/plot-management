@extends('layouts.main')
@push('title', 'Detail Special Economic Zones')
@push('breadcrumb-items')
    <li class="breadcrumb-item">
        <a  class="text-muted">System Definitions</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('special-economic-zones.index') }}" class="text-muted">Special Economic Zones</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Detail</a>
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
                            <h3 class="card-title">Detail Special Economic Zone</h3>

                        </div>
                        <div class="card-body">
                        <div class="row mt-10">
                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Name:</strong> </div>
                                    <div class="col-md-6 value">{{ $specialEconomicZone->name }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>District:</strong> </div>
                                    <div class="col-md-6 value">{{ optional($specialEconomicZone->district)->district_name_e }}</div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-10">
                        <div class="col-md-6">
                            <div class="static-info row">
                                <div class="col-md-6 name"> <strong>Total Area (Acres):</strong> </div>
                                <div class="col-md-6 value">{{ number_format($specialEconomicZone->total_area) }}</div>
                            </div>
                        </div>

                        </div>

                        <div class="row mt-10">
                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Industrial Area (Acres):</strong> </div>
                                    <div class="col-md-6 value">{{ number_format($specialEconomicZone->industrial_area) }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Industrial Total Plots:</strong> </div>
                                    <div class="col-md-6 value">{{ number_format($specialEconomicZone->industrial_total_plots) }}</div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-10">
                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Commercial Area (Acres):</strong> </div>
                                    <div class="col-md-6 value">{{ number_format($specialEconomicZone->commercial_area) }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Commercial Total Plots:</strong> </div>
                                    <div class="col-md-6 value">{{ number_format($specialEconomicZone->commercial_total_plots) }}</div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-10">
                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Infrastructure Area (Acres):</strong> </div>
                                    <div class="col-md-6 value">{{ number_format($specialEconomicZone->infrastructure_area) }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Parks Area (Acres):</strong> </div>
                                    <div class="col-md-6 value">{{ number_format($specialEconomicZone->parks_area) }}</div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-10">
                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Amenities Area (Acres):</strong> </div>
                                    <div class="col-md-6 value">{{ number_format($specialEconomicZone->amenities_area) }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Other Area (Acres):</strong> </div>
                                    <div class="col-md-6 value">{{ number_format($specialEconomicZone->other_area) }}</div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-10">
                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Latitude:</strong> </div>
                                    <div class="col-md-6 value">{{ $specialEconomicZone->latitude }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Longitude:</strong> </div>
                                    <div class="col-md-6 value">{{ $specialEconomicZone->longitude }}</div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-10">
                            <div class="col-md-6">
                                <div class="static-info row">
                                    <div class="col-md-6 name"> <strong>Status:</strong> </div>
                                    <div class="col-md-6 value">{{ $specialEconomicZone->status?'Active':'Inactive' }}</div>
                                </div>
                            </div>
                        </div>

                        </div>

                        <div class="card-footer">
                            <a href="{{ route('special-economic-zones.index') }}"  class="btn btn-secondary">Cancel</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
            <!--end::Container-->
    </div>
        <!--end::Entry-->

@endsection

