<!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Unggah Gambar
                <!--<small>Secondary Text</small>-->
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <form action="<?php echo base_url(); ?>/index.php/backend/upload" class="dropzone"  >
    </form>
    <br>
    <div class="col-sm-offset-11">
        <button onclick="document.location.reload(true)" class="btn btn-success siku" >Refresh</button>
    </div>
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
                <a href="<?php echo base_url() ?>index.php/backend/delete_slider/<?php echo $gambar->IDFoto ?>" class="btn btn-sm btn-danger" style="position: absolute; top: 5px; right: 20px;">
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

    <hr>

    <!--     Pagination 
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
         /.row -->

    <hr>
<!-- /.container -->