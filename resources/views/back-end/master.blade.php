<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lara E-Commerce Admin</title>
 <!-- DataTables CSS -->
    <link href="{{asset('/')}}back-end/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('/')}}back-end/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/')}}back-end/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('/')}}back-end/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('/')}}back-end/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('/')}}back-end/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('/')}}back-end/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('/')}}back-end/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
   {{-- ckeditor --}}
    <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
    {{--  <link rel="stylesheet" href="{{asset('/')}}back-end/ckeditor/samples/css/samples.css">  --}}

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
       @include('back-end.includes.nav')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       @yield('content')
                        {{-- <h1 class="page-header">Blank</h1> --}}


                       
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('/')}}back-end/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('/')}}back-end/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('/')}}back-end/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('/')}}back-end/dist/js/sb-admin-2.js"></script>
    <!-- ckeditor JavaScript -->
    <script src="{{asset('/')}}back-end/ckeditor/ckeditor.js"></script>
	<script src="{{asset('/')}}back-end/ckeditor/samples/js/sample.js"></script>
    <!--Data Table-->
     <script src="{{asset('/')}}back-end/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}back-end/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
     <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <script>
        initSample();
    </script>

</body>

</html>
