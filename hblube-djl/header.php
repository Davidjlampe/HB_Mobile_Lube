<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title><?php wp_title( '|', true, 'right' ); // custom meta titles & descriptions added via djl-meta plugin ?></title>	
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" /> 	
<?php wp_head(); // all the css links are included via functions.php ?>
<!-- GA Code Here -->
</head>
<body <?php body_class('flex-column screen-height'); ?>>
<div class="container-fluid topbar">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-8"><p><a href="">FACEBOOK <i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#">VIEW OUR REVIEWS ON YELP <i class="fa fa-yelp" aria-hidden="true"></i></a></p></div>
	</div>
</div>
<header id="site-header">
	<?php get_template_part( 'inc/navbar'); ?>	
</header>
<?php 
get_template_part('inc/header-image'); ?>
 
