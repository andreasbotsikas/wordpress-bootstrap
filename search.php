<?php get_header(); 
      $contentLength = 12;
      if (is_active_sidebar('sidebar1')) $contentLength-=3; 
      ?>
<div id="main" class="col col-lg-12 clearfix" role="main">
    <div class="page-header row">
        <h1 class="col-sm-8"><?php pll_e('Search results for')?> <?php echo esc_attr(get_search_query()); ?></h1><div class="col-sm-4"><?php get_search_form(); ?></div>
    </div>
    <div class="row ">
         <div class="search-results col-sm-<?php echo $contentLength; ?>">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header>
							<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						    <?php if (has_category()){ ?><p class="meta"><?php pll_e('In categories'); ?> <?php the_category(', '); ?>.</p><?php } ?>
						</header> <!-- end article header -->
						<section class="post_content">
						    <?php if (has_excerpt()){ 
						          the_excerpt('<span class="read-more">' . pll__('Read more...') .' &raquo;</span>');
                                 }else{ 
						            $text = get_the_content('');
						            $text = strip_tags(strip_shortcodes( $text));
                                    echo $text; echo '<br/>';
                                    echo '<span class="read-more"><a href="' . get_permalink() . '">' . pll__('Read more...') . ' &raquo;</a></span>';
                              } ?>
						</section> <!-- end article section -->
						<footer>
						</footer> <!-- end article footer -->
					</article> <!-- end article -->
    <?php endwhile; ?>	
    <?php page_navi(); ?>					
        <?php else : 
            include "notfound.php";
              endif; ?>
             </div>
      <?php if (is_active_sidebar('sidebar1')){?>
            <div class="col-sm-3" role="complementary"><?php dynamic_sidebar( 'sidebar1' ); ?></div>
      <?php } ?>
    </div>
</div>    
<?php get_footer(); ?>