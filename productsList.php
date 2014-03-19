<section id="products-list">
    <?php 
        mb_internal_encoding('UTF-8');
        $categoryTitle = mb_strtolower(get_the_title());
    $newQueryArgs = array ('post_type' => 'products', 'paged' => $paged,  'orderby' => 'title');
        $specificCategory = get_post_meta(get_the_ID(), 'product_category', true);
        if (! empty($specificCategory)) { 
            $newQueryArgs =  array_merge($newQueryArgs, array('category_name'=> $specificCategory));
        }
        global $more;    // Declare global $more (before the loop).
        $temp = $wp_query; $wp_query= null;
        $wp_query = new WP_Query(); 
        $wp_query->query($newQueryArgs);
        remove_action( 'the_content', array('ShareaholicPublic', 'draw_canvases'));
        $pInRow = 0;?>
    <div id="products-list-content">
        <header>
            <div class="page-header row"><h2 class="col-sm-<?php echo has_pager()?'4':'12';?>"><p><?php pll_e('Category products') ?> <?php  echo $categoryTitle;?></p></h2><?php if (has_pager()) {?><div class="col-sm-8 productslistpagertop"><?php page_navi(); ?></div><?php } ?></div>
		</header>
    <div class="productslist row">
      
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <?php if ($pInRow==0){?>
        <div class="productRow row">
        <?php } ?>
            <div class="product col-sm-4">
                <h3 class="page-header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                <?php the_post_thumbnail('lgreco-product-list-item');?>
                <?php $more = 0;       // Set (inside the loop) to display content above the more tag.
                       the_content('<span class="read-more">' . pll__('Read more...') .' &raquo;</span>'); ?>
            </div>
            <?php $pInRow++;
                   if ($pInRow==3){
                       $pInRow=0;?>
            </div>
            <?php }?>
        <?php endwhile; ?>
        <?php if ($pInRow>0 && $pInRow<3){ ?>
            </div>
        <?php } ?>
    </div>
    <div class="productslistpager row">
        <?php page_navi(); ?>
    </div>
    </div>
</section>
<?php wp_reset_postdata(); 
      $wp_query = $temp;
?>