/*global woocommerce_admin_meta_boxes, woocommerce_admin, accounting, woocommerce_admin_meta_boxes_order */
jQuery( function ( $ ) {
    var custom_wc_meta_boxes_order = {
        init: function() {
            $( 'a.load_customer_billing' ).on( 'click', this.load_billing );
            $( '#customer_user' ).on( 'change', this.change_customer_user );
        },

        change_customer_user: function() {
            custom_wc_meta_boxes_order.load_billing( true );
        },

        load_billing: function( force ) {
            if ( true === force || window.confirm( woocommerce_admin_meta_boxes.load_billing ) ) {

                // Get user ID to load data for
                var user_id = $( '#customer_user' ).val();

                if ( ! user_id ) {
                    window.alert( woocommerce_admin_meta_boxes.no_customer_selected );
                    return false;
                }

                var data = {
                    user_id:      user_id,
                    type_to_load: 'billing',
                    action:       'custom_woocommerce_get_customer_details',
                    security:     woocommerce_admin_meta_boxes.get_customer_details_nonce
                };

                $( this ).closest( 'div.edit_address' ).block({
                    message: null,
                    overlayCSS: {
                        background: '#fff',
                        opacity: 0.6
                    }
                });

                $.ajax({
                    url: woocommerce_admin_meta_boxes.ajax_url,
                    data: data,
                    type: 'POST',
                    success: function( response ) {
                        var info = response;

                        if ( info ) {
                            $( 'input#car-year' ).val( info.billing_account_car_year ).change();
                            $( 'input#car-make' ).val( info.billing_account_car_make ).change();
                        }

                        $( 'div.edit_address' ).unblock();
                    }
                });
            }
            return false;
        },
    };

    custom_wc_meta_boxes_order.init();