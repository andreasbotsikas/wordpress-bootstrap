<?php
/*
Template Name: Product Category Page
*/
?>
<?php get_header();
      $contentLength = 12;
      if (is_active_sidebar('sidebar1')) $contentLength-=2;
      if (has_post_thumbnail()) $contentLength-=3;
      ?>
				<div id="main" class="col col-lg-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header>
						    <div class="page-header row"><h1 class="col-sm-8"><?php getBreadcrumb(get_post()); ?></h1><?php dynamic_sidebar('search'); ?></div>
						</header> <!-- end article header -->
				    <section class="post_content row">
				        <?php if (is_active_sidebar('sidebar1')){?>
				        <span class="col-sm-2" role="complementary"><?php dynamic_sidebar( 'sidebar1' ); ?></span>
				        <?php } ?>
				        <span class="col-sm-<?php echo $contentLength; ?>"><?php the_content(); ?></span>
				        <?php if (has_post_thumbnail()){?>
                        <?php add_filter( 'post_thumbnail_html', 'my_lightbox_image_html', 10, 3 ); ?>
				        <span class="col-sm-3 post-thumbnail"><?php the_post_thumbnail( 'lgreco-product-list-item' );?></span>
                        <?php remove_filter( 'post_thumbnail_html', 'my_lightbox_image_html'); ?>
				            <?php }?>
				    </section>
                         <?php include "subCategories.php"; ?>
				        <?php /*include "productsList.php";*/ include "productsListSimple.php"; ?>
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
        <?php else : 
            include "notfound.php";
              endif; ?>
			
				</div> <!-- end #main -->
    
<?php get_footer(); ?>