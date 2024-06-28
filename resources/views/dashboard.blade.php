@extends('layouts.main')
@push('title', 'Dashboard')

@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12 col-xxl-12">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                        <!--begin::Header-->

                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body position-relative overflow-hidden" style="min-height: 350px">

                            <!--begin::Row-->
                            <div class="row g-5 g-xl-8">
                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a href="#" class="card hoverable card-xl-stretch mb-xl-8"
                                       style="background-color: rgb(220, 118, 51) !important;">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                            <span class="svg text-white svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="currentColor"/>
<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="currentColor"/>
</svg>
												</span>
                                            <!--end::Svg Icon-->
                                            <div
                                                class="text-white fw-bolder font-size-h2 mb-2 mt-5">{{ number_format(7) }}</div>
                                            <div class="fw-bold text-white font-size-h2">Estates</div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a href="#" class="card hoverable card-xl-stretch mb-xl-8"
                                       style="background-color: rgb(128, 0, 128) !important;">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                            <span class="svg text-white svg-icon svg-icon-white svg-icon-3x ms-n1">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
<path opacity="0.3"
      d="M21 2H13C12.4 2 12 2.4 12 3V13C12 13.6 12.4 14 13 14H21C21.6 14 22 13.6 22 13V3C22 2.4 21.6 2 21 2ZM15.7 8L14 10.1V5.80005L15.7 8ZM15.1 4H18.9L17 6.40002L15.1 4ZM17 9.59998L18.9 12H15.1L17 9.59998ZM18.3 8L20 5.90002V10.2L18.3 8ZM9 2H3C2.4 2 2 2.4 2 3V21C2 21.6 2.4 22 3 22H9C9.6 22 10 21.6 10 21V3C10 2.4 9.6 2 9 2ZM4.89999 12L4 14.8V9.09998L4.89999 12ZM4.39999 4H7.60001L6 8.80005L4.39999 4ZM6 15.2L7.60001 20H4.39999L6 15.2ZM7.10001 12L8 9.19995V14.9L7.10001 12Z"
      fill="currentColor"/>
<path
    d="M21 18H13C12.4 18 12 17.6 12 17C12 16.4 12.4 16 13 16H21C21.6 16 22 16.4 22 17C22 17.6 21.6 18 21 18ZM19 21C19 20.4 18.6 20 18 20H13C12.4 20 12 20.4 12 21C12 21.6 12.4 22 13 22H18C18.6 22 19 21.6 19 21Z"
    fill="currentColor"/>
</svg>
												</span>
                                            <!--end::Svg Icon-->
                                            <div
                                                class="text-white fw-bolder font-size-h2  mb-2 mt-5">{{ number_format(2375) }}</div>
                                            <div class="fw-bold text-white font-size-h2">Plots</div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a href="#" class="card hoverable card-xl-stretch mb-5 mb-xl-8"
                                       style="background-color: rgb(23, 193, 45) !important;">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                            <span class="svg text-white svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="currentColor"/>
<path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="currentColor"/>
</svg>
												</span>
                                            <!--end::Svg Icon-->
                                            <div
                                                class="text-white fw-bolder font-size-h2 mb-2 mt-5">{{ number_format(1209) }}</div>
                                            <div class="fw-bold text-white font-size-h2">Allotted</div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-5 g-xl-8">
                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                            <span class="svg text-white svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M4 6C5.10457 6 6 5.10457 6 4C6 2.89543 5.10457 2 4 2C2.89543 2 2 2.89543 2 4C2 5.10457 2.89543 6 4 6Z" fill="currentColor"/>
