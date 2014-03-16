        </div>
</div> <!-- end #container -->
</div> <!-- end contentContainer -->
			<footer role="contentinfo" class="pageFooter">
			
				<div id="inner-footer" class="container clearfix">
		          <div class="pageHover"><p>&nbsp;</p></div>
		          <div id="widget-footer" class="clearfix row">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>
					
					<nav class="clearfix">
						<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
					
					<p class="pull-right"><?php bloginfo( 'description' ); ?></p>
			
					<p class="attribution">&copy; <?php bloginfo('name'); ?></p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
        <!-- media-queries.js (fallback) -->
        <!--[if lt IE 9]>
			 <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

        <!-- html5.js -->
        <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->		
        <?php wp_footer(); // js scripts are inserted using this function ?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600&subset=latin,greek' rel='stylesheet' type='text/css'>

	</body>

</html>