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


    $link = get_field('upload_form', $order_id );
    if( $link ){
        ?>
	
	<a style="display: inline-block;margin-bottom: 0;font-weight: normal;text-align: center;vertical-align: middle;cursor: pointer;background-image: none;border: 1px solid transparent;white-space: nowrap;position: relative;line-height: 1.42857;color: #fff;background-color: #1cad7e;border-color: #18976e;border-radius: 0;font-size: .8em;padding: 10px 30px;" class="button" href="<?php echo $link; ?>">Download Vehicle Inspection</a>

<?php
   
    }


    $additional_link = get_field('addition_work_form', $order_id );
    if( $additional_link){
        ?>
    <hr>   
	<h2 style="color: #d8c81a"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Additional service agreement required</h2>
	<p>Your inspection revealed that your vehicle could use some extra maintenance. By law, we are required to send a service agreement for the additional service. Please download the PDF and digitally sign and email back to <a href="mailto:service@hbmobilelube.com">service@hbmobilelube.com</a> or print and sign. </p>
	<a class="button" style="display: inline-block;margin-bottom: 0;font-weight: normal;text-align: center;vertical-align: middle;cursor: pointer;background-image: none;border: 1px solid transparent;white-space: nowrap;position: relative;line-height: 1.42857;color: #fff;background-color: #1cad7e;border-color: #18976e;border-radius: 0;font-size: .8em;padding: 10px 30px;" href="<?php echo $additional_link; ?>">Download Service Agreement</a>

<?php
    } else {
    	//nothing here
    }

    ?>

<?php

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
