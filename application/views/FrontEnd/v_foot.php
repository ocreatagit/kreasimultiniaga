<div class="" id="footerDiv" style="">
    <p style="font-size: 1.3em; padding-top: 0.5%; padding-bottom: 0.5%;" class="text-center" >
        <font color="#FFFFFF"> &copy; Kreasi Multi Niaga, 2015 </font> 
    </p>
</div>
<script src="<?php echo base_url() ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>js/slippry.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

<!--<script src="js/jquery-2.1.4.js"></script>-->
<script src="<?php echo base_url() ?>horizontal-timeline-master/js/jquery.mobile.custom.min.js"></script>
<script src="<?php echo base_url() ?>horizontal-timeline-master/js/main.js"></script>
<script src="<?php echo base_url() ?>lightslider/js/lightslider.min.js"></script>
<script src="<?php echo base_url() ?>lightbox/js/lightbox.js"></script>
<script>


    $(document).ready(function () {
        var autoplaySlider = $('#lightSlider').lightSlider({
            auto: true,
            loop: true,
            pauseOnHover: true,
            item: 3,
//            slideMove: 2,
//            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
//            speed: 1000,
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        item: 3,
                        slideMove: 1,
                        slideMargin: 6
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        item: 2,
                        slideMove: 1
                    }
                }
            ],
            autoWidth: true,
            onBeforeSlide: function (el) {
//                $('#current').text(el.getCurrentSlideCount());
            }
        });
//        $('#total').text(autoplaySlider.getTotalSlideCount());
    });



//    $(document).ready(function () {
//        $('#lightSlider').lightSlider({
//            item: 4,
//            loop: true,
//            slideMove: 2,
//            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
//            speed: 600,
//            responsive: [
//                {
//                    breakpoint: 800,
//                    settings: {
//                        item: 3,
//                        slideMove: 1,
//                        slideMargin: 6,
//                    }
//                },
//                {
//                    breakpoint: 480,
//                    settings: {
//                        item: 2,
//                        slideMove: 1
//                    }
//                }
//            ],
//            autoWidth: true
//        });
//    });

    $(document).ready(function () {
        $('#slippry').slippry();
    });
</script>
</body>
</html>