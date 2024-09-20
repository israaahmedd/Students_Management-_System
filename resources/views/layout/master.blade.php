@include ('layout.head')

<body>

  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    @include('layout.header')

    @include('layout.aside')
    @include('layout.wrapper')



    <!-- End Page wrapper -->
  </div>
  <!-- End Wrapper -->
    <!-- jQuery -->

  <!-- All Jquery -->
  <!-- ============================================================== -->
@include('layout.scripts')
@yield('script')

</body>

</html>