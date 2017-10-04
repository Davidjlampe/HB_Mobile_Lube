<?php 

/**
 * Register Carquery API
 */
add_action( 'wp_enqueue_scripts', 'djl_carquery_enqueue' );

function djl_carquery_enqueue() {
    
if ( is_checkout() || is_account_page() || is_admin() ) {
        wp_enqueue_script('carquery-api-js', 'https://www.carqueryapi.com/js/carquery.0.3.4.js', array('jquery'), '0.3.4', false);
        wp_enqueue_script('carquery-js', get_template_directory_uri() . '/js/carquery.js', array( 'jquery' ),'1.0',true );
    }
}


/**
 * Unregister script on order received
 */
add_action( 'wp_enqueue_scripts', 'djl_carquery_unregister' );

function djl_carquery_unregister() {
    
if ( is_wc_endpoint_url( 'order-received' ) || is_wc_endpoint_url( 'order-pay' ) ) {
        wp_deregister_script( 'carquery-api-js' );  
    }
}

/**
 * Remove order comments field
 */
add_filter( 'woocommerce_checkout_fields' , 'djl_override_checkout_fields' );

function djl_override_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);

     return $fields;
}

add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

/**
 * Add fields to order checkout if not logged in. Return users show vehicle data
 */
add_action( 'woocommerce_after_order_notes', 'djl_checkout_fields' );

function djl_checkout_fields( $checkout ) {


    if ( is_user_logged_in() ) {

    $user_id = get_current_user_id();


    $caryear = get_user_meta( $user_id, 'account_car_year', true );
    $carmake = get_user_meta( $user_id, 'account_car_make', true );
    $carmodel = get_user_meta( $user_id, 'account_car_model', true );
    $carmodeltrim = get_user_meta( $user_id, 'account_car_model_trim', true );

    echo "<h3>Your vehicle information</h3>";
    echo '<h4>' . $caryear . ' ' .$carmake . ' ' . $carmodel . ' ' . $carmodeltrim . '</h4>';
    echo "<p>Do you need to change your vehicle?<br>";



    echo '<input class="input-text hidden" name="location" id="location" type="text" placeholder="">';

    
    ?>

    <a data-toggle="collapse" href="#collapseSelect" aria-expanded="false" aria-controls="collapseSelect">Click Here</a></p>

    <div class="collapse" id="collapseSelect">
       
    <?php 

    echo "<h4>Change your vehicle</h4>";        
    echo '<select name="car-years" id="car-years"></select>'; 
    echo '<select name="car-makes" id="car-makes"></select> '; 
    echo '<select name="car-models" id="car-models"></select>'; 
    echo '<select name="car-model-trims" id="car-model-trims"></select>  ';

    echo '<div id="car_checkout_field">';

   woocommerce_form_field( 'car-year', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'car-year' ));


    woocommerce_form_field( 'car-make', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'car-make' ));


    woocommerce_form_field( 'car-model', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'car-model' ));


    woocommerce_form_field( 'car-model-trim', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'car-model-trim' ));    

    woocommerce_form_field( 'location', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'location' ));        

    echo '</div>';



    ?>
    </div>


    <?php


    } else {

    echo "<h3>Add your vehicle</h3>";        
    echo '<select name="car-years" id="car-years"></select>'; 
    echo '<select name="car-makes" id="car-makes"></select> '; 
    echo '<select name="car-models" id="car-models"></select>'; 
    echo '<select name="car-model-trims" id="car-model-trims"></select>  ';     

    echo '<div id="car_checkout_field">';

   woocommerce_form_field( 'car-year', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'car-year' ));


    woocommerce_form_field( 'car-make', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'car-make' ));


    woocommerce_form_field( 'car-model', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'car-model' ));


    woocommerce_form_field( 'car-model-trim', array(
        'type'          => 'text',
        'class'         => array('input-text hidden')

    ), $checkout->get_value( 'car-model-trim' ));    

    echo '</div>';

    }
    echo "<div class='well'>";    
    echo "<h5 style='font-style: italic;'>Optional</h5>";
    woocommerce_form_field( 'vin_number', array(
   'type' => 'text',
   'label'      => __('VIN Number', 'woocommerce'),
   'placeholder'   => _x('Ex. 1C4RJFAG5EC505525', 'placeholder', 'woocommerce'),
   'required'   => false,
   'class'      => array('form-row-wide'),
   'clear'     => true,
       ), $checkout->get_value( 'vin_number' ));

    woocommerce_form_field( 'lic_plate', array(
   'type' => 'text',
   'label'      => __('Lic Plate Number', 'woocommerce'),
   'placeholder'   => _x('Ex. 123-UYM', 'placeholder', 'woocommerce'),
   'required'   => false,
   'class'      => array('form-row-wide'),
   'clear'     => true,
       ), $checkout->get_value( 'lic_plate' ));    

    echo "</div>";
    echo "<hr>";
    echo "<h3>Confirm Location</h3>";  

    ?>

    <select name='locations' id="locations">
    <?
            
    echo "<option  value='choose'>Select your business</option>";

    global $product;

    $args = array( 
        'post_type' => 'product',
        'product_cat' => 'location'
    );

    $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : 
                $loop->the_post();
                      
                echo '<option  value="'.get_the_ID().'">'.get_field('location').'</option>';

        endwhile;

        ?>
        </select>

        <?php

             echo '<div id="location_checkout_field">';

               woocommerce_form_field( 'order-location', array(
                    'type'          => 'text',
                    'class'         => array('input-text hidden')

                ), $checkout->get_value( 'order-location' ));

                echo '</div>';


}
 






