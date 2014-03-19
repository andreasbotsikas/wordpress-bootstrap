<?php
/*
Template Name: Product Category Page
*/
?>
<?php get_header();
      $contentLength = 12;
      if (is_active_sidebar('sidebar1')) $contentLength-=3;
      ?>
				<div id="main" class="col col-lg-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header>
						    <div class="page-header row"><h1 class="col-sm-8"><?php getBreadcrumb(get_post()); ?></h1><?php dynamic_sidebar('search'); ?></div>
						</header> <!-- end article header -->
				    <section class="post_content row">
				        <span class="col-lg-<?php echo $contentLength; ?>"><?php the_content(); ?></span>
				        <?php if (is_active_sidebar('sidebar1')){?>
				        <span class="col-sm-3" role="complementary"><?php dynamic_sidebar( 'sidebar1' ); ?></span>
				        <?php } ?>
				    </section>
                         <?php include "subCategories.php"; ?>
				        <?php include "productsList.php"; ?>
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
        <?php else : 
            include "notfound.php";
              endif; ?>
			
				</div> <!-- end #main -->
    
<?php get_footer(); ?>