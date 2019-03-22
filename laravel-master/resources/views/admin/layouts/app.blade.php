<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ URL::asset('css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Data Tables CSS -->
    <link href="{{ URL::asset('css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('css/dataTables/dataTables.responsive.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/startmin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Theme CSS -->
    <link href="{{ URL::asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Social CSS -->
    <link href="{{ URL::asset('css/bootstrap-social.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ URL::asset('css/timeline.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('css/morris.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Header -->
        @include('admin.includes.header')
        <!-- Sidebar -->
        @include('admin.includes.sidebar')
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page-title')</h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            @yield('main-content')

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ URL::asset('js/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->



<!-- Data Tables JavaScript -->
<script src="{{ URL::asset('js/dataTables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables/jquery.dataTables.min.js') }}"></script>

<script src="{{ URL::asset('js/startmin.js') }}"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

<!-- flot data JavaScript -->
<script src="{{ URL::asset('js/flot-data.js') }}"></script>

<!-- Morris JavaScript -->
<script src="{{ URL::asset('js/morris.min.js') }}"></script>

<!-- Morris Data JavaScript -->
<script src="{{ URL::asset('js/morris-data.js') }}"></script>

<!-- Raphael JavaScript -->
<script src="{{ URL::asset('js/raphael.min.js') }}"></script>

</body>
</html>