// update order meta with field value
add_action( 'woocommerce_checkout_update_order_meta', 'djl_checkout_field_update_order_meta' );
function djl_checkout_field_update_order_meta( $order_id ) {
    if (!empty( $_POST['car-year'])){
        update_post_meta( $order_id, 'car-year', sanitize_text_field( $_POST['car-year'] ) );

        // updating user meta (for customer my account edit details page post data)
        update_user_meta( get_post_meta( $order_id, '_customer_user', true ), 'account_car_year', sanitize_text_field($_POST['car-year']) );
    }
    if (!empty( $_POST['car-make'])){
        update_post_meta( $order_id, 'car-make', sanitize_text_field( $_POST['car-make'] ) );

        // updating user meta (for customer my account edit details page post data)
        update_user_meta( get_post_meta( $order_id, '_customer_user', true ), 'account_car_make', sanitize_text_field($_POST['car-make']) );
    }
    if (!empty( $_POST['car-model'])){
        update_post_meta( $order_id, 'car-model', sanitize_text_field( $_POST['car-model'] ) );

        // updating user meta (for customer my account edit details page post data)
        update_user_meta( get_post_meta( $order_id, '_customer_user', true ), 'account_car_model', sanitize_text_field($_POST['car-model']) );
    }
    if (!empty( $_POST['car-model-trim'])){
        update_post_meta( $order_id, 'car-model-trim', sanitize_text_field( $_POST['car-model-trim'] ) );

        // updating user meta (for customer my account edit details page post data)
        update_user_meta( get_post_meta( $order_id, '_customer_user', true ), 'account_car_model_trim', sanitize_text_field($_POST['car-model-trim']) );
    }    
    if (!empty( $_POST['order-location'])){
        update_post_meta( $order_id, 'order-location', sanitize_text_field( $_POST['order-location'] ) );

        // updating user meta (for customer my account edit details page post data)
        update_user_meta( get_post_meta( $order_id, '_customer_user', true ), 'account_order_location', sanitize_text_field($_POST['order-location']) );
    } 
    if (!empty( $_POST['vin_number'])){
        update_post_meta( $order_id, 'vin_number', sanitize_text_field( $_POST['vin_number'] ) );

        // updating user meta (for customer my account edit details page post data)
        update_user_meta( get_post_meta( $order_id, '_customer_user', true ), 'account_vin_number', sanitize_text_field($_POST['vin_number']) );
    } 
    if (!empty( $_POST['lic_plate'])){
        update_post_meta( $order_id, 'lic_plate', sanitize_text_field( $_POST['lic_plate'] ) );

        // updating user meta (for customer my account edit details page post data)
        update_user_meta( get_post_meta( $order_id, '_customer_user', true ), 'account_lic_plate', sanitize_text_field($_POST['lic_plate']) );
    }         
}

