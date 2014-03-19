<?php 
    get_header(); 
    $contentLength = 12;
    if (is_active_sidebar('sidebar1')) $contentLength-=3;
?>
<div id="main" class="col col-lg-12 clearfix" role="main">
    <article id="post-not-found" class="clearfix">
        <header>
            <div class="page-header row">
                <h1 class="col-sm-8"><?php pll_e('Not found (404)')?></h1><div class="col-sm-4"><?php get_search_form(); ?></div>
            </div>
        </header>
        <section class="post_content row">
            <div class="col-sm-<?php echo $contentLength; ?>">
                <?php pll_e('Unfortunately the page you are looking for is not located. Please use the search field to search for the content you want or select from the product categories to browse our products.');?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/404.png" class="error-image" alt="404"/>
            </div>
            <?php if (is_active_sidebar('sidebar1')){?>
            <span class="col-sm-3" role="complementary"><?php dynamic_sidebar( 'sidebar1' ); ?></span>
            <?php } ?>
        </section>
        <!-- end article section -->
    </article>
    <!-- end article -->
</div>
<!-- end #main -->
<?php get_footer(); ?>