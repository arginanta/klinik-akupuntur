<!-- /.content-wrapper -->
<!-- <footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer> -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<script src="assets-tamplate/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets-tamplate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets-tamplate/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets-tamplate/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets-tamplate/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets-tamplate/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets-tamplate/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets-tamplate/plugins/moment/moment.min.js"></script>
<script src="assets-tamplate/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets-tamplate/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets-tamplate/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets-tamplate/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets-tamplate/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets-tamplate/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets-tamplate/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets-tamplate/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets-tamplate/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets-tamplate/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets-tamplate/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets-tamplate/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- load ckeditor cdn -->
<script src="https://cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script>
<!-- load fontawesome with cdn -->
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

<script>
  CKEDITOR.replace('alamat', {
    filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    height: '400px'
  });
</script>
<script>
  CKEDITOR.replace('diagnosa', {
    uiColor: '#dad2e2'
  });
</script>

<script>
  $(document).ready(function() {
    $('#table-data').DataTable();
  });
</script>

<script type="text/javascript">
  $("#biaya_pokok").keyup(function() {
    var a = parseInt($("#biaya_pokok").val());
    var b = parseInt($("#biaya_layanan").val());
    var c = b - c;
    $("#total").val(c);
  });

  $("#biaya_layanan").keyup(function() {
    var a = parseInt($("#biaya_pokok").val());
    var b = parseInt($("#biaya_layanan").val());
    var c = b - a;
    $("#total").val(c);
  });
</script>
</body>

</html>