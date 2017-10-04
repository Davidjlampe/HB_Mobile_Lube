<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php post_class(); ?>>
	<?php



	do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	
<form class="cart" method="post" enctype='multipart/form-data'>

	<div id="wc-bookings-booking-form" class="wc-bookings-booking-form row" style="display:none">

		<div class="col-xs-10 col-xs-offset-1">

			<?php do_action( 'woocommerce_before_booking_form' ); ?>


			<?php 
			$booking_form = new WC_Booking_Form( $product );

			$booking_form->output(); ?>

			<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

			

			
				
	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( is_callable( array( $product, 'get_id' ) ) ? $product->get_id() : $product->id ); ?>" class="wc-booking-product-id" />

	<button type="submit" class="wc-bookings-booking-form-button single_add_to_cart_button button alt disabled" style="display:none"><?php echo $product->single_add_to_cart_text(); ?></button>

			


		</div> <!--End of col-sm-12 -->	

	
	</div>
	

<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

	
</li>
