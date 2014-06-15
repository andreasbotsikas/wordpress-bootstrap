<section id="products-list">
    <?php 
        mb_internal_encoding('UTF-8');
        $categoryTitle = get_the_title();
    $newQueryArgs = array ('post_type' => 'products', 'paged' => $paged,  'orderby' => 'title');
    $specificCategory = get_post_meta(get_the_ID(), 'product_category', true);
    $isAllProducts = true;
        if (! empty($specificCategory)) { 
    $newQueryArgs =  array_merge($newQueryArgs, array('category_name'=> $specificCategory));
    $isAllProducts = false;
        }
        global $more;    // Declare global $more (before the loop).
        $temp = $wp_query; $wp_query= null;
        $wp_query = new WP_Query(); 
    $wp_query->query($newQueryArgs);
        remove_action( 'the_content', array('ShareaholicPublic', 'draw_canvases'));?>
    <div id="products-list-content">
<!--        <header>
            <div class="page-header row"><h2 class="col-sm-12">
                                             <?php if ($isAllProducts){?>
                                                <p><?php pll_e('All products') ?></p>
                                             <?php }else{ ?>
                                                <p><?php  echo $categoryTitle;?></p>
                                             <?php } ?>
                                         </h2></div>
		</header>-->
    <div class="productslist row">
        <?php add_filter( 'post_thumbnail_html', 'my_lightbox_image_html', 10, 3 ); ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <h3 class="page-header col-xs-12"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <div class="row col-xs-12">
            <div class="product col-sm-12">
				 <span class="col-sm-3 post-thumbnail center-block"><?php the_post_thumbnail( 'lgreco-product' );?></span>
				 <span class="col-sm-9"><?php the_content(); ?></span>
            </div>
        <?php endwhile; ?>
        </div>
        <?php remove_filter( 'post_thumbnail_html', 'my_lightbox_image_html'); ?>
    </div>
    </div>
</section>
<?php wp_reset_postdata(); 
      $wp_query = $temp;
?>