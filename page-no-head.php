<?php
/*
Template Name: No head page
*/
?>
<?php get_header(); ?>
				<div id="main" class="col col-lg-12 clearfix" role="main">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				        <section class="post_content row">
				           <?php the_content(); ?>
				        </section> <!-- end article section -->
						<footer>
							<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
						</footer> <!-- end article footer -->
					</article> <!-- end article -->
				    <?php endwhile;
                          else : 
                              include "notfound.php";
                          endif; ?>
				</div> <!-- end #main -->
<?php get_footer(); ?>