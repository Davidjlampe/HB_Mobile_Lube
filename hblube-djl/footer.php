<div class="container">	
 
	 	<div class="col-md-4">
	 		<div class="icon"><img src="<?php the_field('footer_icon_one', 'options') ?>"></div>
	 		<div class="icon-text"><?php the_field('footer_icon_text_one', 'options') ?></div>
	 	</div>
	 	<div class="col-md-4">
	 		<div class="icon"><img src="<?php the_field('footer_icon_two', 'options') ?>"></div>
	 		<div class="icon-text"><?php the_field('footer_icon_text_two', 'options') ?></div>
	 	</div>
	 	<div class="col-md-4">
	 		<div class="icon"><img src="<?php the_field('footer_icon_three', 'options') ?>"></div>
	 		<div class="icon-text"><?php the_field('footer_icon_text_three', 'options') ?></div>
	 	</div>	 		 	
	</div>	
</div><!--  .container -->

<div class="container-fluid footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
		 		<?php wp_nav_menu( array(
			         'theme_location' => 'primary',
			         'menu_class'   =>  'nav navbar-nav',
			         'container'       => '',
			         'depth'      =>  0,
			         'fallback_cb'  =>  false,
			         'walker'     =>  new djl_Nav_Walker
			         )); // generates the ul
		        ?>
			</div>
		</div>
	</div>
</div>

<footer id="site-footer" class="">
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
					<a class="pull-right" href="http://davidjlampe.com" target="_blank">Website by Davidjlampe.com</a>
			</p>
		</div>
	</div><!-- #copyright -->
</footer>

    <?php wp_footer(); ?>
  </body>
</html>