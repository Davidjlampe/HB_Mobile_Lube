<?php 
/*
* Template Name:  Home Page Template
*/
get_header();

?>

<main id="main-content" class="flex-grow">


<div class="container">	
 
	 	<div class="col-md-4">
	 		<div class="icon"><img src="<?php the_field('icon_one') ?>"></div>
	 		<div class="icon-text"><?php the_field('icon_text_one') ?></div>
	 	</div>
	 	<div class="col-md-4">
	 		<div class="icon"><img src="<?php the_field('icon_two') ?>"></div>
	 		<div class="icon-text"><?php the_field('icon_text_two') ?></div>
	 	</div>
	 	<div class="col-md-4">
	 		<div class="icon"><img src="<?php the_field('icon_three') ?>"></div>
	 		<div class="icon-text"><?php the_field('icon_text_three') ?></div>
	 	</div>	 		 	
	</div>	
</div><!--  .container -->


<div class="container-fluid green">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>How it works</h2>
				<p><?php the_field('how_it_works_text') ?></p>
				
				    <div class="panel-group wrap" id="bs-collapse">

				      <div class="panel">
				        <div class="panel-heading">
				          <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#" href="#one">
				          Collapse item #1
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
				         Collapse item #2
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
				          Collapse item #3
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
				         Collapse item #4
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
	                        <p class="pricing-title"><?php the_field('oil_change_price', 'options') ?></p>
	                        <a href="#site-header" class="btn btn-primary btn-reverse">BOOK APOINTMENT</a>
	                    </div>

	                    <div class="pricing-list">
	                        <ul>
								<?php
								if( have_rows('pricing_detail', 'options') ):
								    while ( have_rows('pricing_detail', 'options') ) : the_row();
	                            	echo '<li><i class="fa fa-wrench"></i>' . the_sub_field('included_detail', 'options') . '</li>';
								    endwhile;
								else :
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
	<div class="container prodict-overview">
		<div class="row">
			<div class="col-md-6">
				<h2><?php the_field('overview_title') ?></h2>
				<p><?php the_field('overview_text') ?></p>
				<?php
					if( have_rows('overview_list') ):
						while ( have_rows('overview_list') ) : the_row();
	                    echo '<li><i class="fa fa-wrench"></i>' . the_sub_field('overview_list_item') . '</li>';
						endwhile;
						else :
					endif;
				?>				
				<p class="disclaimer"><?php the_field('overview_disclaimer') ?></p>
				<a href="#site-header" class="btn btn-primary">BOOK APOINTMENT</a>
			</div>
			<div class="col-md-6 image">
				<img src="<?php the_field('overview_image') ?>">
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="additional-service-icon"><img src="<?php the_field('additional_service_icon_one') ?>"></div>
			<div class="additional-service-title"><h2><?php the_field('additional_service_headline_one') ?></h2></div>
			<p><?php the_field('additional_service_text_one') ?></p>
			<a href="<?php the_field('additional_service_link_one') ?>"><?php the_field('additional_service_link_text_one') ?></a>
			
		</div>
		<div class="col-md-6">
			<div class="additional-service-icon"><img src="<?php the_field('additional_service_icon_two') ?>"></div>
			<div class="additional-service-title"><h2><?php the_field('additional_service_headline_two') ?></h2></div>
			<p><?php the_field('additional_service_text_two') ?></p>
			<a href="<?php the_field('additional_service_link_one') ?>"><?php the_field('additional_service_link_text_two') ?></a>
			
		</div>		
	</div>
</div>


</div>
</main>
<?php get_footer(); ?>