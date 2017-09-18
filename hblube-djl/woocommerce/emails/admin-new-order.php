<?php
/**
 * Admin new order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-new-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author WooThemes
 * @package WooCommerce/Templates/Emails/HTML
 * @version 2.5.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

 /**
  * @hooked WC_Emails::email_header() Output the email header
  */
 do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

 <p><?php printf( __( 'You have received an order from %s. The order is as follows:', 'woocommerce' ), $order->get_formatted_billing_full_name() ); ?></p>

 <?php

 /**
  * @hooked WC_Emails::order_details() Shows the order details table.
  * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
  * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
  * @since 2.5.0
  */
 do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

     echo "<h3>Vehicle Information</h3>";
    echo '<p><strong>' . __( 'Vehicle Year:', 'theme_domain_slug' ) . '</strong> ' . get_post_meta( get_the_ID(), 'car-year', true ) . '</p>';    
    echo '<p><strong>' . __( 'Vehicle Make:', 'theme_domain_slug' ) . '</strong> ' . get_post_meta( get_the_ID(), 'car-make', true ) . '</p>';    
    echo '<p><strong>' . __( 'Vehicle Model:', 'theme_domain_slug' ) . '</strong> ' . get_post_meta( get_the_ID(), 'car-model', true ) . '</p>';    
    echo '<p><strong>' . __( 'Vehicle Trim:', 'theme_domain_slug' ) . '</strong> ' . get_post_meta( get_the_ID(), 'car-model-trim', true ) . '</p>'; 

     echo "<h3>Location</h3>";
    echo '<p>' . get_post_meta( get_the_ID(), 'order-location', true ) . '</p>';    


 /**
  * @hooked WC_Emails::order_meta() Shows order meta data.
  */
 do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

 /**
  * @hooked WC_Emails::customer_details() Shows customer details
  * @hooked WC_Emails::email_address() Shows email address
  */
 do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

 
 /**
  * @hooked WC_Emails::email_footer() Output the email footer
  */
 do_action( 'woocommerce_email_footer', $email );
