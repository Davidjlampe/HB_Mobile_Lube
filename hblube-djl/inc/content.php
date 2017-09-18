<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php   if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;		?>
	</header><!-- .entry-header -->


	<?php if ( is_single() ) : ?>
		<div class="entry-content">
			<?php the_post_thumbnail(); ?>
			<?php  the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'djl' ) );	?>
		</div><!-- .entry-content -->
	<?php else : ?>
		<div class="entry-summary">
			<?php the_post_thumbnail(); ?>
			<?php echo custom_excerpt(60, ' <a href="'.esc_url( get_permalink() ).'" class="more">Read More</a>'); ?>
		</div><!-- .entry-summary -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php 
			if ( in_array( 'category', get_object_taxonomies( get_post_type() )) ): 
					echo '<div class="entry-meta">';
						 echo '<span class="cat-links">'.get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'djl' ) ) .'</span>';
					echo '</div>'; 
			endif;	
			the_tags( '<span class="tag-links">', '', '</span>' ); 
			?>
		<?php 
		if ( get_theme_mod( 'djl_attachment_commentform_visibility' ) == 1 && is_single() && ! is_attachment() ) { 
			comments_template('inc/comments.php');
			}
		?>

	<?php edit_post_link( __( '<i class="fa fa-edit"></i>', 'djl' )); ?>	
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
