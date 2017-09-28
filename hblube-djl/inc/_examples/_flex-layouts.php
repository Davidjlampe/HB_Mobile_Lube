<?php

// check if the flexible content field has rows of data


if( have_rows('flexible_content') ):
 	// loop through the rows of data
    while ( have_rows('flexible_content') ) : the_row(); 
  	$screen = get_sub_field('screen_size'); 
		$justify = get_sub_field('justify') ? ' justify-'.get_sub_field('justify') : ' ';
		$wrap = get_sub_field('wrap') ? ' flex-'.get_sub_field('wrap') : '';
		$gutters = get_sub_field('gutters') ? ' gutters ' : ' ';
		$items = get_sub_field('items'); 
			if ($items) {
  		echo '<section class="flex-column '.($screen ? 'flex-row-'.$screen : '').$gutters.$justify.$wrap.' '.get_sub_field('classes').'">';
  			foreach ($items as $item) {
  					printf('<div class="item %1$s %2$s">%3$s</div>',
  						($item['size'] == 'auto' ? ' ' : 'flex-'.$screen.'-'.$item['size'] ),
  						$item['classes'],
  						$item['content']
  						);
   			}
  		echo '</section>';
  		}
		endwhile; 
endif;
?>