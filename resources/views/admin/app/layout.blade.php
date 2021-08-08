@include('admin.partial.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    @include('admin.partial.preloader')

    <!-- Navbar -->
   @include('admin.partial.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   @include('admin.partial.mainsidebar')
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    @include('admin.partial.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('admin.partial.script')
</body>
</html>
