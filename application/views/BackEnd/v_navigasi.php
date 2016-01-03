<?php if($page != 'login'): ?>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>index.php/backend/home">Kreasi Multi Niaga</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="<?php $page == 'home' ? 'active' : "" ?>">
                        <a href="<?php echo base_url() ?>index.php/backend/home">Beranda</a>
                    </li>
                    <li class="<?php $page == 'project' ? 'active' : "" ?>">
                        <a href="<?php echo base_url() ?>index.php/backend/project">Proyek Kami</a>
                    </li>
                    <li class="<?php $page == 'process' ? 'active' : "" ?>">
                        <a href="<?php echo base_url() ?>index.php/backend/process">Proses Pengerjaan</a>
                    </li>
                    <li class="<?php $page == 'about_us' ? 'active' : "" ?>">
                        <a href="<?php echo base_url() ?>index.php/backend/about_us">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/backend/logout">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php endif; ?>