add_action ( 'personal_options_update', 'djl_save_extra_profile_fields' );
add_action ( 'edit_user_profile_update', 'djl_save_extra_profile_fields' );
add_action( 'woocommerce_save_account_details', 'djl_save_extra_profile_fields' );
function djl_save_extra_profile_fields( $user_id )
{
    // for checkout page post data
    if ( isset($_POST['car-year']) ) {
        update_user_meta( $user_id, 'account_car_year', sanitize_text_field($_POST['car-year']) );
    }
    // for customer my account edit details page post data
    if ( isset($_POST['account_car_year']) ) {
        update_user_meta( $user_id, 'account_car_year', sanitize_text_field($_POST['account_car_year']) );
    }
    // for checkout page post data
    if ( isset($_POST['car-make']) ) {
        update_user_meta( $user_id, 'account_car_make', sanitize_text_field($_POST['car-make']) );
    }
    // for customer my account edit details page post data
    if ( isset($_POST['account_car_make']) ) {
        update_user_meta( $user_id, 'account_car_make', sanitize_text_field($_POST['account_car_make']) );
    }
    // for checkout page post data
    if ( isset($_POST['car-model']) ) {
        update_user_meta( $user_id, 'account_car_model', sanitize_text_field($_POST['car-model']) );
    }
    // for customer my account edit details page post data
    if ( isset($_POST['account_car_model']) ) {
        update_user_meta( $user_id, 'account_car_model', sanitize_text_field($_POST['account_car_model']) );
    }
    // for checkout page post data
    if ( isset($_POST['car-model-trim']) ) {
        update_user_meta( $user_id, 'account_car_model_trim', sanitize_text_field($_POST['car-model-trim']) );
    }
    // for customer my account edit details page post data
    if ( isset($_POST['account_car_trim']) ) {
        update_user_meta( $user_id, 'account_car_model_trim', sanitize_text_field($_POST['account_car_model_trim']) );
    }     
    // for checkout page post data
    if ( isset($_POST['vin_number']) ) {
        update_user_meta( $user_id, 'account_vin_number', sanitize_text_field($_POST['vin_number']) );
    }
    // for customer my account edit details page post data
    if ( isset($_POST['account_vin_number']) ) {
        update_user_meta( $user_id, 'account_vin_number', sanitize_text_field($_POST['account_vin_number']) );
    }   
    // for checkout page post data
    if ( isset($_POST['lic_plate']) ) {
        update_user_meta( $user_id, 'account_lic_plate', sanitize_text_field($_POST['lic_plate']) );
    }
    // for customer my account edit details page post data
    if ( isset($_POST['account_lic_plate']) ) {
        update_user_meta( $user_id, 'account_lic_plate', sanitize_text_field($_POST['account_lic_plate']) );
    }                   
}


/**
 * Process the checkout with custom fields
 */
add_action('woocommerce_checkout_process', 'djl_custom_checkout_field_process');

function djl_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['car-year'] )
        wc_add_notice( __( 'Please enter your vehicles year.' ), 'error' );
    if ( ! $_POST['car-make'] )
        wc_add_notice( __( 'Please enter your vehicles make.' ), 'error' );
    if ( ! $_POST['car-model'] )
        wc_add_notice( __( 'Please enter your vehicles model.' ), 'error' );  
    if ( ! $_POST['account_order_location'] )
        wc_add_notice( __( 'Please confirm your location' ), 'error' );                            
}


// Display field value on the order edit page
add_action( 'woocommerce_admin_order_data_after_billing_address', 'djl_checkout_field_display_vehicle_order_meta', 10, 1 );
add_action( 'woocommerce_admin_booking_data_after_booking_details ', 'djl_checkout_field_display_vehicle_order_meta', 10, 1);

function djl_checkout_field_display_vehicle_order_meta($order_id){

        $order = new WC_Order ( $order_id );
        $customer_id = ( int ) $order->get_user_id();
        $customer = get_userdata ( $customer_id );

        echo "<h3>Vehicle Information</h3>";
        echo '<p><strong>' . __( 'Vehicle Year:', 'theme_domain_slug' ) . '</strong> ' . $customer->account_car_year . '</p>';    
        echo '<p><strong>' . __( 'Vehicle Make:', 'theme_domain_slug' ) . '</strong> ' . $customer->account_car_make . '</p>';    
        echo '<p><strong>' . __( 'Vehicle Model:', 'theme_domain_slug' ) . '</strong> ' . $customer->account_car_model . '</p>';    
        echo '<p><strong>' . __( 'Vehicle Trim:', 'theme_domain_slug' ) . '</strong> ' . $customer->account_car_model_trim . '</p>';    
        echo '<p><strong>' . __( 'VIN Number:', 'theme_domain_slug' ) . '</strong> ' . $customer->account_vin_number . '</p>'; 
        echo '<p><strong>' . __( 'Plate Number:', 'theme_domain_slug' ) . '</strong> ' . $customer->account_lic_plate . '</p>';   
    }   