<path opacity="0.3" d="M14 12C14 13.1 13.1 14 12 14C10.9 14 10 13.1 10 12C10 10.9 10.9 10 12 10C13.1 10 14 10.9 14 12ZM4 10C2.9 10 2 10.9 2 12C2 13.1 2.9 14 4 14C5.1 14 6 13.1 6 12C6 10.9 5.1 10 4 10ZM20 10C18.9 10 18 10.9 18 12C18 13.1 18.9 14 20 14C21.1 14 22 13.1 22 12C22 10.9 21.1 10 20 10ZM12 2C10.9 2 10 2.9 10 4C10 5.1 10.9 6 12 6C13.1 6 14 5.1 14 4C14 2.9 13.1 2 12 2ZM20 2C18.9 2 18 2.9 18 4C18 5.1 18.9 6 20 6C21.1 6 22 5.1 22 4C22 2.9 21.1 2 20 2ZM12 18C10.9 18 10 18.9 10 20C10 21.1 10.9 22 12 22C13.1 22 14 21.1 14 20C14 18.9 13.1 18 12 18ZM4 18C2.9 18 2 18.9 2 20C2 21.1 2.9 22 4 22C5.1 22 6 21.1 6 20C6 18.9 5.1 18 4 18ZM20 18C18.9 18 18 18.9 18 20C18 21.1 18.9 22 20 22C21.1 22 22 21.1 22 20C22 18.9 21.1 18 20 18Z" fill="currentColor"/>
</svg>
												</span>
                                            <!--end::Svg Icon-->
                                            <div
                                                class="text-white fw-bolder font-size-h2 mb-2 mt-5">{{ number_format(903) }}</div>
                                            <div class="fw-bold text-white font-size-h2">Available</div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                            <span class="svg text-white svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<path opacity="0.3"
                                                              d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                                              fill="currentColor"/>
														<path
                                                            d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                                            fill="currentColor"/>
														<path
                                                            d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                                            fill="currentColor"/>
													</svg>
												</span>
                                            <!--end::Svg Icon-->
                                            <div
                                                class="text-white fw-bolder font-size-h2 mb-2 mt-5">{{ number_format(411) }}</div>
                                            <div class="fw-bold text-white font-size-h2">In Production</div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                                <div class="col-xl-4">
                                    <!--begin::Statistics Widget 5-->
                                    <a href="#" class="card hoverable card-xl-stretch mb-5 mb-xl-8"
                                       style="background-color: rgb(255, 199, 42) !important;">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                            <span class="svg text-white svg-icon svg-icon-white svg-icon-3x ms-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"/>
<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"/>
</svg>
											</span>
                                            <!--end::Svg Icon-->
                                            <div
                                                class="text-white fw-bolder font-size-h2 mb-2 mt-5">{{ number_format(372) }}</div>
                                            <div class="fw-bold text-white font-size-h2">Under Construction</div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>
                            </div>
                            <!--end::Row-->

                            <div style="min-width: 310px; min-height: 400px; margin: 0 auto; margin-top: 30px;" id="bar_graph_1" class="flot-chart"></div>
                            <div style="min-width: 310px; min-height: 400px; margin: 0 auto; margin-top: 30px;" id="bar_graph_2" class="flot-chart"></div>


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
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
    <script src="{{asset('assets/js/highchart/highcharts.js')}}"></script>
    <script src="{{asset('assets/js/highchart/exporting.js')}}"></script>


    <script>
        Highcharts.setOptions({
            lang: {
                thousandsSep: ','
            }
        });
        const buildHighCharts = (chart_id, categories, series, colors = null,title=null) => {
            return Highcharts.chart(chart_id, {
                chart: {
                    type: 'column',
                    style: {
                        color: "#000"
                    },
                    height: '400px'
                },
                title: {
                    text: title
                },
                credits: {
                    enabled: false
                },
                xAxis: {

                    categories: categories,
                    labels: {
                        //useHTML: true,
                        formatter: function () {
                            return this.value.name;
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    tickInterval: 100,
                    title: {
                        text: ''
                    },
                    labels: {
                        style: {
                            color: '#000'
                        }

                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: ( // theme
                                Highcharts.defaultOptions.title.style &&
                                Highcharts.defaultOptions.title.style.color
                            ) || 'gray'
                        }
                    }
                },
                legend: {
                    align: 'right',
                    x: 0,
                    verticalAlign: 'top',
                    y: 20,
                    floating: true,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || 'white',
                    shadow: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key.name}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function () {
                                    location.href = this.options.url;
                                }
                            }
                        },
                    },
                    column: {
                        dataLabels: {
                            formatter: function() {
                                if (this.y > 0) {
                                    return this.y;
                                }
                            },
                            enabled: false
                        }
                    }
                },
                colors: colors,
                series:series

            });
        }

        const barchart1 = buildHighCharts('bar_graph_1', <?php echo isset($bar_graph1['users'])?json_encode($bar_graph1['users']):'[]';?>, <?php echo isset($bar_graph1['series'])?json_encode($bar_graph1['series']):'[]';?>, ['#037FFF','#FFC72A', '#17C12D']);
        const barchart2 = buildHighCharts('bar_graph_2', <?php echo isset($bar_graph2['users'])?json_encode($bar_graph2['users']):'[]';?>, <?php echo isset($bar_graph2['series'])?json_encode($bar_graph2['series']):'[]';?>, ['#037FFF','#FFC72A']);
    </script>
@endpush


