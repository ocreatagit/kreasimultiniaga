<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title ?></title>
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>css/logo-nav.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>css/new_css.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url() ?>font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="<?php echo base_url() ?>css/slippry.css" rel="stylesheet" />

        <link rel="stylesheet" href="<?php echo base_url() ?>horizontal-timeline-master/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="<?php echo base_url() ?>horizontal-timeline-master/css/style.css"> <!-- Resource style -->

        <link href="<?php echo base_url() ?>lightslider/css/lightslider.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>lightbox/css/lightbox.css" rel="stylesheet">

        <script src="<?php echo base_url() ?>horizontal-timeline-master/js/modernizr.js"></script> <!-- Modernizr -->
        <style>

            /* jssor slider bullet navigator skin 05 css */
            /*
            .jssorb05 div           (normal)
            .jssorb05 div:hover     (normal mouseover)
            .jssorb05 .av           (active)
            .jssorb05 .av:hover     (active mouseover)
            .jssorb05 .dn           (mousedown)
            */
            .jssorb05 {
                position: absolute;
            }
            .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                position: absolute;
                /* size of bullet elment */
                width: 16px;
                height: 16px;
                background: url('<?php echo base_url() ?>jssor/img/b05.png') no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb05 div { background-position: -7px -7px; }
            .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
            .jssorb05 .av { background-position: -67px -7px; }
            .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

            /* jssor slider arrow navigator skin 22 css */
            /*
            .jssora22l                  (normal)
            .jssora22r                  (normal)
            .jssora22l:hover            (normal mouseover)
            .jssora22r:hover            (normal mouseover)
            .jssora22l.jssora22ldn      (mousedown)
            .jssora22r.jssora22rdn      (mousedown)
            */
            .jssora22l, .jssora22r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 58px;
                cursor: pointer;
                background: url('<?php echo base_url() ?>jssor/img/a22.png') center center no-repeat;
                overflow: hidden;
            }
            .jssora22l { background-position: -10px -31px; }
            .jssora22r { background-position: -70px -31px; }
            .jssora22l:hover { background-position: -130px -31px; }
            .jssora22r:hover { background-position: -190px -31px; }
            .jssora22l.jssora22ldn { background-position: -250px -31px; }
            .jssora22r.jssora22rdn { background-position: -310px -31px; }
        </style>
    </head>
    <body>
        <div class="container-fluid" style="">
            <div class="row">
                <div class="col-lg-6">
                    <a class="" id="logo" href="#">
                        <img src="<?php echo base_url() ?>img/logo_fix.png" alt="" style="" width="350" height="65">
                    </a>                    
                </div>

            </div>
        </div>
        <nav class="navbar navbar-default" id="custom-bootstrap-menu" role="navigation" style="margin-bottom: 0px;">
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
                        <!--                        <li id="menu">
                                                    <a href="" style="background-color: white; color: black;"><i class="fa fa-list-alt"></i> Menu </a>
                                                </li> -->
                        <li <?php echo $navbar == 'beranda' ? "class='active'" : "" ?>><a href="<?php echo base_url() ?>index.php/Welcome">Beranda</a>
                        </li>
                        <li <?php echo $navbar == 'ourProject' ? "class='active'" : "" ?>><a href="<?php echo base_url() ?>index.php/Welcome/ourProject">Proyek Kami</a>
                        </li>
                        <li <?php echo $navbar == 'proses' ? "class='active'" : "" ?>><a href="<?php echo base_url() ?>index.php/Welcome/proses">Proses Pengerjaan</a>
                        </li>
                        <li <?php echo $navbar == 'kontakkami' ? "class='active'" : "" ?>><a href="<?php echo base_url() ?>index.php/Welcome/kontakKami">Tentang Kami</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!--                        <li id="follow">
                                                    <a href="" style="background-color: white; color: black;"><i class=""></i> Follow us on</a>
                                                </li> -->
                        <li>
                            <a href=""><span id="facebook"> <i class="fa fa-facebook-official"></i> 
                                Facebook</span>
                            </a>
                        </li>                        
                        <li>
                            <a href="">
                                <span id="twitter">
                                <i class="fa fa-twitter-square"></i> 
                                Twitter</span>
                            </a>
                        </li>
                        <li>
                            <a href=""><span id="email"><i class="fa fa-envelope-square"></i> 
                                Email</span>
                            </a>
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