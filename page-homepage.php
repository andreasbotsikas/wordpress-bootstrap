<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
<?php echo do_shortcode("[metaslider id=" .  pll__('SliderId') . "]"); ?>
    <div id="main" class="col-sm-12 clearfix" role="main">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

            <header>
                    <div class="page-header">
                        <h1><?php bloginfo('title'); ?><small><?php echo get_post_meta($post->ID, 'custom_tagline' , true);?></small></h1>
                    </div>
            </header>

            <section class="row post_content">

                <div class="col-sm-8">
                    <?php 
                    $post_thumbnail_id = get_post_thumbnail_id();
                    $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'wpbs-featured-home' );
                     if ($featured_src[0]!=null){?>
                        <img src="<?php echo $featured_src[0]?>" alt="<?php bloginfo('title'); ?>"/>
                    <?php }?>
                    <?php the_content(); ?>

                </div>

                <?php get_sidebar('sidebar2'); // sidebar 2 ?>

            </section>
            <!-- end article header -->

            <footer>
                <p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>

            </footer>
            <!-- end article footer -->

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