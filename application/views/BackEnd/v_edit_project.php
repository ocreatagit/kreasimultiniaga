<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Beranda
                <small>Slider</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <form action="<?php echo base_url(); ?>/index.php/backend/upload_project/<?php echo $IDProject ?>" class="dropzone"  >
    </form>
    <div class="col-sm-offset-11">
        <button onclick="document.location.reload(true)" class="btn btn-success" >Refresh</button>
    </div>
    <hr>
    <form class="form-horizontal" action="<?php echo current_url() ?>" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Tipe Bangunan</label>
            <div class="col-sm-3">
                <select name="type" class="form-control">
                    <option value="Ruko" <?php echo ($projects->tipe == 'Ruko' ? 'selected' : '') ?>>Ruko</option>
                    <option value="Gudang" <?php echo ($projects->tipe == 'Gudang' ? 'selected' : '') ?>>Gudang</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Bangunan</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" value="<?php echo $projects->judul ?>" required placeholder="nama bangunan">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" required rows="3"><?php echo $projects->deskripsi ?></textarea>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="btn_simpan" value="btn_simpan">Simpan</button>
            </div>
        </div>
    </form>
    <hr>

    <hr>
    <?php if (count($gambars) == 0): ?>
        <p class="text-center">Tidak Ada Gambar</p>
        <?php
    endif;
    $count = 1;
    foreach ($gambars as $gambar):
        if ($count % 4 == 1):
            ?>    
            <div class="row">
            <?php endif; ?>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url() . 'uploads/' . $gambar->path ?>" alt="">
                </a>
                <a href="<?php echo base_url() ?>index.php/backend/delete_image_project/<?php echo $gambar->IDGambar ?>/<?php echo $IDProject ?>" class="btn btn-sm btn-danger" style="position: absolute; top: 5px; right: 20px;">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </div>
            <?php if ($count % 4 == 0 || count($gambars) == $count): ?>
            </div>
            <?php
        endif;
        $count++;
    endforeach;
    ?>    

   
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/backend/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>/backend/js/bootstrap.min.js"></script>

<link href="<?php echo base_url(); ?>/backend/css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>/backend/js/dropzone.js"></script>

</body>

</html>