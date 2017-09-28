<?php 
/*
* Template Name:  FAQ Template
*/
get_header();

?>

<main id="main-content" class="flex-grow">


<div class="container">	
	<div class="row">
	 	<div class="col-md-12">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<?php  if ( get_field('show_page_title') == true) { the_title( '<h1 class="entry-title">', '</h1>' );} ?>
				</header><!-- .entry-header -->
			 
					<div class="entry-content">
						<?php // the_post_thumbnail(); ?>
						<?php  the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'djl' ) );	?>
						<?php if (have_rows('responsive_content_layouts')) get_template_part('inc/responsive-content-layouts' ); ?>
						<?php //if (have_rows('flexible_content')) get_template_part('inc/flex-layouts' ); ?>


					<h2>Frequently Asked Questions</h2>
				
				    <div class="panel-group wrap" id="bs-collapse">

					
					<?php if(get_field('frequently_asked_questions')): $i = 0; ?>
					 
						<?php while(has_sub_field('frequently_asked_questions')): $i++; ?>
							

					      <div class="panel">
					        <div class="panel-heading">
					          <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#" href="#<?php echo $i; ?>">
					          <?php the_sub_field('faq_title'); ?>
					        </a>
					      </h4>
					        </div>
					        <div id="<?php echo $i; ?>" class="panel-collapse collapse">
					          <div class="panel-body">
					            <?php the_sub_field('faq_text');


								$chckbox_value = get_sub_field('faq_link_checkbox');
								if( $chckbox_value && in_array( 'Yes', get_sub_field('faq_link_checkbox') ) )
								{ ?>
									<p><strong><a href="<?php the_sub_field('faq_internal_link'); ?><?php the_sub_field('faq_external_link'); ?>">LEARN MORE</a></strong></p>
								<?php } ?>								




					          </div>
					        </div>

					      </div>
					      <!-- end of panel -->
					 
						<?php endwhile; ?>
					 
					<?php endif; ?>				 
				</div>

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

	 		
	 		
	 	</div>
	 </div> 
</div>
</main>
<?php get_footer(); ?>