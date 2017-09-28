<?php 
/*
* ******************** Examples ************************
*/

?>
 

<?php 
/*
* ******************** Includes ************************
* I generally like to make any group of custom fields or major sections of the layout into includes
* ex four boxes on homepage would go in 'inc/four-boxes.php'
*/

// the wordpress function: 
get_template_part('inc/four-boxes');  
// is just a way of saying 
include('inc/four-boxes.php');
// but it will look in the theme folder rather than the root. note that you don't need the .php part


/*
* ************** More Advanced ***********
*/
// you can pass in another argument to the get_template_part() function
// ex 
get_template_part( 'inc/slider', 'alt' );

// wordpress will look for a file called 'slider-alt.php' in your theme's inc/ folder
// if it cant find that, it will use 'slider.php'

// the second argument can be a function
// ex
get_template_part( 'inc/slider', get_post_type() );

// in this case, if you are on a 'page' wordpress will look for a file called 'slider-page.php' in your theme's inc/ folder
// if you are on a 'post' wordpress will look for a file called 'slider-post.php' and so on
// if it cant find that, it will use 'slider.php'

// this can be usefull to create different versions of a layout for different applications. 
// for example, maybe you want the slides on a post cropped differently because there is a sidebar


/*
* ******* more info *******    https://codex.wordpress.org/Function_Reference/get_template_part
*/
?>



<?php 
/*
* ******************** Conditionals ************************
* I'll usually create a custom field of type true/false
* to choose whether to include a layou section
*/
 
// slider example
// custom true/false field called 'show_slider'

if (get_field('show_slider') == true ) {
	get_template_part('inc/slider');
}



/*
* ************** More Advanced ***********
*/

// if you want to show a different option when they chose false, say a static header image

if (get_field('show_slider') == true ) {
	get_template_part('inc/slider');
} else {
	get_template_part('inc/header-image');
}

/*
* ************** Even More Advanced ***********
*/

// if you want to let them choose between a slider, a static header image, or no header 
// instead of a true/false field, use a radio button with three choices: 'slider', 'image', or 'none'
// then use this in your template:

if (get_field('show_header') == 'slider' ) {
	get_template_part('inc/slider');
} elseif (get_field('show_header') == 'image' ) {
	get_template_part('inc/header-image');
} else {
	// fine then, why did we even bother designing you a nice website then you little jerk!!!!
	// haha you won't see this comment because it's in php
	// unless you look in the editor in wordpress, better just use the code below...
}


if (get_field('show_header') == 'slider' ) {
	get_template_part('inc/slider');
} elseif (get_field('show_header') == 'image' ) {
	get_template_part('inc/header-image');
} 
// no else needed if we're doing nothing


/*
* ******* more info *******    http://www.advancedcustomfields.com/resources/true-false/
* ******* more info *******    http://www.advancedcustomfields.com/resources/select/
*/
?>





<?php 
/*
* ********************  Functions vs Templates  ************************
*  when do you put code in the 'functions.php' file
*  and when to put it in the template files
*/

// wordpress has many functions available to modify it's behavior. they call them 'actions', 'hooks'



?>