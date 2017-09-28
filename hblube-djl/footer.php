<?php 
if ( is_cart() || is_checkout() || is_account_page() ) {
    // Nothing to see here
} else {

if (is_page_template( 'page-templates/home-page.php' )) {
} else {
?>

<div class="container book-cta green">
	<div class="row">
		<div class="col-md-8 text-center"><h1><?php the_field('cta_link_title', 'options')	 ?></h1></div>
			<div class="col-md-4">
				<button type="button" class="btn btn-primary btn-reverse" data-toggle="modal" data-target="#ScheduleModal"><?php the_field('cta_button_label', 'options') ?></button>
		</div>
	</div>
</div>
<?php } ?>

<div class="container-fluid additional-service">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="additional-service-icon"><img src="<?php the_field('additional_service_icon_one','options') ?>"></div>
				<div class="additional-service-title"><h2><?php the_field('additional_service_headline_one','options') ?></h2></div>
				<p><?php the_field('additional_service_text_one','options') ?></p>
				<a href="<?php the_field('additional_service_link_one') ?>"><?php the_field('additional_service_link_text_one','options') ?></a>
				
			</div>
			<div class="col-md-6">
				<div class="additional-service-icon"><img src="<?php the_field('additional_service_icon_two','options') ?>"></div>
				<div class="additional-service-title"><h2><?php the_field('additional_service_headline_two','options') ?></h2></div>
				<p><?php the_field('additional_service_text_two','options') ?></p>
				<a href="<?php the_field('additional_service_link_one') ?>"><?php the_field('additional_service_link_text_two','options') ?></a>
				
			</div>		
		</div>
	</div>
</div>

<div class="container-fluid footer-icons">
	<div class="container">	
	 
		 	<div class="col-sm-4">
		 		<div class="icon-wrapper">
			 		<div class="icon"><img src="<?php the_field('footer_icon_one', 'options') ?>"></div>
			 		<div class="icon-text"><h4><?php the_field('footer_icon_text_one', 'options') ?></h4></div>
			 	</div>	
		 	</div>
		 	<div class="col-sm-4">
		 		<div class="icon-wrapper">
			 		<div class="icon"><img src="<?php the_field('footer_icon_two', 'options') ?>"></div>
			 		<div class="icon-text"><h4><?php the_field('footer_icon_text_two', 'options') ?></h4></div>
			 	</div>	
		 	</div>
		 	<div class="col-sm-4">
		 		<div class="icon-wrapper">
			 		<div class="icon"><img src="<?php the_field('footer_icon_three', 'options') ?>"></div>
			 		<div class="icon-text"><h4><?php the_field('footer_icon_text_three', 'options') ?></h4></div>
			 	</div>	
		 	</div>	 		 	
		</div>	
	</div><!--  .container -->
</div>

<?php
}
?>
<div class="container-fluid footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
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

<!-- Modal -->
<div class="modal fade" id="ScheduleModal" tabindex="-1" role="dialog" aria-labelledby="ScheduleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="ScheduleModalLabel"><?php the_field('cta_popup_header', 'options') ?></h2>
      </div>
      <div class="modal-body">
      <p><?php the_field('cta_popup_text', 'options') ?></p>	
		      <div class="modal-company-select">	
			  <?php get_template_part('inc/business-select'); ?>
			  </div>
		  </div><!-- Extra div from template -->
      </div>

    </div>
  </div>
</div>

    <?php wp_footer(); ?>
  </body>
</html>