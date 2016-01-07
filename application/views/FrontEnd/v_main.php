<div id="innerHome" class="" style="">
    <ul id="slippry">
        <?php
        $count = 1;
        foreach ($image_slider as $image) {
            ?>
            <li>
                <a href="#slide<?php echo $count ?>"><img src="<?php echo base_url() ?>uploads/<?php echo $image->path ?>" ></a>
            </li>
            <?php
            $count++;
        }
        ?>
    </ul>
</div>

<div id="tentangKami" style="background-color: #EAF2F5; padding: 2%;">
    <div class="row">
        <div class="col-lg-6" style="margin-bottom: 3%;" id="about">
            <!--            <h1 style="border-bottom: black solid 1px; padding-bottom: 1%;">KREASI MULTI NIAGA</h1>  
                        <h3 style="margin-top: 1%; color: orangered;">Kontraktor Bangunan</h3><br>-->
            <h2 style="margin-bottom: 1%;">John Sulayman</h2>
            <h4 style="color: orangered; "><?php echo $tentang[0]->jabatan." - ".$tentang[0]->phone ?></h4><br>
        </div>
        <div class="col-lg-6 text-center google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5958959606814!2d112.78186351437122!3d-7.286733673639072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa40f087cdb1%3A0xdf99b5f3b4dc89be!2sJl.+Manyar+Kertoadi+XII%2C+Sukolilo%2C+Kota+SBY%2C+Jawa+Timur+60117!5e0!3m2!1sid!2sid!4v1451122566919" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
