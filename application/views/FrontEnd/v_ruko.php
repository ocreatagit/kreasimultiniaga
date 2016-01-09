<div class="panel panel-warning siku">
    <?php if (count($ruko) > 0) { ?>
        <div class="panel-heading">
            <h1 class="panel-title" style="font-size: 2em"><?php echo $ruko->judul ?></h1>
        </div>
        <div class="panel-body">
            <h1 id="images" class="page-header" style="margin-top: 0%;"><i class="fa fa-picture-o"></i> Images</h1>
            <div class="row" id="">
                <ul id="lightSlider">
                    <?php
                    for ($i = 0; $i < count($image_slider); $i++) {
                        ?>
                        <li class="text-center" style="">
                            <div style="">
                                <a style="text-decoration: none;" href="<?php echo base_url() ?>uploads/<?php echo $image_slider[$i]->path ?>" data-lightbox="roadtrip"> 
                                    <img src="<?php echo base_url() ?>uploads/<?php echo $image_slider[$i]->path ?>" style="height: 200px;">
                                </a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="siku text-justify" style="width: 100%">
    <!--            <h1 style="border-bottom: black solid 1px; padding-bottom: 1%; margin-top: 1%;"> <i class="fa fa-book"></i> KREASI MULTI NIAGA</h1>
                <div style="padding: 10px;" class="text-justify">
                    Rumah minimalis yang kami rancang adalah rumah yang banyak di bangun di daerah perkotaan terutama di daerah perumahan. Dengan adanya luas tanah yang tidak terlalu luas maka dari itu kami membuat konsep sedemikian rupa sehingga rumah dapat di bangun dengan cantik walau di lahan yang sempit dan tetap nyaman pada saat di tempati. Bagaimana desain yang simple terkesan mudah dikerjakan menjadi desain yang indah, minimalis dan elegan. Karena salah satu konsep yang terpenting adalah desain rumah minimalis itu sendiri mengedepankan ke simple’an dan kemudahan dalam pengerjaannya. Dan kemaksimalan dalam tampilan akhir dari desain rumah minimalis itu sendiri.
                    
                </div>-->
                <h1 style="border-bottom: black solid 1px; padding-bottom: 1%; margin-top: 1%;"><i class="fa fa-book"></i> DESKRIPSI </h1>
                <div style="padding: 10px;" class="text-justify">
                    <!--                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus velit, pulvinar mollis condimentum mollis, dictum quis dui. Donec id sodales eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed libero ac ipsum suscipit bibendum a at dolor. Pellentesque sit amet enim quis justo rhoncus consectetur aliquet cursus lorem. Vivamus pulvinar nunc id massa tristique, eu convallis tortor tempor. Quisque sagittis neque vel mauris ullamcorper, nec condimentum justo sodales. Duis eu dignissim urna. Ut id nisl sem. Nulla ac neque sit amet arcu pharetra finibus sodales vitae metus. Quisque molestie luctus fringilla.
                    
                                    Mauris convallis consectetur gravida. Aliquam porta leo id accumsan vulputate. Etiam venenatis luctus nulla tincidunt tempus. Nunc bibendum augue quis leo rutrum, non laoreet odio dapibus. Nam in purus eget metus condimentum placerat. Ut auctor nec nunc eu interdum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    
                                    Curabitur ac libero lacinia, eleifend velit at, tempor nulla. Morbi malesuada velit ac bibendum tincidunt. Duis nec quam in lorem ornare ultrices in lacinia ante. Morbi vitae lorem luctus nulla gravida porttitor. Vestibulum lobortis ipsum ac iaculis condimentum. Duis maximus mi id quam feugiat, id condimentum felis sollicitudin. Pellentesque dapibus nibh nec felis volutpat tristique. Nullam ante mauris, laoreet quis laoreet vel, pretium ut augue. Fusce gravida sapien vel sapien elementum hendrerit. -->
                    <?php echo $ruko->deskripsi; ?>
                </div>
            </div>
        </div>
    <?php } else {
        ?>
        <div class="panel-heading">
            <h1 class="panel-title" style="font-size: 2em">Informasi</h1>
        </div>
        <div class="panel-body text-center" style="">
            <img src="<?php echo base_url() ?>images/proyek.png" class="text-center" width="70%"/>
            <!--<h2 class="text-center"><i class="fa fa-info-circle"></i> Tidak Terdapat Proyek Gudang Saat Ini! </h2>-->
        </div>
    <?php }
    ?>
</div>