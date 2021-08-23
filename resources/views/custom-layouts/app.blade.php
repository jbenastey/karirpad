<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Karirpad</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{asset('assets/assets/images/favicon.ico')}}">

    <!-- DataTables -->
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/assets/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    @include('custom-layouts.header')
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('custom-layouts.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">

                        <div class="col-sm-6">
                            <h4 class="page-title">@yield('header')</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                @yield('content')
                <!-- end row -->
            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->

        @include('custom-layouts.footer')
    </div>

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- jQuery  -->
<script src="{{asset('assets/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/assets/js/waves.min.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

<!--Chartist Chart-->

<!-- peity JS -->
<script src="{{asset('assets/plugins/peity-chart/jquery.peity.min.js')}}"></script>


<!-- Datatable init js -->
<script src="{{asset('assets/assets/pages/datatables.init.js')}}"></script>

<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/assets/pages/lightbox.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/assets/js/app.js')}}"></script>
<script src="{{asset('assets/assets/js/custom.js')}}"></script>

@include('sweetalert::alert')

</body>

</html>