// Display field value on the order edit page
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'djl_checkout_field_display_location_order_meta', 10, 1 );
add_action( 'woocommerce_admin_booking_data_after_booking_details ', 'djl_checkout_field_display_location_order_meta', 10, 1);

function djl_checkout_field_display_location_order_meta($order_id){



        $order = new WC_Order ( $order_id );
        $customer_id = ( int ) $order->get_user_id();
        $customer = get_userdata ( $customer_id );


        echo "<h3>Location Details</h3>";
        echo '<p><strong>' . __( 'Location:', 'theme_domain_slug' ) . '</strong> ' . $customer->account_order_location . '</p>';  

}   



/**
 * Display vehicle details in admin edit
 */
add_action ( 'show_user_profile', 'djl_checkout_field_display_my_account' );
add_action ( 'edit_user_profile', 'djl_checkout_field_display_my_account' );

function djl_checkout_field_display_my_account($user){ ?>

<h2>Vehicle Information</h2>

<table class="form-table">
<tr>
    <th>
        <label for="car-year">Vehicle Year:</label>
    </th>
    <td>
        <input type="text" name="car-year" id="car-year" value="<?php echo esc_attr(get_user_meta($user->ID, 'account_car_year', true)); ?>" class="regular-text" />
    </td>
</tr>
<tr>
    <th>
        <label for="car-make">Vehicle Make:</label>
    </th>
    <td>
        <input type="text" name="car-make" id="car-make" value="<?php echo esc_attr(get_user_meta($user->ID, 'account_car_make', true)); ?>" class="regular-text" />
    </td>
</tr>
<tr>
    <th>
        <label for="car-model">Vehicle Model:</label>
    </th>
    <td>
        <input type="text" name="car-model" id="car-model" value="<?php echo esc_attr(get_user_meta($user->ID, 'account_car_model', true)); ?>" class="regular-text" />
    </td>
</tr>
<tr>
    <th>
        <label for="car-model-trim">Vehicle Trim:</label>
    </th>
    <td>
        <input type="text" name="car-model-trim" id="car-model-trim" value="<?php echo esc_attr(get_user_meta($user->ID, 'account_car_model_trim', true)); ?>" class="regular-text" />
    </td>
</tr>
<tr>
    <th>
        <label for="car-model">VIN Number:</label>
    </th>
    <td>
        <input type="text" name="vin-number" id="vin-number" value="<?php echo esc_attr(get_user_meta($user->ID, 'account_vin_number', true)); ?>" class="regular-text" />
    </td>
</tr>
<tr>
    <th>
        <label for="car-model-trim">Lic Plate #:</label>
    </th>
    <td>
        <input type="text" name="lic-plate" id="lic-plate" value="<?php echo esc_attr(get_user_meta($user->ID, 'account_lic_plate', true)); ?>" class="regular-text" />
    </td>
</tr>

</table>


<?php
}


/**
 * Add vehicle information to my-account
 */

add_action( 'woocommerce_edit_account_form', 'djl_user_extra_profile_fields' );


