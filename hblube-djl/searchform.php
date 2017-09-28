<?php 
// This will be used as the search template wherever the search shows up, in a widget, or in the template by using the following hook:
// get_search_form( true );  
//
?>
<form method="get" id="searchform" action="<?php echo home_url(); ?>/" class="form-inline">
	<div class="form-group">
    <label class="sr-only" for="exampleInputAmount"  for="s"><?php _e('Search:', 'djl'); ?></label>
 		<div class="input-group">
			<input type="text" class="form-control"  value="<?php the_search_query(); ?>" placeholder="Search:" name="s" id="s" />
		</div>
		
		<button type="submit" id="searchsubmit" class="btn btn-primary"><i class="fa fa-search"></i></button>
  </div>
</form>