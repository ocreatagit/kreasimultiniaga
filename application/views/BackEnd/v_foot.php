<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p class="text-center">Copyright &copy; MyOcreata 2015</p>
        </div>
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/backend/js/jquery.js"></script>

<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>datatable/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>/backend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>jquery-ui/jquery-ui.js"></script>

<link href="<?php echo base_url(); ?>/backend/css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>/backend/js/dropzone.js"></script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
    
    $("#tanggal").datepicker({
        inline: true,
        dateFormat: "dd-mm-yy"
    });
    
    $("#datepicker1").datepicker({
        inline: true,
        dateFormat: "dd-mm-yy",
        changeYear: true,
        changeMonth: true
    });
    $("#datepicker2").datepicker({
        inline: true,
        dateFormat: "dd-mm-yy",
        changeYear: true,
        changeMonth: true
    });
</script>

</body>
</html>