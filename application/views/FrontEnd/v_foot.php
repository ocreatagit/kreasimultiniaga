    <div class="" id="footerDiv" style="">
        <p style="font-size: 1.3em; padding-top: 0.5%; padding-bottom: 0.5%;" class="text-center" >
            <font color="#FFFFFF"> &copy; Kreasi Multi Niaga, 2015 </font> 
        </p>
    </div>
</div>
<script src="<?php echo base_url() ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>js/slippry.min.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

<!--<script src="js/jquery-2.1.4.js"></script>-->
<script src="<?php echo base_url() ?>horizontal-timeline-master/js/jquery.mobile.custom.min.js"></script>
<script src="<?php echo base_url() ?>horizontal-timeline-master/js/main.js"></script>
<script src="<?php echo base_url() ?>lightslider/js/lightslider.min.js"></script>
<script src="<?php echo base_url() ?>lightbox/js/lightbox.js"></script>

<script src="<?php echo base_url() ?>jssor/js/jssor.slider.mini.js"></script>
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
//            autoWidth: true,
            onBeforeSlide: function (el) {
            }
        });
    });

    $(document).ready(function () {
        $('#slippry').slippry();
    });

</script>

<script>
    jQuery(document).ready(function ($) {

        var jssor_1_SlideoTransitions = [
            [{b: 5500.0, d: 3000.0, o: -1.0, r: 240.0, e: {r: 2.0}}],
            [{b: -1.0, d: 1.0, o: -1.0, c: {x: 51.0, t: -51.0}}, {b: 0.0, d: 1000.0, o: 1.0, c: {x: -51.0, t: 51.0}, e: {o: 7.0, c: {x: 7.0, t: 7.0}}}],
            [{b: -1.0, d: 1.0, o: -1.0, sX: 9.0, sY: 9.0}, {b: 1000.0, d: 1000.0, o: 1.0, sX: -9.0, sY: -9.0, e: {sX: 2.0, sY: 2.0}}],
            [{b: -1.0, d: 1.0, o: -1.0, r: -180.0, sX: 9.0, sY: 9.0}, {b: 2000.0, d: 1000.0, o: 1.0, r: 180.0, sX: -9.0, sY: -9.0, e: {r: 2.0, sX: 2.0, sY: 2.0}}],
            [{b: -1.0, d: 1.0, o: -1.0}, {b: 3000.0, d: 2000.0, y: 180.0, o: 1.0, e: {y: 16.0}}],
            [{b: -1.0, d: 1.0, o: -1.0, r: -150.0}, {b: 7500.0, d: 1600.0, o: 1.0, r: 150.0, e: {r: 3.0}}],
            [{b: 10000.0, d: 2000.0, x: -379.0, e: {x: 7.0}}],
            [{b: 10000.0, d: 2000.0, x: -379.0, e: {x: 7.0}}],
            [{b: -1.0, d: 1.0, o: -1.0, r: 288.0, sX: 9.0, sY: 9.0}, {b: 9100.0, d: 900.0, x: -1400.0, y: -660.0, o: 1.0, r: -288.0, sX: -9.0, sY: -9.0, e: {r: 6.0}}, {b: 10000.0, d: 1600.0, x: -200.0, o: -1.0, e: {x: 16.0}}]
        ];

        var jssor_1_options = {
            $AutoPlay: true,
            $SlideDuration: 800,
            $SlideEasing: $Jease$.$OutQuint,
            $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 1920);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>
</body>
</html>