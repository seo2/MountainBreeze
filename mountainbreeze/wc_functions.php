<?php
function hc_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	//add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'hc_add_woocommerce_support' );

// add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
//   function wc_form_field_args($args, $key, $value) {
//   $args['input_class'] = array( 'form-control' );
//   return $args;
// }

// add_filter( 'woocommerce_endpoint_edit-account_title', 'change_my_account_edit_account_title', 10, 2 );
// function change_my_account_edit_account_title( $title, $endpoint ) {
//     $title = __( "Edit your account details", "woocommerce" );

//     return $title;
// }

// add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
 
// function iconic_cart_count_fragments( $fragments ) {
    
//     $fragments['div.header-cart-count'] = '<div class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
    
//     return $fragments;
    
// }

// function searchfilter($query) {
 
//     if ($query->is_search && !is_admin() ) {
//         $query->set('post_type',array('product'));
//     }
 
// return $query;
// }
 
// add_filter('pre_get_posts','searchfilter');


// add_filter( 'woocommerce_product_tabs', 'misha_remove_description_tab', 11 );
 
// function misha_remove_description_tab( $tabs ) {
 
// 	unset( $tabs['description'] );
// 	return $tabs;
 
// }

add_filter( 'woocommerce_product_tabs', 'misha_remove_additional_information' );
 
function misha_remove_additional_information( $tabs ) {
 
	unset( $tabs['additional_information'] );
	return $tabs;
 
}

add_filter( 'woocommerce_product_tabs', 'misha_remove_reviews_tab' );
 
function misha_remove_reviews_tab( $tabs ) {
 
	unset( $tabs['reviews'] );
	return $tabs;
 
}

/**
 * Remove related products output & upsell products
 */
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

/**** Comunas de despacho ****/
// 

add_filter( 'woocommerce_billing_fields', 'bbloomer_move_checkout_email_field', 10, 1 );
 
function bbloomer_move_checkout_email_field( $address_fields ) {
    $address_fields['billing_email']['priority'] = 20;
    $address_fields['billing_phone']['priority'] = 25;
    return $address_fields;
}

/*
 * Woocommerce Remove excerpt from single product
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

/** Display product description the_content */
// 
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title',5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title',15 );

add_action( 'woocommerce_single_product_summary', 'custom_action_after_single_product_title', 16 );
function custom_action_after_single_product_title() { 
    global $product; 
    $product_id = $product->get_id(); // The product ID
    $tallerista = get_post_meta($product_id, "tallerista", true);
    echo '<h2 class="text-sm mb-2 capitalize">' . esc_html( get_the_title($tallerista[0]) ) . '</h2>';
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta',40 );

