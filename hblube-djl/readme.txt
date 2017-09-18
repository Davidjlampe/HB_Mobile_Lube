## Links and Urls in theme files

never hard code links or filepaths into files. instead use one of these examples:

### links to content
the id of a post/page/category/attachment will be in the url when editing that item.
using esc_url() will clean the link of funky characters, needs to be echoed to show up

<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Link to Homepage</a> 
<a href="<?php echo esc_url( get_permalink(1)); ?>">Link to specific post with ID of 1</a>
<a href="<?php echo esc_url( get_page_link(2)); ?>">Link to specific page with ID of 2</a>
<a href="<?php echo esc_url( get_page_link(2)); ?>">Link to specific page with ID of 2</a>
<a href="<?php echo esc_url( get_category_link( 10 )); ?> ">Link to the category with ID of 10</a>
<a href="<?php echo esc_url( get_post_type_archive_link( 'product' )); ?>">Link to 'Product' post type archive</a>

custom taxonomies
get_term_link( $term, $taxonomy ); 
Ex:
<a href="<?php echo esc_url( get_term_link( 'books', 'product_cat' )); ?>">Link to 'Books' category of Woocommerce Products</a>


### links to files
 get_template_directory_uri();  
 - will get the path to the theme, needs to be echoed to show up
Ex:
<img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">