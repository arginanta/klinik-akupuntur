<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>


<!-- asser plugin datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
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