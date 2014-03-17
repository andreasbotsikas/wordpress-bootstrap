<?php get_header(); 
      $post_thumbnail_id = get_post_thumbnail_id();
$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'lgreco-product' );
$contentLength = 12;
      if ($featured_src) $contentLength-=3;
      if (is_active_sidebar('sidebar1')) $contentLength-=2;
      
?>
				<div id="main" class="col col-lg-12 clearfix" role="main">

					<?php if (have_posts()) :
                              while (have_posts()) :
                                  the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header>
						    <div class="page-header row"><h1 class="col-sm-8"><?php the_title(); ?></h1><?php dynamic_sidebar('search'); ?></div>
						</header> <!-- end article header -->
				        <section class="post_content row">
				            <?php if ($featured_src){?>
				            <span class="col-lg-3"><img src="<?php echo $featured_src[0];?>" alt="<?php the_title(); ?>"/></span>
				            <?php }?>
				            <span class="col-lg-<?php echo $contentLength; ?>"><?php the_content(); ?></span>
				            <?php if (is_active_sidebar('sidebar1')){?>
                            <span class="col-lg-2"><?php get_sidebar('sidebar1'); ?></span>
				            <?php } ?>
				        </section> <!-- end article section -->
						<footer>
							<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
						</footer> <!-- end article footer -->
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
        <?php else : 
                              include "notfound.php";
                          endif; ?>
				</div> <!-- end #main -->
<?php get_footer(); ?>