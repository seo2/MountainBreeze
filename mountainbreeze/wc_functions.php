<?php
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	//add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
  function wc_form_field_args($args, $key, $value) {
  $args['input_class'] = array( 'form-control' );
  return $args;
}

add_filter( 'woocommerce_endpoint_edit-account_title', 'change_my_account_edit_account_title', 10, 2 );
function change_my_account_edit_account_title( $title, $endpoint ) {
    $title = __( "Edit your account details", "woocommerce" );

    return $title;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
 
function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['div.header-cart-count'] = '<div class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
    
    return $fragments;
    
}

function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('product'));
    }
 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');

add_action( 'woocommerce_single_product_summary', 'custom_action_after_single_product_title', 6 );
function custom_action_after_single_product_title() { 
    global $product; 

    $product_id = $product->get_id(); // The product ID

    // Your custom field "Book author"
    $formato = get_post_meta($product_id, "formato", true);

    // Displaying your custom field under the title
    echo '<h2>' . $formato . '</h2>';
}

add_filter( 'woocommerce_product_tabs', 'misha_remove_description_tab', 11 );
 
function misha_remove_description_tab( $tabs ) {
 
	unset( $tabs['description'] );
	return $tabs;
 
}

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
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

/**** Comunas de despacho ****/
add_filter('woocommerce_states', 'chilean_regions');

function chilean_regions($states) {

    $directory = trailingslashit( get_template_directory_uri() );
    // Define the URL
    $url = $directory . 'json/comunas.json';
    // Make the request
    $request = wp_remote_get( $url );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }

    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );

    $comunas = $data->comunas;

    foreach($comunas as $comuna) {
        $states['CL'][$comuna] = $comuna;
    }

    if(is_checkout()) {
        
      
        global $wpdb;

        $results = $wpdb->get_results( "SELECT location_code FROM ".$wpdb->prefix ."woocommerce_shipping_zone_locations" );
        $states = array();
        foreach($results as $value) {
            $comuna = str_replace("CL:", "", $value->location_code);
            $states['CL'][$comuna] = $comuna;
        
        }
        
    }


	return $states;
}

/**
 * Change the checkout city field to a dropdown field.
 */
function jeroen_sormani_change_city_to_dropdown( $fields ) {

	$city_args = wp_parse_args( array(
		'type' => 'select',
		'options' => array(
			'Santiago' => 'Santiago',
		),
	), $fields['shipping']['shipping_city'] );

	$fields['shipping']['shipping_city'] = $city_args;
    $fields['billing']['billing_city'] = $city_args; // Also change for billing field

	return $fields;

}
add_filter( 'woocommerce_checkout_fields', 'jeroen_sormani_change_city_to_dropdown', 10 );

add_filter('woocommerce_default_address_fields', 'wea_override_address_fields');
function wea_override_address_fields( $fields ) {
$fields['address_1']['placeholder'] = 'Nombre de la calle y número';
return $fields;
}



add_filter('woocommerce_get_country_locale', 'marcelbotezat_change_state_label_locale');
function marcelbotezat_change_state_label_locale($locale){
    $locale['CL']['state']['label'] = __('Comuna', 'woocommerce');
    return $locale;
}

add_filter( 'woocommerce_billing_fields', 'bbloomer_move_checkout_email_field', 10, 1 );
 
function bbloomer_move_checkout_email_field( $address_fields ) {
    $address_fields['billing_email']['priority'] = 20;
    $address_fields['billing_phone']['priority'] = 25;
    return $address_fields;
}

add_filter( 'woocommerce_cart_shipping_method_full_label', 'bbloomer_remove_shipping_label', 9999, 2 );
   
function bbloomer_remove_shipping_label( $label, $method ) {
    $new_label = preg_replace( '/^.+:/', '', $label );
    return $new_label;
}


