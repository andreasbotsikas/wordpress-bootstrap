 <section class="productslist row">
     <?php 
     $newQueryArgs = array ('post_type' => 'products', 'paged' => $paged,  'orderby' => 'title');
     $specificCategory = get_post_meta(get_the_ID(), 'product_category', true);
     if (! empty($specificCategory)) { 
     $newQueryArgs =  array_merge($newQueryArgs, array('category_name'=> $specificCategory));
     }
     
     $temp = $wp_query; $wp_query= null;
     $wp_query = new WP_Query(); 
     $wp_query->query($newQueryArgs);
     remove_action( 'the_content', array('ShareaholicPublic', 'draw_canvases'));
     while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
     <div class="product col-md-3">
         <h3 class="page-header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
         <?php the_post_thumbnail('lgreco-product-list-item');?>
         <?php the_content();?>
     </div>
     <?php endwhile; ?>
 </section>
<section class="productslistpager row">
     <?php page_navi(); ?>
</section>
<?php wp_reset_postdata(); 
$wp_query = $temp;
?>