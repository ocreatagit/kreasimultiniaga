<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url() ?>images/favicon.ico">
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
        
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>flatimeline/css/jquery.flatimeline.css" />

        <!--<script src="<?php echo base_url() ?>horizontal-timeline-master/js/modernizr.js"></script>  Modernizr -->
        <style>

            body {
                font-family: "Myriad Pro", Myriad, "Liberation Sans", "Nimbus Sans L", "Helvetica Neue", Helvetica, Arial, sans-serif;
            }

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
        <!--<img src="<?php echo base_url() ?>images/new_1.png" style="position: fixed;"/>-->
        <div class="container">
            <div class="navbar transparent" style="margin-bottom: 1%; border-bottom: #F1592A solid 4px;">
                <nav class="navbar-inner">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a href="" style="position: absolute;" id="logo-nav">
                            <img src="<?php echo base_url() ?>images/logo.png" style=""/>
                        </a>
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed siku" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background: white; border: #F1592A solid 1px;">
                                <big><i class="glyphicon glyphicon-list"></i></big>
                            </button>
                            <a class="navbar-brand brand-class" href="#" id="brand_new" style=''> Kreasi Multi Niaga</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse margin_resize" id="bs-example-navbar-collapse-1" style="">
                            <ul class="nav navbar-nav" style="" id="navbar_content">
                                <li class="<?php echo $navbar == 'beranda' ? "active" : "" ?> half-a-border-on-right" style="vertical-align: bottom; height: 100%;"><a href="<?php echo base_url() ?>index.php/Welcome">Beranda</a>
                                </li>
                                <li class="<?php echo $navbar == 'ourProject' ? "active" : "" ?> half-a-border-on-right"><a href="<?php echo base_url() ?>index.php/Welcome/ourProject">Proyek Kami</a>
                                </li>
                                <li class="<?php echo $navbar == 'proses' ? "active" : "" ?> half-a-border-on-right"><a href="<?php echo base_url() ?>index.php/Welcome/proses">Proses Pengerjaan</a>
                                </li>
                                <li id="nav_last" class="<?php echo $navbar == 'kontakkami' ? "active" : "" ?>"><a href="<?php echo base_url() ?>index.php/Welcome/kontakKami">Tentang Kami</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <h2 id="img_right"><font style="font-size: 1.7em; color: #F1592A;">KREASI MULTI NIAGA</font><br>
                                    <span style="margin-left: 20%;">Kontraktor Bangunan</span>
                                </h2>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>