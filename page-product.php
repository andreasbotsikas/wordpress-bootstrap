<?php
/*
Template Name: Product Page
*/
?>

<?php get_header(); 
      $post_thumbnail_id = get_post_thumbnail_id();
      $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'lgreco-product' );
?>
				<div id="main" class="col col-lg-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header class="row">
							
							<div class="page-header"><h1><?php the_title(); ?></h1></div>
						
						</header> <!-- end article header -->
				    <section class="post_content row">
				        <?php if ($featured_src){?>
				        <span class="col-lg-3"><img src="<?php echo $featured_src[0];?>" alt="<?php the_title(); ?>"/></span>
				        <span class="col-lg-9"><?php the_content(); ?></span>
				        <?php }else {?>
                        <span class="col-lg-12"><?php the_content(); ?></span>
				        <?php } ?>
				    </section> <!-- end article section -->
				    <?php include "productsList.php"?>
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
        <?php else : 
            include "notfound.php";
              endif; ?>
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
<?php get_footer(); ?>