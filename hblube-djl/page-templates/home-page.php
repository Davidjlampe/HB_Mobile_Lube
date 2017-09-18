<?php 
/*
* Template Name:  Home Page Template
*/
get_header();

?>

<main id="main-content" class="flex-grow">


<div class="container">	
 
	 	<div class="col-md-12">
	 		<?php the_field('description'); ?>
	 	</div>
	</div>	
</div><!--  .container -->


<div class="containerowner">
	<div class="row">
		<div class="col-md-3">
			
			<?php if( get_field('owner_profile_image') ): ?>

				<!-- <img src="<?php the_field('owner_profile_image'); ?>" /> -->

			<?php endif; ?>

		</div>
		<div class="col-md-8">

			<strong><?php the_field('owner_name'); ?></strong><br>
			<?php the_field('owner_description'); ?>						

		</div>
	</div>
</div>
</div>
</main>
<?php get_footer(); ?>