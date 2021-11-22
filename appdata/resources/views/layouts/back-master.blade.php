<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/back-assets/assets/images/favicon.png')}}">
    <title>Classifia Admin || @yield('title')</title>
    <link href="{{asset('assets/back-assets/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/back-assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="{{asset('assets/back-assets/assets/libs/morris.js/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/back-assets/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/back-assets/assets/libs/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/back-assets/assets/extra-libs/calendar/calendar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/back-assets/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/back-assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/back-assets/assets/libs/summernote/dist/summernote-bs4.css')}}">
    <link href="{{asset('assets/back-assets/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/back-assets/assets/libs/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('assets/back-assets/assets/libs/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/back-assets/assets/libs/select2/dist/css/select2.min.css')}}">
    <link href="{{asset('assets/back-assets/assets/libs/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- custom css-->
    <!-- cropper  -->
    <link href="{{asset('assets/back-assets/css/cropper.css')}}" rel="stylesheet">
    <link href="{{asset('assets/back-assets/css/custom.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('style')
</head>
<body>
    <?php  ?>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('layouts.inc.admin-header')
        @include('layouts.inc.admin-sidebar')
        <div class="page-wrapper">
            @yield('contents')

            <footer class="footer text-center"> 
                All Rights Reserved 
                <a href="">##</a>
            </footer>

        </div>
    </div>
    @include('layouts.inc.admin-right-sidebar')
    <div class="chat-windows"></div>
    <script src="{{asset('assets/back-assets/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/app.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/app.init.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/waves.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <!-- <script src="{{asset('assets/back-assets/dist/js/pages/chartist/chartist-plugin-tooltip.js')}}"></script> -->
    <script src="{{asset('assets/back-assets/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/morris.js/morris.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/pages/dashboards/dashboard1.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/pages/calendar/cal-init.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/toastr/build/toastr.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/extra-libs/toastr/toastr-init.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/magnific-popup/meg.init.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/dist/js/pages/forms/select2/select2.init.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/extra-libs/jquery.repeater/repeater-init.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/extra-libs/jquery.repeater/dff.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/extra-libs/jqbootstrapvalidation/validation.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/back-assets/assets/libs/sweetalert2/sweet-alert.init.js')}}"></script>
    <script src="{{asset('assets/back-assets/js/cropper.js')}}"></script>
    <script src="{{asset('assets/back-assets/js/custom.js')}}"></script>
    @yield('script')
    </html>