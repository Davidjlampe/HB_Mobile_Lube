<?php get_header();
$sidebarActive =  is_active_sidebar( 'aside-sidebar' ) ? true : false;
$mainWidth = $sidebarActive ? 8 : 12;
// if a widget sidebar or custom sidebar exists, the col size is set to 8, or 12 if neither is true
?>
<main id="main-content" class="flex-grow">
 <div class="container">
	<div class="row">
		<section class="col-md-<?php echo $mainWidth; ?>">
				<?php
					if ( have_posts() ) :
						// Start the Loop.
						while ( have_posts() ) : the_post();
							/*
							 * the layout of the content from the WYSIWYG editor on either pages or posts is edited in
							 * inc/content.php
							 */
							get_template_part('inc/content', get_post_type() ); 
		
						endwhile;
						// Previous/next post navigation.
							if ($wp_query->max_num_pages > 1) :
								get_template_part('inc/pagination');
							endif;
						else : 
							get_template_part('inc/content', 'none' ); // 404 message
						endif; ?>
		</section>
		<?php if ( $sidebarActive ) { get_sidebar(); } ?>
	</div><!--  .row -->
 </div><!--  .container -->
</main>
<?php get_footer(); ?>