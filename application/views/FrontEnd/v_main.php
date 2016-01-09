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
        <div class="col-lg-12 text-center">
            <h1 class="well"><font style="font-size: 1.5em;"><a target="_blank" href="https://www.google.co.id/maps/place/7%C2%B041'46.5%22S+112%C2%B042'38.0%22E/@-7.6962366,112.7103541,19.75z/data=!4m2!3m1!1s0x0:0x0?hl=id">Lokasi Ruko & Gudang</a></font></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6" style="margin-bottom: 3%;" id="about">
            <!--            <h1 style="border-bottom: black solid 1px; padding-bottom: 1%;">KREASI MULTI NIAGA</h1>  
                        <h3 style="margin-top: 1%; color: orangered;">Kontraktor Bangunan</h3><br>-->
            <h2 style="margin-bottom: 1%;">John Sulayman</h2>
            <h4 style="color: orangered; "><?php echo $tentang[0]->jabatan . " - " . $tentang[0]->phone ?></h4><br>
        </div>
        <div class="col-lg-6 text-center google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d587.7474856369382!2d112.71035414878426!3d-7.696236612050899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDEnNDYuNSJTIDExMsKwNDInMzguMCJF!5e0!3m2!1sid!2sid!4v1452342015837" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
