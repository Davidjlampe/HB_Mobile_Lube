<?php 
/*
* Template Name:  Home Page Template
*/
get_header();

?>

<main id="main-content" class="flex-grow">


<div class="container">	
 
	 	<div class="col-md-4">
	 		<div class="icon-wrapper">
		 		<div class="icon"><img src="<?php the_field('icon_one') ?>"></div>
		 		<div class="icon-text"><h4><?php the_field('icon_text_one') ?></h4></div>
		 	</div>	
	 	</div>
	 	<div class="col-md-4">
	 		<div class="icon-wrapper">
		 		<div class="icon"><img src="<?php the_field('icon_two') ?>"></div>
		 		<div class="icon-text"><h4><?php the_field('icon_text_two') ?></h4></div>
		 	</div>	
	 	</div>
	 	<div class="col-md-4">
	 		<div class="icon-wrapper">
		 		<div class="icon"><img src="<?php the_field('two') ?>"></div>
		 		<div class="icon-text"><h4><?php the_field('icon_text_two') ?></h4></div>
		 	</div>	
	 	</div>	 		 	
	</div>	
</div><!--  .container -->


<div class="container-fluid green">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>How it works</h2>
				<p><?php the_field('how_it_works_text') ?></p>

				<h5>Frequently Asked Questions</h5>
				
				    <div class="panel-group wrap" id="bs-collapse">

				      <div class="panel">
				        <div class="panel-heading">
				          <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#" href="#one">
				          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				        </a>
				      </h4>
				        </div>
				        <div id="one" class="panel-collapse collapse">
				          <div class="panel-body">
				            Where now are the horse and the rider? Where is the horn that was blowing? Where is the helm and the hauberk, and the bright hair flowing?
				          </div>
				        </div>

				      </div>
				      <!-- end of panel -->

				      <div class="panel">
				        <div class="panel-heading">
				          <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#" href="#two">
				         Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				        </a>
				      </h4>
				        </div>
				        <div id="two" class="panel-collapse collapse">
				          <div class="panel-body">
				            Where is the harp on the harpstring, and the red fire glowing? Where is the spring and the harvest and the tall corn growing?
				          </div>

				        </div>
				      </div>
				      <!-- end of panel -->

				      <div class="panel">
				        <div class="panel-heading">
				          <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#" href="#three">
				          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				        </a>
				      </h4>
				        </div>
				        <div id="three" class="panel-collapse collapse">
				          <div class="panel-body">
				            The days have gone down in the West behind the hills into shadow. Who shall gather the smoke of the deadwood burning, Or behold the flowing years from the Sea returning?
				          </div>
				        </div>
				      </div>
				      <!-- end of panel -->

				      <div class="panel">
				        <div class="panel-heading">
				          <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#" href="#four">
				         Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				        </a>
				      </h4>
				        </div>
				        <div id="four" class="panel-collapse collapse">
				          <div class="panel-body">
				            They have passed like rain on the mountain, like a wind in the meadow; The days have gone down in the West behind the hills into shadow.
				          </div>
				        </div>
				      </div> <!-- end of panel -->

				    </div><!-- end of #bs-collapse  -->
			</div>

	        <div class="col-md-4">
	                <div class="pricing-table">
	                    <div class="pricing-header">
	                    	<p class="pricing-header-title">OIL CHANGE</p>
	                        <p class="pricing-title"><?php the_field('oil_change_price', 'options') ?></p>
	                        <a href="#site-header" class="btn btn-primary btn-reverse">MAKE APPOINTMENT</a>
	                    </div>

	                    <div class="pricing-list">
	                        <ul>

								<?php

								// check if the repeater field has rows of data
								if( have_rows('pricing_detail', 'options') ):

								 	// loop through the rows of data
								    while ( have_rows('pricing_detail', 'options') ) : the_row();
										
								        echo '<li><i class="fa fa-wrench" aria-hidden="true"></i>';
								        the_sub_field('included_detail', 'options');
								        echo '</li>';

								    endwhile;

								else :

								    // no rows found

								endif;

								?>

	                        </ul>
	                    </div>
	                </div>
	        </div>

		</div> <!-- end of row -->	
	</div>	<!-- end of container -->
</div> <!-- end of container-fluid -->	

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="testimonial-wrapper">
				<div class="testimonial">
					<p><?php the_field('testimonial_one', 'options') ?></p>
					<span><?php the_field('testimonial_author_one','options') ?></span>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="testimonial-wrapper">
				<div class="testimonial">
					<p><?php the_field('testimonial_two', 'options') ?></p>
					<span><?php the_field('testimonial_author_two','options') ?></span>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container-fluid gray-gradient">
	<div class="container product-overview">
		<div class="row">
			<div class="col-md-6">
				<h2><?php the_field('overview_title') ?></h2>
				<p><?php the_field('overview_text') ?></p>
							<ul class="list-unstyled">
								<?php

								// check if the repeater field has rows of data
								if( have_rows('overview_list') ):

								 	// loop through the rows of data
								    while ( have_rows('overview_list') ) : the_row();
										
								        echo '<li><i class="fa fa-wrench" aria-hidden="true"></i>';
								        the_sub_field('overview_list_item');
								        echo '</li>';

								    endwhile;

								else :

								    // no rows found

								endif;

								?>
							</ul>

				<p class="disclaimer"><em>** <?php the_field('overview_disclaimer') ?></em></p>
				<a href="#site-header" class="btn btn-primary">BOOK APPOINTMENT</a>
			</div>
			<div class="col-md-6 overview-image">
				<img src="<?php the_field('overview_image') ?>">
			</div>
		</div>
	</div>
</div>


</div>
</main>
<?php get_footer(); ?>