/*
 * Woocommerce Remove excerpt from single product
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

/** Display product description the_content */
function dot_do_product_desc() {

    global $woocommerce, $post;

    if ( $post->post_content ) : ?>
        <div itemprop="description" class="descripcion-producto">
         
            <?php the_content(); ?>

        </div>
    <?php endif;
}
add_action( 'woocommerce_single_product_summary', 'dot_do_product_desc', 30 );

/** 16-11-2020
 * @snippet       Add Custom Field @ WooCommerce Checkout Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_action( 'woocommerce_before_order_notes', 'bbloomer_add_custom_checkout_field' );
  
function bbloomer_add_custom_checkout_field( $checkout ) { 
   date_default_timezone_set('America/Santiago');
   
   global $wpdb;

   $hora = date("Hi");
   $hoy = date("Y-m-d");
   $hora = ltrim($hora, "0");
   $hora = (int)$hora;

   //echo $hoy." ".$hora;

   if($hora <= (int)1200) {
       //entrega hoy
        $fecha_entrega = $hoy;
   }else{
       
       //entrega mañana
       $fecha_entrega = date('Y-m-d', strtotime($hoy. ' + 1 days'));
       
   }

   //buscar que el dia de la fecha no caiga en los dias que no reparten
   $dayofweek = date('l', strtotime($fecha_entrega));

   //echo $dayofweek;

   if($dayofweek == 'Sunday') { //domingo
        $fecha_entrega = date('Y-m-d', strtotime($fecha_entrega. ' + 2 days'));
   }elseif($dayofweek == 'Monday') { //lunes
        $fecha_entrega = date('Y-m-d', strtotime($fecha_entrega. ' + 1 days'));
   }

   //buscar que la fecha de entrega no sea un feriado.
   $feriado = $wpdb->get_row($wpdb->prepare("SELECT * FROM feriados WHERE fecha = '$fecha_entrega' ")); 

   if($feriado != "") {
      //print_r($feriado);
      $fecha_entrega = $feriado->fecha_siguiente;
   }


   $fecha_es = explode("-", $fecha_entrega);
   $fecha_es = $fecha_es[2]."-".$fecha_es[1]."-".$fecha_es[0];

   $current_user = wp_get_current_user();
   $saved_delivery_date = $fecha_es;

   echo "<p class='form-row' style='margin-bottom:30px;'><label><b>Fecha de entrega: </b>".$fecha_es."</label><br>";
   echo "<small style='font-size:12px;'> - Pedidos hechos hasta las 12:00 del día: Se entregan el mismo día. <br>
   - Pedidos hechos después de las 12:00 del día: Se entregan al día siguiente. </small></p>";

   echo "<div style='display:none;'>";
   woocommerce_form_field( 'delivery_date', array(        
      'type' => 'text',        
      'class' => array( 'form-row-wide' ),        
      'label' => 'Fecha de entrega',        
      'placeholder' => $fecha_es,        
      'required' => true,        
      'default' => $saved_delivery_date,        
   ), $checkout->get_value( 'delivery_date' ) ); 

   echo "</div>";
}

add_action( 'woocommerce_checkout_update_order_meta', 'bbloomer_save_new_checkout_field' );
  
function bbloomer_save_new_checkout_field( $order_id ) { 
    if ( $_POST['delivery_date'] ) update_post_meta( $order_id, '_delivery_date', esc_attr( $_POST['delivery_date'] ) );
}
  
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'bbloomer_show_new_checkout_field_order', 10, 1 );
   
function bbloomer_show_new_checkout_field_order( $order ) {    
   $order_id = $order->get_id();
   if ( get_post_meta( $order_id, '_delivery_date', true ) ) echo '<p><strong>Fecha de entrega:</strong> ' . get_post_meta( $order_id, '_delivery_date', true ) . '</p>';
}
 
add_action( 'woocommerce_email_after_order_table', 'bbloomer_show_new_checkout_field_emails', 20, 4 );
  
function bbloomer_show_new_checkout_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
    if ( get_post_meta( $order->get_id(), '_delivery_date', true ) ) echo '<p><strong>Fecha de entrega:</strong> ' . get_post_meta( $order->get_id(), '_delivery_date', true ) . '</p>';
}

// Display 'pickup html data' in "Order received" and "Order view" pages (frontend)
add_action( 'woocommerce_order_details_after_customer_details', 'display_store_pickup_data_in_orders', 10 );
function display_store_pickup_data_in_orders( $order ) {
    $pickup_data = get_post_meta( $order->get_id(), '_delivery_date', true );
    if( ! empty( $pickup_data ) )
        echo "<p class='text-left' style='padding: 0 12px;'>Fecha de entrega: ".$pickup_data."</p>";
}

//add_filter( 'woocommerce_show_variation_price', '__return_true');

function ocultar_productos_sin_stock(){
    if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {

        $res = "SI";
        
    }else{
        $res = "NO";
    }
    return $res;
}

/*** solución precios variables  - 26-02-2021 */
/*
function wc_wc20_variation_price_format( $price, $product ) {
    // Main Price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( __( 'Desde: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    // Sale Price
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
    $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'Desde: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    if ( $price !== $saleprice ) {
        $price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
    }
    
    return $price;
}
add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
*/


