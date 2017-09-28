<?php
/**
 * The template for displaying page content
 *
 */
?>

<article id="404" <?php post_class(); ?>>

	<header class="entry-header">
		<h1>Sorry...</h1>
	</header><!-- .entry-header -->
 
	<div class="entry-content">
		<p>It looks like the page you are looking for has moved, please choose from the menu or try searching:</p>
		<?php get_search_form(true); ?>
	</div><!-- .entry-content -->	

</article><!-- #post-## -->
