<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tentang Kami
                <small></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">Jabatan</label>
            <div class="col-sm-10">
                <input name="jabatan" type="text" class="form-control" value="<?php echo count($about_us) > 0 ? $about_us[0]->jabatan : "" ?>" placeholder="jabatan">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">NO. HP</label>
            <div class="col-sm-10">
                <input name="noHp" type="text" class="form-control" value="<?php echo count($about_us) > 0 ? $about_us[0]->phone : "" ?>" placeholder="081000000000">
            </div>
        </div>       
        <div class="form-group">
            <label class="col-sm-2 control-label">Office</label>
            <div class="col-sm-10">
                <textarea name="office" class="form-control" rows="3"><?php echo count($about_us) > 0 ? $about_us[0]->office : "" ?></textarea>
            </div>
        </div>       
        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="email" class="form-control" value="<?php echo count($about_us) > 0 ? $about_us[0]->email : "" ?>" placeholder="kreasimultiniaga@gmail.com">
            </div>
        </div>       
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="btn_simpan" value="btn_simpan">Simpan</button>
            </div>
        </div>
    </form>

<!--     Footer 
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
         /.row 
    </footer>-->

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/backend/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>/backend/js/bootstrap.min.js"></script>

<link href="<?php echo base_url(); ?>/backend/css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>/backend/js/dropzone.js"></script>

</body>

</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

