<!--slideshow-->
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/slider/jquery.easing.1.3.js';?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/slider/jquery.cycle.all.js';?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#slideshow').after('<ul class="pagination" id="slideshowNav">').cycle({
            fx: 'scrollLeft',
            speed: 'slow',
            easing: 'easeInOutQuad',
            timeout: 5000,
            pager: '#slideshowNav',
            pagerAnchorBuilder: function(index, DOMelement) {
                return '<li><a href="#">' + (index + 1) + '</a></li>';
            },
            activePagerClass: 'active'
        });
    });
</script>
<div id="slider-container">

    <?php $slider_url = ''; ?>

    <!--slider begin-->
    <div id="slideshow"  class="row">

        <?php for ($i = 1; $i <= 2; $i++) { ?>

        <div class="col-xs-12">

            <span class="information">

                <h2><?php if(of_get_option('slider_head'.$i) != NULL){ echo of_get_option('slider_head'.$i);} else echo "&nbsp;" ?></h2>

                <p><?php if(of_get_option('slider_content'.$i) != NULL){ echo of_get_option('slider_content'.$i);} else echo "&nbsp;" ?></p>

                <?php $slider_url = of_get_option('slider_link'.$i); ?>

                <?php if($slider_url<>'') { ?><span class="read-more"><a href="<?php echo of_get_option('slider_link'.$i); ?>"><?php pll_e( 'Read More'); ?></a></span><?php } ?>

            </span>
            <!--content end-->

            <?php if($slider_url<>'') { ?><a href="<?php echo of_get_option('slider_link'.$i); ?>"><img width="560" height="380" src="<?php if(of_get_option('slider_image'.$i) != NULL){ echo of_get_option('slider_image'.$i);} else echo get_template_directory_uri() . '/images/slide'.$i.'.png' ?>" alt="" /></a>
            <?php } else {?>
            <img width="560" height="380" src="<?php if(of_get_option('slider_image'.$i) != NULL){ echo of_get_option('slider_image'.$i);} else echo get_template_directory_uri() . '/images/slide'.$i.'.png' ?>" alt="" /><?php } ?>
        </div>

        <?php } ?>


    </div>
    <!--slider end-->

</div>
<!--slider container end-->