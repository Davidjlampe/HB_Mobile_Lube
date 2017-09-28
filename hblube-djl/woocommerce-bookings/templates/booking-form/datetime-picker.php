<?php
wp_enqueue_script( 'wc-bookings-date-picker' );
wp_enqueue_script( 'wc-bookings-time-picker' );
extract( $field );

$month_before_day = strpos( __( 'F j, Y' ), 'F' ) < strpos( __( 'F j, Y' ), 'j' );
?>

<?php
if ( is_page_template( 'home-page.php' ) ) {
   echo "This is the home page";
} else {
    // This is not the blog posts index
    echo "This is probs the single product page";
}
?>

<fieldset class="wc-bookings-date-picker col-sm-6 <?php echo implode( ' ', $class ); ?>">

	<div class="picker" data-display="<?php echo $display; ?>" data-availability="<?php echo esc_attr( json_encode( $availability_rules ) ); ?>" data-default-availability="<?php echo $default_availability ? 'true' : 'false'; ?>" data-fully-booked-days="<?php echo esc_attr( json_encode( $fully_booked_days ) ); ?>" data-partially-booked-days="<?php echo esc_attr( json_encode( $partially_booked_days ) ); ?>" data-restricted-days="<?php echo esc_attr( json_encode( $restricted_days ) ); ?>" data-min_date="<?php echo ! empty( $min_date_js ) ? $min_date_js : 0; ?>" data-max_date="<?php echo $max_date_js; ?>" data-default_date="<?php echo esc_attr( $default_date ); ?>"></div>
	<div class="wc-bookings-date-picker-date-fields">
		<?php 
		// woocommerce_bookings_mdy_format filter to choose between month/day/year and day/month/year format
		if ( $month_before_day && apply_filters( 'woocommerce_bookings_mdy_format', true ) ) : ?>
		<label>
			<input type="text" name="<?php echo $name; ?>_month" placeholder="<?php _e( 'mm', 'woocommerce-bookings' ); ?>" size="2" class="required_for_calculation booking_date_month" />
			<span><?php _e( 'Month', 'woocommerce-bookings' ); ?></span>
		</label> / <label>
			<input type="text" name="<?php echo $name; ?>_day" placeholder="<?php _e( 'dd', 'woocommerce-bookings' ); ?>" size="2" class="required_for_calculation booking_date_day" />
			<span><?php _e( 'Day', 'woocommerce-bookings' ); ?></span>
		</label>
		<?php else : ?>
		<label>
			<input type="text" name="<?php echo $name; ?>_day" placeholder="<?php _e( 'dd', 'woocommerce-bookings' ); ?>" size="2" class="required_for_calculation booking_date_day" />
			<span><?php _e( 'Day', 'woocommerce-bookings' ); ?></span>
		</label> / <label>
			<input type="text" name="<?php echo $name; ?>_month" placeholder="<?php _e( 'mm', 'woocommerce-bookings' ); ?>" size="2" class="required_for_calculation booking_date_month" />
			<span><?php _e( 'Month', 'woocommerce-bookings' ); ?></span>
		</label>
		<?php endif; ?>
		 / <label>
			<input type="text" value="<?php echo date( 'Y' ); ?>" name="<?php echo $name; ?>_year" placeholder="<?php _e( 'YYYY', 'woocommerce-bookings' ); ?>" size="4" class="required_for_calculation booking_date_year" />
			<span><?php _e( 'Year', 'woocommerce-bookings' ); ?></span>
		</label>
	</div>
</fieldset>


	<div class="form-field form-field-wide col-sm-6">
		<ul class="block-picker">
			<li><?php _e( 'Choose a date above to see available times.', 'woocommerce-bookings' ); ?></li>
		</ul>
		<input type="hidden" class="required_for_calculation" name="<?php echo $name; ?>_time" id="<?php echo $name; ?>" />
	</div>


</div>