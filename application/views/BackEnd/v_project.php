<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Proyek Kami
                <small></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <form action="<?php echo base_url(); ?>/index.php/backend/upload_project" class="dropzone"  >
    </form>
    <hr>
    <form class="form-horizontal" action="<?php echo current_url() ?>" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Tipe Bangunan</label>
            <div class="col-sm-3">
                <select name="type" class="form-control">
                    <option value="Ruko">Ruko</option>
                    <option value="Gudang">Gudang</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Bangunan</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" required placeholder="nama bangunan">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" required rows="3"></textarea>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="btn_simpan" value="btn_simpan">Simpan</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table" id="datatable">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Tipe Bangunan</th>
                <th>Nama Bangunan</th>
                <th class="col-md-6">Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?php echo date( 'd-m-Y', strtotime( $project->tanggal)) ?></td>
                <td><?php echo $project->tipe ?></td>
                <td><?php echo $project->judul ?> </td>
                <td><?php echo substr($project->deskripsi,0,200)."..." ?> </td>                
                <td>
                    <a href="<?php echo base_url() ?>index.php/backend/edit_project/<?php echo $project->IDProjek ?>" class="btn btn-success">Edit</a>
                    <a href="<?php echo base_url() ?>index.php/backend/edit_project/<?php echo $project->IDProjek ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Footer -->
<!--    <footer>
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
<link href="<?php echo base_url(); ?>/backend/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>/backend/js/dropzone.js"></script>
<script src="<?php echo base_url(); ?>/backend/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>

</body>

</html>