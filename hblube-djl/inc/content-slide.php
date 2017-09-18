<?php 
global $post;
$attachment = get_post_thumbnail_id();

if ( $attachment ) {
	$img_src = wp_get_attachment_image_src( $attachment, 'carousel-lg' ); // desktop image
	$img_srcset = wp_get_attachment_image_srcset( $attachment, 'carousel-lg' );
	$img_sizes  = wp_calculate_image_sizes('carousel-lg', NULL, NULL, $attachment);
	// Wordpress now create the responsive image srcset and sizes for you
	?>
<img src="<?php echo $img_src[0]; ?>"
		 srcset="<?php echo $img_srcset; ?>"
     sizes="<?php echo $img_sizes; ?>"
     alt="<?php the_title(); ?>">
<?php } ?>	

<div class="carousel-caption"><?php the_content( ); ?></div>

<footer class="entry-meta"><?php edit_post_link( __( '<i class="fa fa-edit"></i>', 'djl' )); ?></footer><!-- .entry-meta -->