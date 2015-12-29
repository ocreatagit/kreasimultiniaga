<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Proses Pengerjaan
                <small></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <form class="form-horizontal" action="<?php echo current_url() ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">Gambar</label>
            <div class="col-sm-10">
                <input name="gambar" class="form-control" type='file' id="imgInp" />
                <br>
                <img src="#" height="75" id="blah" class="img-responsive" alt="your image">
            </div>            
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Judul</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" required value="<?php echo $process->judul ?>" placeholder="nama bangunan">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" required rows="3"><?php echo $process->deskripsi ?></textarea>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="btn_simpan" value="btn_simpan">Simpan</button>
            </div>
        </div>
    </form>
    <div>
        <?php
        $image_properties = array(
            'src' => 'uploads/' . $process->path,
            'alt' => '',
            'class' => 'post_images col-sm-offset-2',
            'height' => '150',
            'title' => 'That was quite a night',
            'rel' => 'lightbox',
        );
        echo img($image_properties);
        ?>
    </div>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/backend/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>/backend/js/bootstrap.min.js"></script>
<link href="<?php echo base_url(); ?>/backend/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>/backend/css/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>/backend/js/dropzone.js"></script>
<script src="<?php echo base_url(); ?>/backend/js/jquery.dataTables.min.js"></script>

<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#blah').hide();
//    $("#imgInp").change(function () {
//        readURL(this);
//        $('#blah').show();
//    });
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>

</body>

</html>
