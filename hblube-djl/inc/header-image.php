<?php 
if ( get_field('default_header_image', 'options') || get_field('custom_header_image') ) {
	$default = get_field('default_header_image', 'options'); // retina image
	$thisPage = get_field('custom_header_image'); // desktop image
	$imageId = $thisPage ? $thisPage : $default;
	$headerImageSrc = wp_get_attachment_image_src( $imageId, 'full' ); // change size if needed
?>


<?php
if ( is_page_template( 'page-templates/home-page.php' ) ) {
?>
<section id="header-image" style="background-image: url(<?php echo $headerImageSrc[0]; ?>);background-repeat: no-repeat;background-size: cover;">
		<div id="header-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center">	
					<h1><?php the_field('header_headline', 'options') ?></h1>
					<h3><?php the_field('header_text', 'options') ?></h3>
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
							
								<div class="company-select">
									<h3 style="color: #000;font-weight: 700;text-align: left;margin-left: 25px;">Step 1</h3>
									<p>Select your workplace or business</p>
									<img src="<?php bloginfo('stylesheet_directory'); ?>/img/office.svg" id="select-icon">	
									<?php get_template_part('inc/business-select'); ?>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>					
		</div>  
</section>		

<?php
} elseif ( is_cart() || is_checkout() || is_account_page() ) {
  // static homepage
} else {
?>	
<section id="header-image" class="hidden-xs" style="background-image: url(<?php echo $headerImageSrc[0]; ?>);background-repeat: no-repeat;background-size: cover;">
		<div class="spacer" style="min-height: 300px;"></div>  </section>	
<?php
}}
?>