<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>
<div class="mb-4">
<?php
if( is_first_login() == true){
	$first_login = true;
?>
    <h1 class="uppercase text-azul font-bold text-4xl font-festivo6 mb-2">¡Listo!</h1>
    <h2 class="text-2xl mb-2">Ya eres parte de Herencia Colectiva. </h2>
    <h3 class="mb-4">Ahora te invitamos a que recorras nuestros talleres y veas cuál o cuáles te interesan más.</h3>
<?php }else{ ?>
	<p class="mb-4 text-negro">
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
	</p>

	<p class="mb-4 text-negro">
		<?php
		/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
		if ( wc_shipping_enabled() ) {
			/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
			$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
		}
		printf(
			wp_kses( $dashboard_desc, $allowed_html ),
			esc_url( wc_get_endpoint_url( 'orders' ) ),
			esc_url( wc_get_endpoint_url( 'edit-address' ) ),
			esc_url( wc_get_endpoint_url( 'edit-account' ) )
		);
		?>
	</p>	
<?php } ?>

	
	<div class="grid grid-cols-12 gap-2 lg:gap-4">
		<?php

		$params = array(    
			'posts_per_page' => 3, 
			'post_type' => 'product',
			'orderby' => 'rand'
		); // (1)
			$wc_query = new WP_Query($params); // (2)
			$i=0;
		?>
		<?php if ($wc_query->have_posts()) : // (3) ?>
		<?php while ($wc_query->have_posts()) : // (4)
			$i++;
			$wc_query->the_post(); // (4.1) 
			global $woocommerce;
			$product    = new WC_Product( get_the_ID() );
			$image      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'talleres-home' );
		?>            
		<?php if($i<3){
			echo '<div class="col-span-6 lg:col-span-4 mb-8">';
		}else{
			echo '<div class="col-span-4 mb-8 hidden lg:block">';
		}
		?>  
			<div class="relative">
				<a href="<?php the_permalink();?>"><img src="<?php  echo $image[0]; ?>" alt="<?php the_title();?>"></a>
				<p class="product woocommerce add_to_cart_inline absolute bottom-0 right-0 " style="">
					<a href="/?add-to-cart=<?php echo $product->get_id(); ?>" data-quantity="1" class="product_type_course add_to_cart_button ajax_add_to_cart  inline-block mr-4 mb-4 w-10 h-10 leading-10 text-center text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full " data-product_id="274" data-product_sku="" aria-label="Lee más sobre “Huerto Creativo”" rel="nofollow"><i class="fak fa-add-bag"></i></a>
				</p>
			</div>
			<div class="relative mt-3">
				<p class="text-naranjo text-lg lg:text-xl"><?php echo $product->get_price_html();?></p>
				<h4 class="text-negro text-base md:text-lg font-bold leading-tight my-2 lg:my-3"><a href="<?php the_permalink();?>" class="hover:underline text-negro"><?php the_title();?></a></h4>
				<p class="text-negro text-sm">
				<?php
				$terms = get_the_terms( get_the_ID(), 'product_cat' );
				foreach ($terms as $term) {
					if($term->slug!='destacados'){
						echo '<a href="/categoria/'.$term->slug.'" class="mr-4 inline-block hover:underline" title="Ir a la categoría '.$term->name.'"><i class="fak fa-espiga"></i> '.$term->name.'</a>';
					}
				}
				?>
				</p>
			</div>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); // (5) ?>
		<?php else:  ?>
		<p class="text-center mb-0" style="display:block;margin:0 auto;">
		<?php _e( 'No hay Talleres disponibles' ); // (6) ?>
		</p>
		<?php endif; ?>
		
	
	</div>
	<div class="flex flex-wrap justify-between">
		<div class="w-full">
			<div class="mb-24">
				<div class="flex flex-wrap justify-between">
					<div class="w-full">
						<a href="@php bloginfo('url'); @endphp/talleres" class="h-12 px-24 inline-block leading-12 text-center border border-naranjo bg-naranjo border-solid text-beige hover:bg-negro hover:border-negro transition duration-200 uppercase">VER TODOS LOS TALLERES</a>
					</div>
				</div>
			</div>
		</div>
	</div>   
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
