<?php 
if ( is_cart() || is_checkout() ) {
    // about.php is used
} else {
?>
<div class="container additional-service">
	<div class="row">
		<div class="col-md-6">
			<div class="additional-service-icon"><img src="<?php the_field('additional_service_icon_one') ?>"></div>
			<div class="additional-service-title"><h2><?php the_field('additional_service_headline_one') ?></h2></div>
			<p><?php the_field('additional_service_text_one') ?></p>
			<a href="<?php the_field('additional_service_link_one') ?>"><?php the_field('additional_service_link_text_one') ?></a>
			
		</div>
		<div class="col-md-6">
			<div class="additional-service-icon"><img src="<?php the_field('additional_service_icon_two') ?>"></div>
			<div class="additional-service-title"><h2><?php the_field('additional_service_headline_two') ?></h2></div>
			<p><?php the_field('additional_service_text_two') ?></p>
			<a href="<?php the_field('additional_service_link_one') ?>"><?php the_field('additional_service_link_text_two') ?></a>
			
		</div>		
	</div>
</div>

<div class="container footer-icons">	
 
	 	<div class="col-md-4">
	 		<div class="icon-wrapper">
		 		<div class="icon"><img src="<?php the_field('footer_icon_one', 'options') ?>"></div>
		 		<div class="icon-text"><h4><?php the_field('footer_icon_text_one', 'options') ?></h4></div>
		 	</div>	
	 	</div>
	 	<div class="col-md-4">
	 		<div class="icon-wrapper">
		 		<div class="icon"><img src="<?php the_field('footer_icon_two', 'options') ?>"></div>
		 		<div class="icon-text"><h4><?php the_field('footer_icon_text_two', 'options') ?></h4></div>
		 	</div>	
	 	</div>
	 	<div class="col-md-4">
	 		<div class="icon-wrapper">
		 		<div class="icon"><img src="<?php the_field('footer_icon_three', 'options') ?>"></div>
		 		<div class="icon-text"><h4><?php the_field('footer_icon_text_three', 'options') ?></h4></div>
		 	</div>	
	 	</div>	 		 	
	</div>	
</div><!--  .container -->
<?php
}
?>
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