<?php
/**
 *
 * Uses repeater field 
 *
 */
?>

<?php if( have_rows('cta') ): ?>
<section id="cta-content">
	<div class="container">
		<div class="row">

			<?php while( have_rows('cta') ): the_row(); 

				// vars
				$image = get_sub_field('image');
				$title = get_sub_field('title');
				$content = get_sub_field('text');
				$link = get_sub_field('link');

				?>

				<div class="col-sm-4">
					<div class="cta-inner">
					<?php if( $link ){ echo '<a href="'.$link.'">'; } ?>
						<?php if( $image ) { echo '<img src="'.$image['sizes']['thumbnail'].'" alt="'.$image['alt'].'" />'; } ?>
					<?php if( $link ){ echo '</a>'; } ?>

					<?php if( $title ): ?>
						<h3><?php echo $title; ?></h3>
					<?php endif; ?>
					
					<?php if( $content ): ?>
						<p><?php echo $content; ?></p>
					<?php endif; ?>
					
					<?php if( $link ){ echo '<a href="'.$link.'">More </a>'; } ?>
					
					</div><!-- cta-inner -->
				</div> <!-- col -->

			<?php endwhile; ?>

	</div> <!-- row -->
	</div> <!-- container -->
</section>
<?php endif; ?>