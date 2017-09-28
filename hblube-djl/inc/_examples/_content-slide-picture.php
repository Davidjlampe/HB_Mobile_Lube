<?php 

// Need to add sizes to functions.php
// -------------------------------------------------------------------------
	// add_image_size( 'carousel-lg-2x', 2340, 1000, true );  
	// add_image_size( 'carousel-lg', 1170, 500, true );
	// add_image_size( 'carousel-md-2x', 2048, 900, true );
	// add_image_size( 'carousel-md', 1024, 450, true );
	// add_image_size( 'carousel-sm-2x', 1536, 900, true );
	// add_image_size( 'carousel-sm', 768, 450, true );
// -------------------------------------------------------------------------


if ( has_post_thumbnail() ) {
	$large2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carousel-lg-2x' );
	$large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carousel-lg' );
	$medium2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carousel-md-2x' );
	$medium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carousel-md' );
	$small2x = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carousel-sm-2x' );
	$small = wp_get_attachment_image_src( get_post_thumbnail_id(), 'carousel-sm' );?>
<picture>
	<!--[if IE 9]><video style="display: none;"><![endif]-->
	<source srcset="<?php echo $large[0].' 1x, '.$large2x[0].' 2x'; ?>" media="(min-width: 1024px)">
	<source srcset="<?php echo $medium[0].' 1x, '.$medium2x[0].' 2x'; ?>" media="(min-width: 768px)">
	<!--[if IE 9]></video><![endif]-->
	<img srcset="<?php echo $small[0].' 1x, '.$small2x[0].' 2x'; ?>" alt="<?php the_title(); ?>"
	src="<?php echo $large[0]; ?>" class="img-responsive">
	<noscript><img src="<?php echo $large[0];  ?>" alt="<?php the_title(); ?>"></noscript>
</picture>				

<?php }	?>



	<?php if ( get_field('show_slide_caption')) { ?>
		<div class="carousel-caption">
			<?php the_field('slide_caption_content'); ?>
			<?php if (get_field('show_read_more_link') != 'none') { 
				$readMoreUrl = get_field('show_read_more_link') == 'internal' ? get_field('link_to_exisitng_content') : get_field('link_to_external_url');
				?>
				<a href="<?php echo $readMoreUrl; ?>"><?php the_field('read_more_text'); ?></a>	
			<?php } ?>
		</div>
	<?php } ?>
	<footer class="entry-meta"><?php edit_post_link( __( '<i class="fa fa-edit"></i>', 'djl' )); ?></footer><!-- .entry-meta -->