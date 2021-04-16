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

/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */

/**
 * Hook: woocommerce_before_single_product_summary.
 *
 * @hooked woocommerce_show_product_sale_flash - 10
 * @hooked woocommerce_show_product_images - 20
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs',10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_output_product_data_tabs',25 );


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs',10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_output_product_data_tabs',25 );




function wc_before_main_content() {
	echo '<section class="mt-48">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32">
        <div class="w-100">';
}
add_action( 'woocommerce_before_main_content', 'wc_before_main_content', 10 );

function wc_after_main_content() {
	echo '
    </div>
</div>
</section>';
}
add_action( 'woocommerce_after_main_content', 'wc_after_main_content',50 );


/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20 );
add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products',60 );


function wc_before_related() {
	echo '<section class="w-full pt-24 lg:pt-32 pb-12 relative lg:bg-100 bg-no-repeat bg-top bg-rosado bg-contain" style="background-image: url('.get_stylesheet_directory_uri().'/dist/img/bg_rosado_bot_blanco_top.png");">
		<div class="container mx-auto">
	';
}
add_action( 'woocommerce_after_main_content', 'wc_before_related', 55 );

function wc_after_related() {
	echo '
		</div>	
	</section>';
}
add_action( 'woocommerce_after_main_content', 'wc_after_related', 65 );


	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price',10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price',20 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open',10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close',10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open',5 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close',15 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart',10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart',15 );

function woocommerce_template_loop_product_title() {
	echo '<h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">' . get_the_title() . '</h4>'; 
 }	

function wc_before_thumbnail() {
	echo '<div class="relative w-1/4 lg:w-auto mb-2">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'wc_before_thumbnail', 5 );

function wc_after_thumbnail() {
	echo '</div>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'wc_after_thumbnail', 17 );


	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */


	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 6 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 14 );
/**
 * Edit default Woocommerce product loop thumbnail template
 * As there is no dedicated Woocommerce template (eg wp-content/plugins/woocommerce/templates/loop/price.php)
 * because it's generated using filter, we must remove Woocommerce hook, and add our own "at the same place"
 * to edit the product loop thumbnail template
 * tested up to (12/10/2020) : 
 * Wordpress 5.5.1
 * Woocommerce 3.8.1
 * PHP 7.3.7
 * Sage 9.0.9
 * source: https://gist.github.com/krogsgard/3015581
 * HOW TO USE: add in active theme functions.php file
 */

/**
 * Remove woocommerce hooked action (method woocommerce_template_loop_product_thumbnail on woocommerce_before_shop_loop_item_title
 * hook
 */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
/**
 * Add our own action to the woocommerce_before_shop_loop_item_title hook with the same priority that woocommerce used
 */
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
	return array(
		'width'  => 300,
		'height' => 250,
		'crop'   => 1,
	);
} );