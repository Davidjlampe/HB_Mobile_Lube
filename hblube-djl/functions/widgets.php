<?php 
	function djl_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'djl' ),
		'id'            => 'aside-sidebar',
		'description'   => __( 'Main sidebar that appears beside content.', 'djl' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'djl' ),
		'id'            => 'aside-footer',
		'description'   => __( 'Appears in the footer section of the site.', 'djl' ),
		'before_widget' => '<aside id="%1$s" class="aside-footer col-xs-12 widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );



/*
*  Copy and un-comment the section below to create a new widget area
*
*  change the 'name', 'id', and 'description'.  Optionally change the class of the widget or the heading level of the title. 
*/



	// register_sidebar( array(
	// 	'name'          => __( 'New Widget Area', 'djl' ), 	 
	// 	'id'            => 'new-widget-id',
	// 	'description'   => __( 'Appears in the ... section of the site.', 'djl' ),
	// 	'before_widget' => '<aside id="%1$s" class="new-widget-id widget %2$s">',
	// 	'after_widget'  => '</aside>',
	// 	'before_title'  => '<h3 class="widget-title">',
	// 	'after_title'   => '</h3>',
	// ) );



}
add_action( 'widgets_init', 'djl_widgets_init' );
add_filter('widget_text', 'do_shortcode'); // lets you use shortcodes in the widget
add_filter('widget_nav_menu_args','djl_widget_nav_menu_args',99,3); // add .nav class to menus

function djl_widget_nav_menu_args($nav_menu_args, $nav_menu, $args, $instance){
	$nav_menu_args['menu_class'] = 'nav';
	$nav_menu_args['container'] = 'nav';
	// use icon walker in widget menus
		// if ($nav_menu->term_id == 5) {
		// 	$nav_menu_args = array(
		// 			'menu' => $nav_menu,
		//       'menu_class'		=>	'nav icon-nav list-inline',
		//       'container'       => 'nav',
		// 		 'container_class' => 'social-media',
		//       'depth'			=>	0,
		//       'fallback_cb'	=>	false,
		//       'walker'			=>	new icon_Nav_Walker
		//   );
		// } 
	return $nav_menu_args;
}