function djl_user_extra_profile_fields() {

    if ( is_user_logged_in() ) {

    $user_id = get_current_user_id();

    $caryear = get_user_meta( $user_id, 'account_car_year', true );
    $carmake = get_user_meta( $user_id, 'account_car_make', true );
    $carmodel = get_user_meta( $user_id, 'account_car_model', true );
    $carmodeltrim = get_user_meta( $user_id, 'account_car_model_trim', true );
    $vinnumber = get_user_meta( $user_id, 'account_vin_number', true );
    $licplate = get_user_meta( $user_id, 'account_lic_plate', true );    

    echo "<h3>Your vehicle information</h3>";
    echo '<h4>' . $caryear . ' ' .$carmake . ' ' . $carmodel . ' ' . $carmodeltrim . '</h4>';
    echo '<p><strong>' . __( 'VIN Number:', 'theme_domain_slug' ) . '</strong> ' . $vinnumber . '</p>'; 
    echo '<p><strong>' . __( 'Plate Number:', 'theme_domain_slug' ) . '</strong> ' . $licplate . '</p>'; 


    echo "<p>Do you need to change your vehicle?<br>";    

    echo "string";
    
    ?>

    <a data-toggle="collapse" href="#collapseSelect" aria-expanded="false" aria-controls="collapseSelect">Click Here</a></p>

    <div class="collapse" id="collapseSelect">

    <fieldset>
        <h4>New vehicle information</h4> 
        <p class="form-row form-row-thirds">
            <input type="text" id="car-year" name="car-year" value="<?php echo esc_attr( $caryear ); ?>" class="input-text hidden" />
            <input type="text" id="car-make" name="car-make" value="<?php echo esc_attr( $carmake ); ?>" class="input-text hidden" />
            <input type="text" id="car-model" name="car-model" value="<?php echo esc_attr( $carmodel ); ?>" class="input-text hidden" />
            <input type="text" id="car-model-trim" name="car-model-trim" value="<?php echo esc_attr( $carmodeltrim ); ?>" class="input-text hidden" />
            <?php 
                echo '<select name="car-years" id="car-years"></select>'; 
                echo '<select name="car-makes" id="car-makes"></select> '; 
                echo '<select name="car-models" id="car-models"></select>'; 
                echo '<select name="car-model-trims" id="car-model-trims"></select>  ';   
            ?>
            <?php echo "Vin Number" ?>
            <input type="text" id="vin-number" name="vin-number" value="<?php echo esc_attr( $vinnumber ); ?>" class="input-text" />
            <?php echo "License Plate #" ?>
            <input type="text" id="lic-plate" name="lic-plate" value="<?php echo esc_attr( $licplate); ?>" class="input-text" />            
        </p>                        
    </fieldset>
    </div>
<?php

 }
} // end func


add_action( 'woocommerce_save_account_details', 'djl_user_save_extra_profile_fields' );

function djl_user_save_extra_profile_fields( $user_id ) {
    update_user_meta( $user_id, htmlentities( $_POST[ 'account_car_year' ] ) );
    update_user_meta( $user_id, htmlentities( $_POST[ 'account_car_make' ] ) ); 
    update_user_meta( $user_id, htmlentities( $_POST[ 'account_car_model' ] ) ); 
    update_user_meta( $user_id, htmlentities( $_POST[ 'account_car_model_trim' ] ) );  
    update_user_meta( $user_id, htmlentities( $_POST[ 'vin_number' ] ) ); 
    update_user_meta( $user_id, htmlentities( $_POST[ 'lic_plate' ] ) );      
} // end func




/**
 * Remove billing company from checkout
 */
 
add_filter( 'woocommerce_checkout_fields' , 'djl_override_billing_checkout_fields' );

function djl_override_billing_checkout_fields( $fields ) {
     unset($fields['billing']['billing_company']);

     return $fields;
}


/**
 * Add re-order button to my-account
 */


add_filter( 'woocommerce_my_account_my_orders_actions', 'wrob_add_order_again_aciton', 10, 2 );

function wrob_add_order_again_aciton( $actions, $order ) {

    if ( ! $order || ! $order->has_status( 'completed' ) || ! is_user_logged_in() ) {
        return;
    }


    $actions['order-again'] = array(
        'url'  => wp_nonce_url( add_query_arg( 'order_again', $order->get_id() ) , 'woocommerce-order_again' ),
        'name' => __( 'Order Again', 'woocommerce' )
    );

    return $actions;

}



/**
 * Change Cross Sale Columns to 4
 */
 
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
 
 
add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );
 
 
add_filter( 'woocommerce_cross_sells_columns', 'bbloomer_change_cross_sells_columns' );
 
function bbloomer_change_cross_sells_columns( $columns ) {
return 4;
}

 
add_filter( 'woocommerce_cross_sells_total', 'bbloomer_change_cross_sells_product_no' );
  
function bbloomer_change_cross_sells_product_no( $columns ) {
return 4;
}


