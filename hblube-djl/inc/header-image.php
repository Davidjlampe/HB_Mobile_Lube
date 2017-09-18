<?php 
if ( get_field('default_header_image', 'options') || get_field('custom_header_image') ) {
	$default = get_field('default_header_image', 'options'); // retina image
	$thisPage = get_field('custom_header_image'); // desktop image
	$imageId = $thisPage ? $thisPage : $default;
	$headerImageSrc = wp_get_attachment_image_src( $imageId, 'full' ); // change size if needed
?>
<?php 
if ( is_page_template( 'page-templates/home-page.php' ) ) {
    // about.php is used

 
?>
<section id="header-image" style="background-image: url(<?php echo $headerImageSrc[0]; ?>);background-repeat: no-repeat;background-size: cover;">
		<div id="header-content" style="min-height: 575px; height: auto;">
			<div class="container">
				<div class="row">
					<div class="col-md-8">	
					<h1><?php the_field('header_headline', 'options') ?></h1>
					<h3><?php the_field('header_text', 'options') ?></h3>
						<div class="company-select">	
							<?php get_template_part('inc/business-select'); ?>
						</div>
					</div>
				</div>
			</div>					
		</div>  
</section>		

<?php
} else {
    // about.php is not used
}

?>
 <?php } ?>
