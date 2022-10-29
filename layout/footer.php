  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- asser plugin datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

  <!-- load fontawesome with cdn -->
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

  <script src="https://cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script>

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