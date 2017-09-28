<?php
//
wp_enqueue_script('parallax', get_template_directory_uri() . '/js/vendor/parallax.min.js',array( 'jquery' ),'3.1.1',true );
?>
<div class="header-image parallax_effect" 
style="background-image: url(<?php the_field('header_image'); // need to add this custom field, output type is url  ?>)"
data-stellar-background-ratio="0.6"
data-stellar-vertical-offset="150"
></div>



		
      
        