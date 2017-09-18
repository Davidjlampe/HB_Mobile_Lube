<?php
/**
 * The template for displaying page content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php  if ( get_field('show_page_title') == true) { the_title( '<h1 class="entry-title">', '</h1>' );} ?>
	</header><!-- .entry-header -->
 
		<div class="entry-content">
			<?php // the_post_thumbnail(); ?>
			<?php  the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'djl' ) );	?>
			<?php if (have_rows('responsive_content_layouts')) get_template_part('inc/responsive-content-layouts' ); ?>
			<?php //if (have_rows('flexible_content')) get_template_part('inc/flex-layouts' ); ?>
		</div><!-- .entry-content -->
	 


	<footer class="entry-meta">
		<?php 
		wp_link_pages( array(
				'before'      => '<nav class="page-links"><span class="page-links-title">' . __( 'Pages:', 'djl' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
		) );

		edit_post_link( __( '<i class="fa fa-edit"></i>', 'djl' )); 
		?>	
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
