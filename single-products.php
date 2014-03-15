<?php get_header(); ?>
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>		
							<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>						
						</header> <!-- end article header -->
					
				    <section class="post_content clearfix" itemprop="articleBody">
				        <?php the_post_thumbnail( 'lgreco-product' ); ?>
				        <?php the_content(); ?>
							
				        <?php wp_link_pages(); ?>
					
				    </section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","wpbootstrap"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>			
					
					
        <?php else : 
            include "notfound.php";
              endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
<?php get_footer(); ?>