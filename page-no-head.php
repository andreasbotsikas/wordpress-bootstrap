<?php
/*
Template Name: No head page
 */
?>
<?php get_header(); 
      $contentLength = 12;
      if (has_post_thumbnail()) $contentLength-=3;
?>
				<div id="main" class="col col-lg-12 clearfix" role="main">
					<?php if (have_posts()) :
                              while (have_posts()) :
                                  the_post(); ?>
				    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                        <header></header>
				        <section class="post_content row">
				            <?php if (has_post_thumbnail()){?>
				            <span class="col-sm-3"><?php the_post_thumbnail( 'lgreco-product' );?></span>
				            <?php }?>
				            <span class="col-sm-<?php echo $contentLength; ?>"><?php the_content(); ?></span>
				        </section> <!-- end article section -->
					</article> <!-- end article -->
				    <?php endwhile;
                          else : 
                              include "notfound.php";
                          endif; ?>
				</div> <!-- end #main -->
<?php get_footer(); ?>