<?php 
/*
* Template Name:  Home Page Template
*/
get_header();
// if a widget sidebar or custom sidebar exists, the col size is set to 8, or 12 if neither is true
?>
<?php if (get_field('show_home_cta')) get_template_part('inc/home-cta' ); ?>
<main id="main-content" class="flex-grow">
<div class="container">	
 <div class="container">
 	<div class="row">
	 	<div class="col-md-6">
	 		<div class="col-xs-2 icon"></div>
	 		<div class="col-xs-2 icon"></div>
	 		<div class="col-xs-2 icon"></div>
	 	</div>
	 	<div class="col-md-6">
	 		<div class="col-xs-2 icon"></div>
	 		<div class="col-xs-2 icon"></div>
	 		<div class="col-xs-2 icon"></div>
	 	</div>	 	
	</div>
 	<div class="row">
	 	<div class="col-md-12">
	 		<?php the_field('description'); ?>
	 	</div>
	</div>	
</div><!--  .container -->

<div class="container-fluid gallery">
	<div class="row">
		<div class="col-md-12"></div>

		<select name='type' id="type">
		  <?
			
			echo "<option  value='choose'>Select your business</option>";

		  global $product;

		  $args = array( 
		  	'post_type' => 'product',
		  	'product_cat' => 'location'
		  	 );

			  $loop = new WP_Query( $args );
			  while ( $loop->have_posts() ) : 
			      $loop->the_post();
			  		  
			      echo '<option  value="'.get_the_ID().'">'.get_field('location').'</option>';

			endwhile;

		  ?>
		</select>


<div class="home-hero-products">

	<div class="row" id="choose">
		<h3>Choose a business</h3>
	</div>
	<div class="row " id="1123">
		<?php echo do_shortcode('[booking id="1123"]'); ?>
	</div>
	<div class="row" id="1196">
			<?php echo do_shortcode('[booking id="1196"]'); ?>
	</div>

</div>


	</div>
</div>



<div class="container-fluid owner">
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