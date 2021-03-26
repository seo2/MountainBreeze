<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="bg-beige py-4 px-8 w-1/3 float-right sticky top-40">
	
		<?php
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
		do_action( 'woocommerce_single_product_summary' );
		?>
		<ul class="mt-4">
			<li class="mb-2 text-sm">
				<i class="fak fa-valoraciones mr-2" ></i> 98% Valoraciones positivas
			</li>
			<li class="mb-2 text-sm">
				<i class="fak fa-online mr-2" ></i> Online y a tu ritmo
			</li>
			<li class="mb-2 text-sm">
				<i class="fak fa-audio mr-2" ></i> Audio: Español
			</li>
			<li class="mb-2 text-sm">
				<i class="fak fa-nivel mr-2" ></i> Nivel: INICIACIÓN
			</li>
			<li class="mb-2 text-sm">
				<i class="fak fa-lecciones mr-2" ></i> 18 Lecciones (2h 18m)
			</li>
			<li class="mb-2 text-sm">
				<i class="fak fa-idioma mr-2" ></i> Español, Inglés
			</li>
			<li class="mb-2 text-sm">
				<i class="fak fa-acceso mr-2" ></i> Acceso ilimitado
			</li>
		</ul>
	</div>

	<!-- Ficha del sidebar:
Disponible a partir del 15 de abril de 2021
XX% de valoraciones positivas (esto dejarlo oculto por ahora, incluirlo cuando tengamos mínimo 10 valoraciones y que el porcentaje sea superior al 85%)
XXX alumnos (esto dejarlo oculto por ahora, activarlo cuando tengamos más de 100)
XXX materiales complementarios para descargar
Audio: español
Subtítulos: sin subtítulos. 
Nivel: inicial (pueden ser: inicial, intermedio, experto)
16 capítulos disponibles (2h 40m)
Disponibilidad: 12 meses a partir del primer visionado de video. 
Incluye clase presencial al término del taller. -->


	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