//solo si ejecuta en caso de url?param=yes
if(isset($_REQUEST['param']))
{
    /**
    
     * Change price format from range to "From:"
    
     *
    
     * @param float $price
    
     * @param obj $product
    
     * @return str
    
     */
    
    
    function iconic_variable_price_format( $price, $product ) {
    
        $prefix = '** '; //sprintf('%s: ', __('From', 'iconic'));
    
    
        $min_price_regular = $product->get_variation_regular_price( 'min', true );
    
        $min_price_sale    = $product->get_variation_sale_price( 'min', true );
    
        $max_price = $product->get_variation_price( 'max', true );
        $min_price = $product->get_variation_price( 'min', true );
    
        $price = ( $min_price_sale == $min_price_regular ) ? wc_price( $min_price_regular ) : 
            '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';
            
        $strinfo = '#' . $product->get_id() . ' ' . "($min_price - $max_price) ";
     
        $val = ( $min_price == $max_price ) ?  $prefix  . $price : sprintf('%s%s', $prefix, $price);
        
        return " $strinfo $val";
    }
    
    function iconic_variable_price_format2( $price, $product ) {
    
       
        $prefix = '** '; //sprintf('%s: ', __('From', 'iconic'));
    
    
        $min_price_regular = $product->get_variation_regular_price( 'min', true );
    
        $min_price_sale    = $product->get_variation_sale_price( 'min', true );
    
        $max_price = get_variation_price_454545( $product, 'max', true );
        $min_price = get_variation_price_454545( $product, 'min', true );
    
        $price = ( $min_price_sale == $min_price_regular ) ? wc_price( $min_price_regular ) : 
            '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';
            
        $strinfo = '#' . $product->get_id() . ' ' . "($min_price - $max_price) ";
     
        $val = ( $min_price == $max_price ) ?  $prefix  . $price : sprintf('%s%s', $prefix, $price);
        
        return " $strinfo $val";
    }
    
    function get_variation_price_454545( $product_var, $min_or_max = 'min', $for_display = false ) 
    {
        
        $prices = $product_var->get_variation_prices( $for_display );
        $price  = 'min' === $min_or_max ? current( $prices['price'] ) : end( $prices['price'] );
        echo("<p>precios array</p><pre>");
        print_r($prices);
        echo("</pre>");
        return apply_filters( 'woocommerce_get_variation_price', $price, $product_var, $min_or_max, $for_display );
      }

    add_filter( 'woocommerce_variable_sale_price_html', 'iconic_variable_price_format2', 9999, 2 );
    add_filter( 'woocommerce_variable_price_html', 'iconic_variable_price_format2', 9999, 2 );
}



