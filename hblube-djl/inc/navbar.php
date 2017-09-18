<div class="container">
	<nav class="navbar">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo esc_url( home_url( '/' ) );?>" class="navbar-brand" rel="home" itemprop="url">
      <?php 
      // custom logo upload, upload and crop logo in 'Customize' screen
      // edit cropping dimensions in functions.php line 9-14
      the_custom_logo(); ?>
      <?php bloginfo('name'); ?>
      </a>
    </div>
    <div class="navbar-collapse collapse">
      <?php wp_nav_menu( array(
         'theme_location'	=> 'primary',
         'menu_class'		=>	'nav navbar-nav',
         'container'       => '',
         'depth'			=>	0,
         'fallback_cb'	=>	false,
         'walker'			=>	new djl_Nav_Walker
         )); // generates the ul
        ?>
    </div><!--/.navbar-collapse -->
	</nav><!-- navbar -->
</div>
