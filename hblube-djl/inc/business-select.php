			<div id="close"><a href="#" onClick="document.getElementById('type').value='choose'" class="button">X</a></div>
			<select name='type' id="type">
			  <?
				
				echo "<option  value='choose'>Select your workplace</option>";

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

			  <?
				
			

			  global $product;

			  $args = array( 
			  	'post_type' => 'product',
			  	'product_cat' => 'location'
			  	 );

				  $loop = new WP_Query( $args );
				  while ( $loop->have_posts() ) : 
				      $loop->the_post();
				  	  echo '<div class="row" id="'.get_the_ID().'">';	  
				  	  echo do_shortcode('[booking id="'.get_the_ID().'"]');
				  	  echo "</div>";

				endwhile;

			  ?>


			</div>

