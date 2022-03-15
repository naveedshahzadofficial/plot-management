<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@stack('title','Dashboard') - @stack('app-name',config('app.name', 'Plot Management System'))</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />


     @stack('pre-styles')
     @section('styles')
     <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('assets/css/themes/layout/header/base/light.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/header/menu/light.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/brand/dark.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/aside/dark.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/custom/datetimepicker/jquery.datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
		<script src="{{ asset('assets/js/sfs_functions.js')}}"></script>
    @show
      @stack('post-styles')

      <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico')}}" />


</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <div id="app wrapper" >

	@section('header-mobile')
    @include('layouts.partials._header-mobile')
@show

        <div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				@section('aside')
                @include('layouts.partials._aside')
            @show
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
                    @section('header')

                    @include('layouts.partials._header')
                @show
					<!--end::Header-->
					<!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    @include('layouts.partials._subheader')

                    {{ $slot??'' }}
                        @yield('content')
                    </div>
					<!--end::Content-->
					<!--begin::Footer-->
                    @section('footer')
                        @include('layouts.partials._footer')
                    @show
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>

		<form id='form' method='POST' action='' accept-charset='UTF-8' style='display:inline'>
		@csrf
        <input name='_method' type='hidden' value='DELETE'>
		</form>


        @stack('pre-scripts')
        @section('scripts')
        <script type="application/javascript">

        var HOST_URL = "https://keenthemes.com/metronic/tools/preview";
        </script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->


	  <script src="{{ asset('assets/plugins/global/plugins.bundle.js?v=7.0.5')}}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js?v=7.0.5')}}"></script>

		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.5')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('assets/js/pages/widgets.js?v=7.0.5')}}"></script>
		<!-- <script src="{{ asset('assets/js/pages/crud/ktdatatable/base/talble-advance.js?v=7.0.5')}}"></script> -->
		<!-- <script src="{{ asset('assets/js/table-advanced.js') }}"></script> -->
		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.validate.min.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
        <script src="{{ asset('assets/plugins/custom/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/lodash/lodash.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        </script>
       <script>
                $(function (){
                    $('.select2').select2();
                    $(".money_format").inputmask("currency",{
                        radixPoint:".",
                        groupSeparator: ",",
                        allowMinus: false,
                        prefix: '',
                        digits: 2,
                        digitsOptional: true,
                        rightAlign: false,
                        unmaskAsNumber: true,
                        removeMaskOnSubmit:true,
                        autoUnmask:false,
                        greedy:true,
                        insertMode:true,
                        clearIncomplete:false,
                        clearMaskOnLostFocus:true,
                        placeholder: ''
                    });
                    $('.datepicker').datetimepicker({
                        timepicker:false,
                        format:'d-m-Y',
                        formatDate:'d-m-Y',
                        scrollInput : false
                    });
                });
       </script>

		@show
        <!--begin::Global Theme Bundle(used by all pages)-->
	     @stack('post-scripts')
        <script>
            function reDrawDataTable() {
                myDataTable.draw()
            }
        </script>
    </div>
</body>
</html>
