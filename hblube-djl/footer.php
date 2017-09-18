<footer id="site-footer" class="">
	<div class="container">
		<?php if ( is_active_sidebar( 'aside-footer' ) ) : ?>
			<div class="row">
			        <?php dynamic_sidebar( 'aside-footer' );?>
			</div><!-- row -->	        
		<?php endif; ?>
		<div class="row">	
			<?php wp_nav_menu( array(
			       'theme_location'	=> 'icons',
	           'menu_class'		=>	'icon-nav list-inline',
	           'container'       => 'nav',
						 'container_class' => 'social-media col-xs-12',
	           'depth'			=>	0,
	           'fallback_cb'	=>	false,
	           'walker'			=>	new icon_Nav_Walker
	           )); 
		     // see 'inc/nav-walker.php' to alter output.  Default uses the title as the font-awesome icon class, the fa- is already added
		     ?>
		</div><!-- row -->
	</div>
	<div id="copyright" class="">
		<div class="container">
			<p class="copyright">
					©	<?php // automatically hyphenates the correct year at the end
	         	 $fromYear = 2016; 
	         	 $thisYear = (int)date('Y'); 
	         	 echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '').' ';
	         	 esc_html_e(get_theme_mod( 'djl_copyright_textbox' )); 
	         	 // user can enter the rest in wp-admin/customize.php screen
	        	?>
					<a class="eel pull-right" href="#" target="_blank">W</a>
			</p>
		</div>
	</div><!-- #copyright -->
</footer>

    <?php wp_footer(); ?>
  </body>
</html>