<?php
/**
 * Customer note email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-note.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<h2>Your courtesy vehicle inspection is attached.</h2>

<p>It is my goal to offer my customers the best service possible. The services offered today are for basic maintenance of your vehicle. If a problem is found during the
inspection, I will let you know. In fact, I can recommend a repair facility. You can expect to have no sales pressure for upselling and I would be happy to answer any questions you may have.</p>

<?php 

    $order_id = esc_attr( $order->get_id() ); // 3.0+


    $tracking_num = get_field('upload_form', $order_id );
    if( $tracking_num ){
        echo '<p>' . $tracking_num . '</p>';
    }

    ?>



<?php

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
