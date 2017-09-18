<?php


function djl_customize_register( $wp_customize ) {
    // $wp_customize->remove_section( 'colors' );
    // $wp_customize->remove_section( 'header_image' );
    // $wp_customize->remove_section( 'background_image' );

    // Setting group for selecting slider
   $wp_customize->add_section( 'djl_general_options' , array(
    'title'      => __('General Options','djl'),
    'priority'   => 30,
   ) );
   
   
   $wp_customize->add_section( 'djl_footer_options' , array(
    'title'      => __('Footer Options','djl'),
    'priority'   => 37,
   ) );


	
	$wp_customize->add_setting(
    'djl_attachment_commentform_visibility',
    array(
        'default' => 0 
    ));

    $wp_customize->add_control(
    'djl_attachment_commentform_visibility',
    array(
        'type' => 'checkbox',
        'label' => __('Allow Comments','djl'),
        'section' => 'djl_general_options',
		'priority' => '1',
        )
    );

	
	// Begin footer section
	$wp_customize->add_setting(
    'djl_copyright_textbox',
    array(
        'default' => __('Copyright &copy; 2014','djl'),
        'sanitize_callback' => 'wptexturize'
    ));
	
	$wp_customize->add_control(
    'djl_copyright_textbox',
    array(
        'label' => __('Copyright Text','djl'),
        'description' => __('Appended to the copyright date, which is automatically kept current','djl'),
        'section' => 'djl_footer_options',
        'type' => 'text',
    ));
	


	
}
add_action( 'customize_register', 'djl_customize_register' );