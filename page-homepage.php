<?php
/*
Template Name: Homepage
 */
?>
<?php get_header(); 
      $contentLength = 12;
      if (has_post_thumbnail()) $contentLength-=3;
      if (is_active_sidebar('sidebar2')) $contentLength-=3;
    ?>
    <?php if (have_posts()) :
              while (have_posts()) :
                  the_post(); ?>
<?php echo do_shortcode("[metaslider id=" .  pll__('SliderId') . "]"); ?>
<div id="searchhome"><?php get_search_form(); ?></div>
<div id="main" class="col-sm-12 clearfix" role="main">



    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
      <!--  <header>
            <div class="page-header">
                <h1><?php the_title()?></h1>
            </div>
        </header>-->
        <div class="row">&nbsp;</div>
        <section class="row post_content">
            <?php if (has_post_thumbnail()){?>
            <span class="col-sm-3 post-thumbnail"><?php the_post_thumbnail( 'lgreco-homepage' );?></span>
            <?php }?>
            <span class="col-sm-<?php echo $contentLength; ?>"><?php the_content(); ?></span>
            <?php if (is_active_sidebar('sidebar2')){?>
            <span class="col-sm-3" role="complementary"><?php dynamic_sidebar( 'sidebar2' ); ?></span>
            <?php } ?>
        </section>
        <!-- end article header -->
    </article>
    <!-- end article -->
    <?php endwhile; ?>
    <?php else : 
              include "notfound.php";
          endif; ?>

</div>
<!-- end #main -->
<?php //get_sidebar(); // sidebar 1 ?>
<?php get_footer(); ?>