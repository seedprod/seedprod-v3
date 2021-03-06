<?php 

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

// WooCommerce affiliate tracking
add_action('woocommerce_thankyou', 'affiliate_tracking');

function affiliate_tracking( $order_id ) {
	$order = new WC_Order( $order_id );
	$order_total = $order->get_order_total();
	$shipping = $order->order_shipping;

	$total = $order_total - $shipping;

	echo "<img src='https://app.seedprod.com/affiliates/sale.php?profile=85&idev_saleamt=$total&idev_ordernum=$order_id' height='1' width='1' border='0'>"; 
}

// Payment hook
add_action('woocommerce_payment_complete','app_seedprod_hook');
function app_seedprod_hook( $order_id ){
	$order = new WC_Order( $order_id );
	if($order->payment_method == 'strip'){
		$fname = $order->billing_first_name;
		$lname =  $order->billing_last_name;
	}else{
		$fname = $order->billing_first_name;
		$lname = $order->billing_last_name;
		if(empty($fname) && empty($lname)){
			$fname = 'customer';
		}
	}
    $arg = array (
	  'first_name' => $fname,
	  'last_name' => $lname,
	  'payer_email' => $order->billing_email,
	  'address_street' => '',
	  'address_city' => '',
	  'address_state' => '',
	  'address_zip' => '',
	  'address_country_code' => 'US',
	  'payment_date' => $order->order_date,
	  'mc_currency' => 'USD',
	  'mc_gross' => $order->order_total,
	  'tax' => $order->order_tax,
	  'txn_type' => $order->payment_method,
	  'buyer_ip' => $order->order_custom_fields['Customer IP Address'][0],
	  'card_type' => '',
	  'txn_id' => $order->id,
	  'payment_status' => 'Completed',
	  'quantity' => '1',
	  'handshake' => '96bfb2f9ee45a9ab0a197eb58d16db26',
	  'discount_codes' => '',
	  
);
    $c = 1;
    foreach($order->order_custom_fields['_order_items'] as $k => $v){
    	$o = unserialize($v);
    	$arg['item_name'.$c] = $o[0]['name'];
    	$arg['key_'.$c]=  $order->order_custom_fields['API Key'][0];

    	$c++;
    }
    $post = array(
	'method' => 'POST',
	'timeout' => 45,
	'redirection' => 5,
	'httpversion' => '1.0',
	'blocking' => true,
	'headers' => array(),
	'body' =>$arg,
	'cookies' => array()
    );
	$url = 'http://app.seedprod.com/api/woocommerce/';
	$response = wp_remote_post( $url, $post );

}

// Generate API Key and save it to the order/
add_action('woocommerce_checkout_update_order_meta', 'seedprod_apikey_field_update_order_meta');
 
function seedprod_apikey_field_update_order_meta( $order_id ) {
	$api_key = strtolower(wp_generate_password(16,false));
    update_post_meta( $order_id, 'API Key',$api_key );
    //var_dump($api_key);
}

// Add API Key to the email.

// add_filter('seedprod_apikey_field_order_meta_keys', 'seedprod_apikey_field_order_meta_keys');

// function seedprod_apikey_field_order_meta_keys( $keys ) {
// 	$keys[] = 'API Key';
// 	return $keys;
// }

//remove Fields
add_filter( 'woocommerce_checkout_fields' , 'seedprod_remove_checkout_fields' );
 
// Our hooked in function - $fields is passed via the filter!
function seedprod_remove_checkout_fields( $fields ) {
	 unset($fields['billing']['billing_company']);
     unset($fields['billing']['billing_phone']);
 
     return $fields;
}




/**
 * Determines whether or not the user is viewing a date archive.
 *
 * @returns	True if the current page is for a date archive.
 */
function standard_is_date_archive() {
	return '' != get_query_var( 'year' ) || '' != get_query_var( 'monthnum' ) || '' != get_query_var( 'day' ) || '' != get_query_var( 'm' );
} // end standard_is_date_archive

/**
 * Generates a label for the current archive based on whether or not the user is viewing year, month, or day. Uses the
 * users date format to properly format the date.
 *
 * @returns	The label for the current archive
 */
function standard_get_date_archive_label() {

	$archive_label = '';
	
	if( '' != get_query_var( 'day' ) ) {

		$archive_label .= date( get_option( 'date_format' ), mktime(0, 0, 0, get_query_var( 'monthnum' ), get_query_var( 'day' ), get_query_var( 'year' ) ) );

	} elseif( '' != get_query_var( 'monthnum' ) ) {
	
		// This particular format is not localized. The 'date_format' uses month and year and we only need month and year.
		// The archives widget built into WordPress follows the format that we're providing see.
		// Lines 938 - 939 of general-template.php in WordPress core.
		$archive_label .= get_the_time( 'F Y' );
		
	} elseif ( '' != get_query_var( 'm' ) ) {
	
		if( strlen( get_query_var( 'm' ) ) == 6 ) {
					
			// See comment in Lines 1602 - 1604
			$archive_label .= get_the_time( 'F Y' );
		
		} else {

			$year = substr( get_query_var( 'm' ), 0, 4 );
			$month = substr( get_query_var( 'm' ), 4, 2);
			$day = substr( get_query_var( 'm' ), 6, 2 );
			
			$archive_label .= date( get_option( 'date_format' ), mktime(0, 0, 0, $month, $day, $year ) );
		
		} // end if/else
		
	} elseif( '' != get_query_var( 'year' ) ) {

		$archive_label .= get_query_var( 'year' );
		
	} // end if
	
	return $archive_label;

} // end standard_get_date_archive_label


/**
 * Truncates string at the last breakable space within the string at the
 * character limit and then adds the truncation indicator.
 *
 * @string                   The string to possibly truncate
 * @$character_limit         The number of characters to limit the string to
 * @$truncation_indicator    The characters to end truncation with (if needed)
 */

function standard_truncate_text( $string, $character_limit = 50, $truncation_indicator = '...' ) {

	$truncated = null == $string ? '' : $string;
    if ( strlen( $string ) >= ( $character_limit + 1 ) ) {
    
        $truncated = substr( $string, 0, $character_limit );

        if ( substr_count( $truncated, ' ') > 1 ) {
            $last_space = strrpos( $truncated, ' ' );
            $truncated = substr( $truncated, 0, $last_space );
        } // end if

        $truncated = $truncated . $truncation_indicator;
        
    } // end if/else
    
    return $truncated;
    
} // end standard_truncate_text