<?php
//
// Theme functions - with links to wordpress documentation on each
//

if ( ! function_exists( 'djl_setup' ) ) :
//Set up theme defaults and registers support for various WordPress features. 
function djl_setup() {
	add_theme_support( 'custom-logo', array(
	//	'width'       => 200, // ideally double the display width for HD screens
    //  'height'      => 200, // ideally double the display height for HD screens
	//	'flex-height' => false, // force exact cropping
	//	'flex-width'  => false, // force exact cropping
	)); 
	
	if ( ! isset( $content_width ) ) $content_width = 900;
	add_theme_support( 'post-thumbnails' );// Enable support for Post Thumbnails, and declare sizes.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );// Add RSS feed links to <head> for posts and comments.
	set_post_thumbnail_size( 480, 320, true ); //http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	
 
	//http://codex.wordpress.org/Function_Reference/add_image_size
	add_image_size( 'carousel-lg', 1170, 500, true ); //used for large slide
	add_image_size( 'carousel-sm', 768, 328, true ); // used for small slide, proportional to carousel-lg
	

	// This theme uses wp_nav_menu() in two locations. http://codex.wordpress.org/Function_Reference/register_nav_menus
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'djl' ),
		'icons' => __( 'Social Media - Links Display as icons', 'djl' ),
	) );

	// editor ------  http://codex.wordpress.org/Function_Reference/add_editor_style
	add_editor_style( get_template_directory_uri().'/css/editor-style.css' ); // custom styles for admin page/post editor - seems to only work when kept in template root

}	
endif; // djl_setup
add_action( 'after_setup_theme', 'djl_setup' );



remove_filter( 'the_content', 'wpautop' );

function djl_add_async_forscript($url)
{
    if (strpos($url, '#asyncload')===false)
        return $url;
    else if (is_admin())
        return str_replace('#asyncload', '', $url);
    else
        return str_replace('#asyncload', '', $url)."' async='async"; 
}
add_filter('clean_url', 'djl_add_async_forscript', 11, 1);


function djl_theme_scripts()  {

    // stylesheets ----  http://codex.wordpress.org/Function_Reference/wp_enqueue_style
    wp_enqueue_style('main.min.css', get_template_directory_uri() . '/css/main.min.css', array(), '1', 'all' ); //complied bootstrap and theme styles
    //wp_enqueue_style('fonts.css', get_template_directory_uri() . '/fonts/fonts.css', array(), '1', 'all' );
    //wp_enqueue_style('googlefonts.css', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700', array(), '1', 'all' );
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' ); // theme description and supplementary styles
				
		//scripts   ----     http://codex.wordpress.org/Function_Reference/wp_enqueue_script
		//wp_enqueue_script('picturefill-js', get_template_directory_uri() . '/js/vendor/picturefill.min.js#asyncload', array(),'2.3.1');
		wp_enqueue_script('modernizr-js', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js#asyncload', array(),'2.8.3');
		wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/vendor/bootstrap.js', array( 'jquery' ),'3.3.6',true );
        wp_enqueue_script('bootstrap-gravity-js', get_template_directory_uri() . '/js/vendor/bootstrap-gravity-forms.min.js', array( 'jquery' ),'1.0',true );   
        //wp_enqueue_script('carquery-api-js', 'https://www.carqueryapi.com/js/carquery.0.3.4.js', array('jquery'), '0.3.4', false);     
		wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ),'1.0',true );
}
add_action('wp_enqueue_scripts', 'djl_theme_scripts');

//More Customization 

require get_template_directory() . '/functions/widgets.php'; // add/edit widget areas
require get_template_directory() . '/functions/nav-walker.php'; // bootstrapped navbar
require get_template_directory() . '/functions/customizer.php'; // choose options for customize screen 
require get_template_directory() . '/functions/restrictions.php'; // remove unsed admin areas 
if (class_exists('Woocommerce')) require get_template_directory() . '/functions/woocommerce-functions.php'; 


//Custom Shorcodes
//custom shortcodes have moved to plugins folder - activate individually

//Custom Postypes
//custom postypes have moved to plugins folder - be sure to activate the slides post type

//Meta Info
//meta title and descriptions have been moved to djl-meta plugin

//Woocommerce Support
// only call these functions if Woocommerce is activated
//if (class_exists('Woocommerce')) require get_template_directory() . '/functions/woocommerce-functions.php'; 


// Clean up the <head>
function removeHeadLinks() {   
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3);
    remove_action( 'wp_head', 'rsd_link');
    remove_action( 'wp_head', 'wlwmanifest_link');
    remove_action( 'wp_head', 'wp_generator');  
    remove_action( 'wp_head', 'rel_canonical');
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
}
add_action('init', 'removeHeadLinks');
 
if (! function_exists('get_field')){
	function djl_my_admin_notice(){
	    echo '<div class="error">
	       <p>Advanced Custom Fields in inactive. Please re-activate to prevent errors in the current theme!</p>
	    </div>';
	}
	add_action('admin_notices', 'djl_my_admin_notice');
}
 
// custom post excerpt on the fly, use echo custom_excerpt(40, 'Read More'); // change 40 to desired length
function custom_excerpt($new_length = 20, $new_more = '...') {
  add_filter('excerpt_length', function () use ($new_length) { return $new_length; }, 999);
  add_filter('excerpt_more', function () use ($new_more) { return $new_more; });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  return $output;
}

add_filter('get_custom_logo','djl_custom_logo', 99,2 );
function djl_custom_logo($html, $blog_id){
		if ( is_multisite() && (int) $blog_id !== get_current_blog_id() ) {
        switch_to_blog( $blog_id );
    }
    $custom_logo_id = get_theme_mod( 'custom_logo' );

    // We have a logo. Logo is go.
    if ( $custom_logo_id ) {
        $html =  wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'logo',
                'itemprop' => 'logo',
            ));
    } 
    return $html;
}

function djl_login_logo_url() {
	return home_url( );	 
}
add_filter( 'login_headerurl', 'djl_login_logo_url' );
function djl_login_logo() { 
		$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id );
	?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo $logo[0]; ?>);
            padding-bottom: 0;
            background-size: contain;
            display: block;
            width: 100%;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'djl_login_logo' );


function djl_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'djl_login_logo_url_title' );

function remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');


add_filter('woocommerce_create_account_default_checked' , function ($checked){
    return true;
});

// Add ACF 5 Options Page
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page();
  
}
