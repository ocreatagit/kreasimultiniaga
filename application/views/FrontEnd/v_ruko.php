<div class="panel panel-warning siku">
    <div class="panel-heading">
        <h1 class="panel-title" style="font-size: 2em">Ruko 1</h1>
    </div>
    <div class="panel-body">
        <h1 id="images" class="page-header" style="margin-top: 0%;"><i class="fa fa-picture-o"></i> Images</h1>
        <div class="row" id="">
            <ul id="lightSlider">
                <?php
                for ($i = 0; $i < 6; $i++) {
                    ?>
                    <li class="" style="">
                        <div style="">
                            <a style="text-decoration: none;" href="<?php echo base_url() ?>images/<?php echo ($i % 3 == 0) ? 3 : $i % 3 ?>.jpg" data-lightbox="roadtrip"> 
                                <img src="<?php echo base_url() ?>images/<?php echo ($i % 3 == 0) ? 3 : $i % 3 ?>.jpg" style="height: 200px;">
                                <p class="text-center" style="color: black; opacity: 1;"> Description</p> 
                            </a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <h1 id="images" class="page-header" style="margin-top: 0%;"><i class="fa fa-book"></i> Description </h1>
        <div class="siku text-justify" style="width: 100%">
            <pre>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque elit elit, mollis cursus gravida ut, venenatis et orci. Nulla pellentesque sem faucibus risus consectetur, id aliquet odio sagittis. Sed tellus eros, rutrum id bibendum sit amet, viverra ut tortor. Phasellus in enim semper, vestibulum justo vulputate, feugiat magna. Nullam non est velit. Pellentesque fermentum massa non laoreet blandit. Vivamus laoreet quam est, vel bibendum ante dignissim a. Morbi eget ipsum eu sapien mattis luctus et eget ipsum.

            Vivamus non sollicitudin magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis ultricies vehicula tincidunt. Mauris finibus magna nibh. Quisque justo leo, tincidunt sit amet mauris ac, congue imperdiet mi. In blandit erat a sagittis rhoncus. Quisque suscipit auctor enim. Donec porta ullamcorper imperdiet. Curabitur id augue dapibus mi fringilla rhoncus id sed est. Vivamus tristique metus eu sollicitudin tincidunt. Fusce consequat ligula non porttitor interdum. Pellentesque rhoncus augue eget nisi vulputate, ultrices hendrerit leo volutpat. Aliquam sed purus turpis. Nunc tempus ante varius interdum consequat. Nunc a commodo erat. Integer a augue vitae diam viverra finibus et sed dui.

            Aliquam a dolor purus. In ut porttitor ante. Mauris mollis aliquet magna volutpat congue. Vivamus ac ligula tempor, semper mi condimentum, posuere magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque eu lectus tortor. Donec vestibulum metus nisi, at posuere ex tempus in. Nulla ut auctor risus. Sed at tempus libero. Nullam dictum est vitae lobortis consectetur.

            Pellentesque diam dolor, accumsan eget facilisis ac, feugiat vel tortor. Nullam volutpat risus eget orci volutpat, eget gravida elit fringilla. Nulla consectetur tempor nulla. Phasellus quam turpis, lobortis tincidunt mattis at, condimentum sed ante. Vestibulum vitae tempus dolor, at iaculis nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus lacus id dui placerat semper. Aenean fermentum augue vel nibh fermentum porta. Pellentesque ac lorem elit. Morbi tristique vitae ligula at semper. Suspendisse sit amet laoreet mi. Aliquam id ante et lacus posuere rhoncus eu vel massa. Nulla facilisi. Vestibulum maximus tellus elit. Praesent nisl eros, porta sit amet nisl sed, efficitur pharetra eros.

            Donec eu justo rutrum, mollis nibh ac, vulputate arcu. Nunc sed orci quam. Nunc euismod eros id turpis pretium lobortis. Etiam aliquet quis purus ut volutpat. Nunc vitae fermentum odio. Nullam hendrerit quis tellus in sagittis. Vivamus sagittis augue vitae mauris bibendum, a dignissim est cursus. Fusce mattis, odio et fringilla viverra, risus ex feugiat arcu, vitae faucibus nisl lectus id turpis. Nullam fermentum rhoncus eleifend. Sed condimentum quam auctor, cursus mi vel, congue felis. Integer efficitur dolor quis nunc molestie, at condimentum enim iaculis. Cras tincidunt massa quis dolor luctus, sed tincidunt libero dictum. Vestibulum id dui ullamcorper, dapibus dolor eget, vulputate lorem. Suspendisse tincidunt dolor nibh, varius commodo lectus consectetur quis. Sed at iaculis metus. 
            </pre>
        </div>
    </div>
</div>