<?php
// Slider for post type 'slide' 
$gallery = get_field('choose_slide_gallery');
$tax_query = $gallery ? array(array('taxonomy'=>'slide-gallery','field'=>'slug','terms'=>$gallery->slug)) : array();
?>
<div id="motion" class="carousel slide <?php the_field('slide_transition');?>" 
	data-ride="carousel" 
	data-interval="<?php the_field('slide_delay');?>"
	data-pause="<?php echo get_field('pause_on_hover') ? 'hover' : 'false';?>"> 
  <div class="container">      
      <div class="carousel-inner">
      <?php // begin template for each slide -----------------------------//
      	  $firstClass = 'active';
      	  $slidjld = 0;
        	$indicators= ''; 
        	$slide_query = new WP_Query(array(
					'post_type'  => 'slide',
					'tax_query' => $tax_query,
	        'orderby'       => 'menu_order',
	        'order'         => 'ASC'
					)); // 'slide-gallery' => optionally add the slug of a specific gallery to the 'slide-gallery'  
			if ($slide_query->have_posts()) : while ($slide_query->have_posts()) : $slide_query->the_post(); ?>
	        <div class="item <?php echo $firstClass; ?>" id="slide<?php echo $slidjld ?>">
						<?php get_template_part('inc/content-slide'); ?>
	        </div><!--  item -->
			<?php 
					$indicators .= '<li data-target="#motion" data-slide-to="'.$slidjld.'" class="'.$firstClass.'"></li>';
				  $firstClass = "";
	        $slidjld += 1; endwhile; endif; wp_reset_query(); 
	        ?> 
      </div><!-- carousel-inner -->
      <?php 
      if ($slidjld > 1): // only show arrows and dots if there is more than one slide
      echo '<ol class="carousel-indicators">'.$indicators.'</ol>'; ?>
      <a class="left carousel-control" href="#motion" role="button" data-slide="prev"><span class="left fa fa-angle-left"></span></a>
      <a class="right carousel-control" href="#motion" role="button" data-slide="next"><span class="right fa fa-angle-right"></span></a>
    	<?php endif; ?>
  </div><!-- container -->
</div><!-- /.carousel -->   