<?php

// check if the flexible content field has rows of data
if( have_rows('responsive_content_layouts') ):

 	// loop through the rows of data
    while ( have_rows('responsive_content_layouts') ) : the_row(); ?>
				


			<?php	if( get_row_layout() == 'full_width' ): // check current row layout ?>


				<section class="row">
					<div class="col-sm-12">
						<?php the_sub_field('content_full');  ?>
					</div>
				</section>

			<?php	elseif( get_row_layout() == 'two_equal_columns' ): // check current row layout ?>


				<section class="row">
					<div class="col-sm-6 content_left">
						<?php the_sub_field('content_left');  ?>
					</div>
					<div class="col-sm-6 content_right">
						<?php the_sub_field('content_right'); ?>
					</div>
				</section>	


			<?php	elseif( get_row_layout() == 'three_equal_columns' ): // check current row layout ?>


				<section class="row">
					<div class="col-sm-4 content_left">
						<?php the_sub_field('content_left');  ?>
					</div>
					<div class="col-sm-4 content_middle">
						<?php the_sub_field('content_middle');  ?>
					</div>
					<div class="col-sm-4 content_right">
						<?php the_sub_field('content_right'); ?>
					</div>

				</section>

			<?php	elseif( get_row_layout() == 'four_equal_columns' ): // check current row layout ?>


				<section class="row">
					<div class="col-sm-3 content_first">
						<?php the_sub_field('content_first');  ?>
					</div>
					<div class="col-sm-3 content_second">
						<?php the_sub_field('content_second');  ?>
					</div>
					<div class="col-sm-3 content_third">
						<?php the_sub_field('content_third'); ?>
					</div>
					<div class="col-sm-3 content_fourth">
						<?php the_sub_field('content_fourth'); ?>
					</div>

				</section>	

			<?php elseif( get_row_layout() == 'left5_right7' ): // check current row layout ?>

				<section class="row">
					<div class="col-sm-5 content_left">
						<?php the_sub_field('content_left'); ?>
					</div>
					<div class="col-sm-7 content_right">
						<?php the_sub_field('content_right'); ?>
					</div>
				</section>

			<?php elseif( get_row_layout() == 'left7_right5' ): // check current row layout ?>

				<section class="row">
					<div class="col-sm-7 content_left">
						<?php the_sub_field('content_left'); ?>
					</div>
					<div class="col-sm-5 content_right">
						<?php the_sub_field('content_right'); ?>
					</div>
				</section>	
		
       <?php elseif( get_row_layout() == 'left4_right8' ): // check current row layout ?>

				<section class="row">
					<div class="col-sm-4 content_left">
						<?php the_sub_field('content_left'); ?>
					</div>
					<div class="col-sm-8 content_right">
						<?php the_sub_field('content_right'); ?>
					</div>
				</section>

			<?php elseif( get_row_layout() == 'left8_right4' ): // check current row layout ?>

				<section class="row">
					<div class="col-sm-8 content_left">
						<?php the_sub_field('content_left'); ?>
					</div>
					<div class="col-sm-4 content_right">
						<?php the_sub_field('content_right'); ?>
					</div>
				</section>

			<?php elseif( get_row_layout() == 'left3_right9' ): // check current row layout ?>

				<section class="row">
					<div class="col-sm-3 content_left">
						<?php the_sub_field('content_left'); ?>
					</div>
					<div class="col-sm-9 content_right">
						<?php the_sub_field('content_right'); ?>
					</div>
				</section>


			<?php elseif( get_row_layout() == 'left9_right3' ): // check current row layout ?>

				<section class="row">
					<div class="col-sm-9 content_left">
						<?php the_sub_field('content_left'); ?>
					</div>
					<div class="col-sm-3 content_right">
						<?php the_sub_field('content_right'); ?>
					</div>
				</section>	

			<?php 

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>