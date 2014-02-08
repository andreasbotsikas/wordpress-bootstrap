<?php
/**
 * Template Name: Under construction
 *
 * Description: The please comeback page
 *
 */

?>
<html>
<head>
    <title>Λ greco - Passion for quality</title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/page-underconstruction.css">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" >
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" >
</head>
<body>
    <form class="box login">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header>
            <label><?php the_title(); ?></label>
        </header>
        <fieldset class="boxBody">
            <img src="<?php echo get_template_directory_uri(); ?>/logo.png" alt="Λgreco"/>
			<br/>
			<br/>
			<b>
                <?php the_content(); ?>
			</b>
        </fieldset>
        <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </form>
    <footer id="main">2014 &copy Λ greco</footer>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-47897501-1');
        ga('send', 'pageview');
    </script>
</body>
</html>
