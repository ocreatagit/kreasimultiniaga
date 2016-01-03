<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ubah Password
                <small></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <?php if($alert != "" && $alert != "success" ): ?>
    <div class="alert-danger">
        <p style="padding: 10px;"><?php echo $alert ?></p>
    </div>
    <?php endif; ?>
    <?php if($alert == "success"): ?>
    <div class="alert-success">
        <p style="padding: 10px;">Password berhasil diubah</p>
    </div>
    <?php endif; ?>
    <form class="form-horizontal" action="<?php echo current_url() ?>" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Password Lama</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" required placeholder="password lama">
            </div>
        </div>     
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password Baru</label>
            <div class="col-sm-10">
                <input name="new1" type="password" id="pass" class="form-control" required placeholder="password baru">
            </div>
        </div>              
        <div class="form-group">
            <label class="col-sm-2 control-label">Ulangi Password Baru</label>
            <div class="col-sm-10">
                <input name="new2" type="password" id="pass1" class="form-control" required placeholder=" ulangi password lama">
            </div>
        </div>              
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="btn_simpan" class="btn btn-default" name="btn_simpan" value="btn_simpan">Simpan</button>
            </div>
        </div>
    </form>


</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/backend/js/jquery.js"></script>

<script>
    $('#btn_simpan').attr('disabled', 'disabled');
    $('#pass1').keyup(function () {
        if ($('#pass1').value == $('#pass').value) {
            $('#btn_simpan').removeAttr("disabled");
        } else {
            $('#btn_simpan').attr('disabled', 'disabled');
        }
    });
</script>