/**
 * Remove Additional Information
 */

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;

}



/**
 * Add Tab in my-account
 */
function djl_account_menu_items( $items ) {
 
    $items['vehicle'] = __( 'Vehicle Information', 'djl' );
 
    return $items;
 
}
 
add_filter( 'woocommerce_account_menu_items', 'djl_account_menu_items', 10, 1 );


// Add endpoint for custom tab in my-account


add_action( 'init', 'djl_add_my_account_endpoint' );

function djl_add_my_account_endpoint() {
 
    add_rewrite_endpoint( 'vehicle', EP_PAGES );
 
}
 



// Add endpoint location for custom tab in my-account

add_action( 'woocommerce_account_vehicle_endpoint', 'djl_information_endpoint_content' );

function djl_information_endpoint_content() {
    include WP_CONTENT_DIR . '/themes/hblube-djl/woocommerce/myaccount/my-custom-endpoint.php'; 
}
 




/**
 * Add Locations input on product pageccount
 */

add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

function woo_add_custom_general_fields() {

  global $woocommerce, $post;
  
  echo '<div class="options_group">';
  
    // Text Field
    woocommerce_wp_text_input( 
        array( 
            'id'          => 'location', 
            'label'       => __( 'Location', 'woocommerce' ), 
            'placeholder' => 'Location',
            'desc_tip'    => 'true',
            'description' => __( 'Enter the location of service here.', 'woocommerce' ) 
        )
    );
  
  echo '</div>';
    
}


// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields_save( $post_id ){
    
    // Text Field
    $woocommerce_text_field = $_POST['location'];
    if( !empty( $woocommerce_text_field ) )
        update_post_meta( $post_id, 'location', esc_attr( $woocommerce_text_field ) );
    
}



/**
 * Bookings shortcode for home page [booking id="99"]. Template - content-booking.php
 */

add_shortcode('booking','booking_add_to_cart');

function booking_add_to_cart( $atts ) {
        if ( empty( $atts ) ) {
            return '';
        }

        $meta_query = WC()->query->get_meta_query();

        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 1,
            'no_found_rows'  => 1,
            'post_status'    => 'publish',
            'meta_query'     => $meta_query,
            'tax_query'      => WC()->query->get_tax_query(),
        );

        if ( isset( $atts['sku'] ) ) {
            $args['meta_query'][] = array(
                'key'     => '_sku',
                'value'   => $atts['sku'],
                'compare' => '=',
            );
        }

        if ( isset( $atts['id'] ) ) {
            $args['p'] = $atts['id'];
        }

        ob_start();

        $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts, null ) );

        if ( $products->have_posts() ) : ?>

            <?php woocommerce_product_loop_start(); ?>

                <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                    <?php wc_get_template_part( 'content', 'booking' ); ?>

                <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

        <?php endif;

        wp_reset_postdata();

        $css_class = 'woocommerce';

        if ( isset( $atts['class'] ) ) {
            $css_class .= ' ' . $atts['class'];
        }

        return '<div class="' . esc_attr( $css_class ) . '">' . ob_get_clean() . '</div>';
    }



function pw_global_js_vars() {

        if ( is_page() ) {

                echo '<script>';
                echo "(function( $ ) {";
                echo "$(function() {";   


              global $product;

              $args = array( 
                'post_type' => 'product',
                'product_cat' => 'location'
                 );

                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : 
                      $loop->the_post();


                echo "$('#";
                echo get_the_ID(); 
                echo "').hide();";                

                endwhile;    

                echo "$('#type').change(function(){";
                echo " if($('#type').val() == 'choose') { $('#choose').show(); } else { $('#choose').hide(); }";    

                global $product;

                 $args = array( 
                'post_type' => 'product',
                'product_cat' => 'location'
                 );

                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : 
                      $loop->the_post();


                echo "if($('#type').val() == '";
                echo get_the_ID(); 
                echo "') {";   
                    
                    echo "$('#";
                    echo get_the_ID(); 
                    echo "').show();";

                echo " } else {";

                    echo "$('#";
                    echo get_the_ID(); 
                    echo "').hide();";
                echo "}";                    


                endwhile; 
                echo "});});";                 
                echo "})(jQuery);";
                echo '</script>';                
    }
}
add_action( 'wp_footer', 'pw_global_js_vars' );
