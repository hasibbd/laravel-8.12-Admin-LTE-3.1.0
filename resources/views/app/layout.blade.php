@include('partial.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    @include('partial.preloader')

    <!-- Navbar -->
   @include('partial.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   @include('partial.mainsidebar')
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    @include('partial.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('partial.script')
</body>
</html>
