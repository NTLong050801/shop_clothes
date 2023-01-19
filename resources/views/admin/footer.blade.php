
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/template/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
{{--<script src="/template/admin/dist/js/adminlte.js"></script>--}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="/template/admin/main.js"></script>

@yield('footer')
