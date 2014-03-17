<?php
/*
Template Name: Product Category Page
*/
?>
<?php get_header();?>
				<div id="main" class="col col-lg-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header>
						    <div class="page-header row"><h1 class="col-sm-8"><?php the_title(); ?></h1><?php dynamic_sidebar('search'); ?></div>
						</header> <!-- end article header -->
				        <section class="post_content row">
				            <?php if (has_post_thumbnail()){?>
				            <span class="col-lg-3"><?php the_post_thumbnail( 'lgreco-product' );?></span>
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
    
<?php get_footer(); ?>