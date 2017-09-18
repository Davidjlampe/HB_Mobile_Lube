
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
					
				</div>
				<div class="row " id="1123">
					<?php echo do_shortcode('[booking id="1123"]'); ?>
				</div>
				<div class="row" id="1196">
						<?php echo do_shortcode('[booking id="1196"]'); ?>
				</div>

			</div>

