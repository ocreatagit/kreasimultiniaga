<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>css/logo-nav.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>css/new_css.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url() ?>font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="<?php echo base_url() ?>css/slippry.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="<?php echo base_url() ?>horizontal-timeline-master/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo base_url() ?>horizontal-timeline-master/css/style.css"> <!-- Resource style -->
	<script src="<?php echo base_url() ?>horizontal-timeline-master/js/modernizr.js"></script> <!-- Modernizr -->
    </head>
    <body>
        <div class="container-fluid" style="">
            <div class="row">
                <div class="col-lg-6">
                    <a class="" id="logo" href="#">
                        <img src="<?php echo base_url() ?>img/logo_fix.png" alt="" style="">
                    </a>                    
                </div>

            </div>
        </div>
        <nav class="navbar navbar-default" id="custom-bootstrap-menu" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="#">Brand</a>-->
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li id="menu">
                            <a href="" style="background-color: white; color: black;"><i class="fa fa-list-alt"></i> Menu </a>
                        </li> 
                        <li <?php echo $navbar == 'beranda' ? "class='active'": "" ?>><a href="<?php echo base_url() ?>index.php/Welcome">Beranda</a>
                        </li>
                        <li <?php echo $navbar == 'ourProject' ? "class='active'": "" ?>><a href="<?php echo base_url() ?>index.php/Welcome/ourProject">Proyek Kami</a>
                        </li>
                        <li <?php echo $navbar == 'tentang' ? "class='active'": "" ?>><a href="/contact">Tentang Kami</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li id="follow">
                            <a href="" style="background-color: white; color: black;"><i class=""></i> Follow us on</a>
                        </li> 
                        <li>
                            <a href=""><i class="fa fa-facebook-official"></i> <span id="facebook">Facebook</span></a>
                        </li>                        
                        <li>
                            <a href=""><i class="fa fa-twitter-square"></i> <span id="twitter">Twitter</span></a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-envelope-square"></i> <span id="email">Email</span></a>
                        </li>
                    </ul>
                    <!--<div id="sosmed" class="col-lg-6 text-right" style="margin-top: 2.5%">-->                        
<!--                        <a href=""><i class="fa fa-twitter-square fa-4x"></i></a>
                        <a href=""><i class="fa fa-envelope-square fa-4x"></i></a>
                        <a href=""><i class="fa fa-linkedin-square fa-4x"></i></a>-->
                    <!--</div>-->
                </div>
            </div>
        </nav>
        <!--        <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Brand</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="" style="">
                                    <a href="#" style="">HOME</a>
                                </li>
                                <li>
                                    <a href="#">OUR PROJECT</a>
                                </li>
                                <li>
                                    <a href="#">CONTACT US</a>
                                </li>
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Action</a></li>
                                                                <li><a href="#">Another action</a></li>
                                                                <li><a href="#">Something else here</a></li>
                                                                <li role="separator" class="divider"></li>
                                                                <li><a href="#">Separated link</a></li>
                                                            </ul>
                                                        </li>
                            </ul>
                        </div> /.navbar-collapse 
                    </div> /.container-fluid 
                </nav>-->