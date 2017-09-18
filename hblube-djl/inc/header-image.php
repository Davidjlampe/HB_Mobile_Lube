<?php 
if ( get_field('default_header_image', 'options') || get_field('custom_header_image') ) {
	$default = get_field('default_header_image', 'options'); // retina image
	$thisPage = get_field('custom_header_image'); // desktop image
	$imageId = $thisPage ? $thisPage : $default;
	$headerImageSrc = wp_get_attachment_image_src( $imageId, 'full' ); // change size if needed
?>
<section id="header-image" class="hidden-xs" style="background-image: url(<?php echo $headerImageSrc[0]; ?>);">
		<div class="spacer" style="min-height: 250px;"></div>  
</section>		
 <?php } ?>