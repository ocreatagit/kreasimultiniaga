<!--<div class="container demo-2">
    <div id="slider" class="sl-slider-wrapper">
        <div class="sl-slider">
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-1"></div>
                    <h2>Tajima Taek</h2>
                    <blockquote><p>You have just dined, and however scrupulously the slaughterhouse is concealed in the graceful distance of miles, there is complicity.</p><cite>Ralph Waldo Emerson</cite></blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-2"></div>
                    <h2>Ali Tole.</h2>
                    <blockquote><p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p><cite>Albert Schweitzer</cite></blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-3"></div>
                    <h2>Willy Bangke</h2>
                    <blockquote><p>Thousands of people who say they 'love' animals sit down once or twice a day to enjoy the flesh of creatures who have been utterly deprived of everything that could make their lives worth living and who endured the awful suffering and the terror of the abattoirs.</p><cite>Dame Jane Morris Goodall</cite></blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-4"></div>
                    <h2>Ronald.</h2>
                    <blockquote><p>The human body has no more need for cows' milk than it does for dogs' milk, horses' milk, or giraffes' milk.</p><cite>Michael Klaper M.D.</cite></blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-5"></div>
                    <h2>Daniel TOle 2.</h2>
                    <blockquote><p>I think if you want to eat more meat you should kill it yourself and eat it raw so that you are not blinded by the hypocrisy of having it processed for you.</p><cite>Margi Clarke</cite></blockquote>
                </div>
            </div>
        </div> /sl-slider 

        <nav id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </nav>

    </div> /slider-wrapper 

    <nav id="nav-arrows" class="nav-arrows">
        <span class="nav-arrow-prev">Previous</span>
        <span class="nav-arrow-next">Next</span>
    </nav>
</div>-->
<!--
<div id="innerHome" class="container" style="">
    <ul id="slippry">
<?php /*
  $count = 1;
  foreach ($image_slider as $image) {
  ?>
  <li>
  <a href="#slide<?php echo $count ?>"><img src="<?php echo base_url() ?>uploads/<?php echo $image->path ?>" ></a>
  </li>
  <?php
  $count++;
  } */ ?>
    </ul>
</div>

-->
<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 700px; overflow: hidden; visibility: hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('<?php echo base_url() ?>jssor/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 700px; overflow: hidden;">
        <?php
        $count = 1;
        foreach ($image_slider as $image) {
            ?>
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="<?php echo base_url() ?>uploads/<?php echo $image->path ?>" style="height: 100%; width: 100%;"/>
            </div>
            <?php
            $count++;
        }
        ?>
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
        <!-- bullet navigator item prototype -->
        <div data-u="prototype" style="width:16px;height:16px;"></div>
    </div>
    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
    <a href="http://www.jssor.com" style="display:none">Bootstrap Carousel</a>
</div>
<div id="tentangKami" style="background-color: #EAF2F5; padding: 2%;">
    <div class="row">
        <div class="col-lg-6" style="margin-bottom: 3%;" id="about">
<!--            <h1 style="border-bottom: black solid 1px; padding-bottom: 1%;">KREASI MULTI NIAGA</h1>  
            <h3 style="margin-top: 1%; color: orangered;">Kontraktor Bangunan</h3><br>-->
            <h2 style="margin-bottom: 1%;">John Sulayman</h2>
            <h4 style="color: orangered; ">Marketing Manager - 087860383940</h4><br>

            <h2>OFFICE :</h2>
            <h3 style="color: orangered; margin-top: 1%;">Alamat : Manyar Kertoadi XII / W 258<br>Surabaya-Indonesia<br>Telp : (031)5961872</h3><br>
            <h2>Email :</h2>
            <h3 style="color: orangered; margin-top: 1%;">kreasimultiniaga@gmail.com</h3>
        </div>
        <div class="col-lg-6 text-center google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5958959606814!2d112.78186351437122!3d-7.286733673639072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa40f087cdb1%3A0xdf99b5f3b4dc89be!2sJl.+Manyar+Kertoadi+XII%2C+Sukolilo%2C+Kota+SBY%2C+Jawa+Timur+60117!5e0!3m2!1sid!2sid!4v1451122566919" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
