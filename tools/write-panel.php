<?php
/*
Plugin Name: Add Meta Boxes
Plugin URI: http://www.nathanrice.net/
Description: Allows you to add boxes and fields to the Write Post panel, and store the value as a custom field.
Version: 1.0
Author: Nathan Rice
Author URI: http://www.nathanrice.net/
*/

//A simple function to get data stored in a custom field
if(!function_exists('get_custom_field')) {
function get_custom_field($field) {
	global $post;
	$custom_field = get_post_meta($post->ID, $field, true);
	echo $custom_field;
}
}

// Adds a custom section to the "advanced" Post and Page edit screens
function sp_add_custom_box() {
	if( function_exists( 'add_meta_box' )) {
		add_meta_box( 'sp_custom_box_1', __( 'General Property Info', 'sp' ), 'sp_inner_custom_box_1', 'post', 'normal', 'high' );
		add_meta_box( 'sp_custom_box_2', __( 'Property Details', 'sp' ), 'sp_inner_custom_box_2', 'post', 'normal', 'high' );
		add_meta_box( 'sp_custom_box_3', __( 'Property Photos', 'sp' ), 'sp_inner_custom_box_3', 'post', 'normal', 'high' );
	}
}
   
/* Prints the inner fields for the custom post/page section */
function sp_inner_custom_box_1() {
	global $post;
	
	// Use nonce for verification ... ONLY USE ONCE!
	echo '<input type="hidden" name="sp_noncename" id="sp_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	// The actual fields for data entry
	echo '<label for="_listing_price">' . __("Listing Price:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_listing_price" value="'.get_post_meta($post->ID, '_listing_price', true).'" /><br /><br />';
	
	echo '<label for="_mls">' . __("MLS # (if any):", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_mls" value="'.get_post_meta($post->ID, '_mls', true).'" /><br /><br />';

	echo '<label for="_address">' . __("Address:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_address" value="'.get_post_meta($post->ID, '_address', true).'" /><br /><br />';
	
	echo '<label for="_city">' . __("City:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_city" value="'.get_post_meta($post->ID, '_city', true).'" /><br /><br />';
	
	echo '<label for="_state">' . __("State:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_state" value="'.get_post_meta($post->ID, '_state', true).'" /><br /><br />';
	
	echo '<label for="_zip_code">' . __("Zip Code:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_zip_code" value="'.get_post_meta($post->ID, '_zip_code', true).'" /><br /><br />';
}

function sp_inner_custom_box_2() {
	global $post;

	// The actual fields for data entry
	echo '<label for="_square_feet">' . __("Square Feet:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_square_feet" value="'.get_post_meta($post->ID, '_square_feet', true).'" /><br /><br />';
	
	echo '<label for="_bedrooms">' . __("Bedrooms:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_bedrooms" value="'.get_post_meta($post->ID, '_bedrooms', true).'" /><br /><br />';
	
	echo '<label for="_bathrooms">' . __("Bathrooms:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_bathrooms" value="'.get_post_meta($post->ID, '_bathrooms', true).'" /><br /><br />';
	
	echo '<label for="_basement">' . __("Basement (full, 1/2, finished, unfinished):", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_basement" value="'.get_post_meta($post->ID, '_basement', true).'" /><br /><br />';
	
	echo '<label for="_addtional_features">' . __("Additional Features:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;height: 100px;" type="textarea" name="_additional_features" value="'.get_post_meta($post->ID, '_additional_features', true).'" /><br /><br />';
	
}

function sp_inner_custom_box_3() {
	global $post;

	// The actual fields for data entry
	echo '<label for="_photo_1_large">' . __("Photo #1 large URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_1_large" value="'.get_post_meta($post->ID, '_photo_1_large', true).'" /><br /><br />';
	
	echo '<label for="_photo_1_thumbnail">' . __("Photo #1 thumbnail URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_1_thumbnail" value="'.get_post_meta($post->ID, '_photo_1_thumbnail', true).'" /><br /><br />';
	
	echo '<label for="_photo_2_large">' . __("Photo #2 large URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_2_large" value="'.get_post_meta($post->ID, '_photo_2_large', true).'" /><br /><br />';
	
	echo '<label for="_photo_2_thumbnail">' . __("Photo #2 thumbnail URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_2_thumbnail" value="'.get_post_meta($post->ID, '_photo_2_thumbnail', true).'" /><br /><br />';
	
	echo '<label for="_photo_3_large">' . __("Photo #3 large URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_3_large" value="'.get_post_meta($post->ID, '_photo_3_large', true).'" /><br /><br />';
	
	echo '<label for="_photo_3_thumbnail">' . __("Photo #3 thumbnail URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_3_thumbnail" value="'.get_post_meta($post->ID, '_photo_3_thumbnail', true).'" /><br /><br />';
	
	echo '<label for="_photo_4_large">' . __("Photo #4 large URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_4_large" value="'.get_post_meta($post->ID, '_photo_4_large', true).'" /><br /><br />';
	
	echo '<label for="_photo_4_thumbnail">' . __("Photo #4 thumbnail URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_4_thumbnail" value="'.get_post_meta($post->ID, '_photo_4_thumbnail', true).'" /><br /><br />';
	
	echo '<label for="_photo_5_large">' . __("Photo #5 large URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_5_large" value="'.get_post_meta($post->ID, '_photo_5_large', true).'" /><br /><br />';
	
	echo '<label for="_photo_5_thumbnail">' . __("Photo #5 thumbnail URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_5_thumbnail" value="'.get_post_meta($post->ID, '_photo_5_thumbnail', true).'" /><br /><br />';
	
	echo '<label for="_photo_6_large">' . __("Photo #6 large URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_6_large" value="'.get_post_meta($post->ID, '_photo_6_large', true).'" /><br /><br />';
	
	echo '<label for="_photo_6_thumbnail">' . __("Photo #6 thumbnail URL:", 'sp' ) . '</label><br />';
	echo '<input style="width: 95%;" type="text" name="_photo_6_thumbnail" value="'.get_post_meta($post->ID, '_photo_6_thumbnail', true).'" /><br /><br />';
	
}

/* When the post is saved, saves our custom data */
function sp_save_postdata($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['sp_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$mydata['_listing_price'] = $_POST['_listing_price'];
	$mydata['_mls'] = $_POST['_mls'];
	$mydata['_address'] = $_POST['_address'];
	$mydata['_city'] = $_POST['_city'];
	$mydata['_state'] = $_POST['_state'];
	$mydata['_zip_code'] = $_POST['_zip_code'];
	
	$mydata['_square_feet'] = $_POST['_square_feet'];
	$mydata['_bedrooms'] = $_POST['_bedrooms'];
	$mydata['_bathrooms'] = $_POST['_bathrooms'];
	$mydata['_basement'] = $_POST['_basement'];
	$mydata['_additional_features'] = $_POST['_additional_features'];
	
	$mydata['_photo_1_thumbnail'] = $_POST['_photo_1_thumbnail'];
	$mydata['_photo_1_large'] = $_POST['_photo_1_large'];
	$mydata['_photo_2_thumbnail'] = $_POST['_photo_2_thumbnail'];
	$mydata['_photo_2_large'] = $_POST['_photo_2_large'];
	$mydata['_photo_3_thumbnail'] = $_POST['_photo_3_thumbnail'];
	$mydata['_photo_3_large'] = $_POST['_photo_3_large'];
	$mydata['_photo_4_thumbnail'] = $_POST['_photo_4_thumbnail'];
	$mydata['_photo_4_large'] = $_POST['_photo_4_large'];
	$mydata['_photo_5_thumbnail'] = $_POST['_photo_5_thumbnail'];
	$mydata['_photo_5_large'] = $_POST['_photo_5_large'];
	$mydata['_photo_6_thumbnail'] = $_POST['_photo_6_thumbnail'];
	$mydata['_photo_6_large'] = $_POST['_photo_6_large'];
	
	// Add values of $mydata as custom fields
	
	foreach ($mydata as $key => $value) { //Let's cycle through the $mydata array!
		if( $post->post_type == 'revision' ) return; //don't store custom data twice
		$value = implode(',', (array)$value); //if $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { //if the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { //if the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); //delete if blank
	}

}

/* Use the admin_menu action to define the custom boxes */
add_action('admin_menu', 'sp_add_custom_box');

/* Use the save_post action to do something with the data entered */
add_action('save_post', 'sp_save_postdata', 1, 2); // save the custom fields
?>