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
<div class="flex container max-w-screen-xl mx-auto justify-between flex-row">
    <div class="w-3/5 md:pr-8">
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>
	</div>
    <div class="w-2/5">
		<div class="bg-beige py-4 px-8 sticky top-40">
			<?php
				$product_id = $product->get_id(); // The product ID
				$related_courses = get_post_meta($product_id, '_related_course');
				foreach ($related_courses as $related_course) {
					$id = $related_course[0];
					$url = learndash_get_course_url($id);
				}
				echo do_shortcode('[uo_course_resume course_id="'.$id.'"]');
                //echo do_shortcode('[learndash_login]');
				
				// if(){
				// 	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30 );
				// }
				
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
				<!-- <li class="mb-2 text-sm">
					<span class="mr-2"><i class="fak fa-valoraciones" ></i></span> 98% valoraciones positivas
				</li>
				<li class="mb-2 text-sm">
					<span class="mr-2"><i class="fal fa-user-graduate"></i></span> 112 personas que lo han hecho
				</li> -->
				<?php if( have_rows('ficha-tecnica') ): ?>
					<?php while( have_rows('ficha-tecnica') ): the_row(); 

						$icono 			= get_sub_field('icono');
						$descripcion 	= get_sub_field('descripcion');

					?>
						<li class="mb-2 text-sm">
							<span class="mr-2"><?php the_sub_field('icono'); ?></span> <?php the_sub_field('descripcion'); ?>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>

	</div>


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
