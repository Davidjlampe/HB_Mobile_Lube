<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

$sidebarActive =  is_active_sidebar( 'aside-sidebar' ) ? true : false;
// if either the widget area or a custom sidbar is active
$mainWidth = $sidebarActive ? 8 : 12;
// if a widget sidebar or custom sidebar exists, the col size is set to 8, or 12 if neither is true
?>
<main id="main-content">
 <div class="container">
	<div class="row">
		<section class="col-md-<?php echo $mainWidth; ?>">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );

	?>

		<?php 

		if (is_product_category( 'location' )) {

		echo "<h1>This is a product page</h1>";	




		}
			else {

		while ( have_posts() ) : the_post(); 

		wc_get_template_part( 'content', 'single-product' );

		endwhile; // end of the loop. 				

			}
	







?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	<?php if ( $sidebarActive ) get_sidebar('shop'); ?>

	</div><!--  .row -->
 </div><!--  .container -->
</main>
<?php get_footer( 'shop' ); ?>
