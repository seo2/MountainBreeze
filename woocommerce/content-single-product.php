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
<div class="flex container max-w-screen-xl mx-auto justify-between flex-col md:flex-row">
    <div class="w-full md:w-3/5 md:pr-8">
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
    <div class="w-full md:w-2/5 mb-10 md:mb-0">
		<div class="bg-beige py-4 px-4 md:px-8 md:sticky md:top-36">
			<?php
				$product_id 		= $product->get_id(); // The product ID
				$related_courses 	= get_post_meta($product_id, '_related_course');
				foreach ($related_courses as $related_course) {
					$id = $related_course[0];
					$url = learndash_get_course_url($id);
				}

				$completado = "
					<a href='$url' class='flex py-4 text-left bg-rosado text-negro hover:bg-negro hover:text-beige leading-5 mb-3 col-span-1 justify-center transition duration-200 uppercase'>¡Taller Completado!</a>
				";


				echo '<div class="">';
					echo do_shortcode("[course_inprogress course_id='$id'][uo_course_resume course_id='$id'][/course_inprogress]");
					echo do_shortcode("[course_complete course_id='$id']".$completado."[/course_complete]");
				echo '</div>';

            	$user_id    = get_current_user_id();
				$cursos     = learndash_user_get_enrolled_courses($user_id);
				$count      = count($cursos);
				$is_in_array = in_array( $id, $cursos );
				if ($is_in_array) {
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30 );
				}
				
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
				echo '<div class="border-solid border-t-8 border-naranjo md:border-none fixed md:static bottom-0 md:block z-10 bg-beige left-0 w-full px-4 pt-2 md:p-0">';
				do_action( 'woocommerce_single_product_summary' );
				echo '</div>';
			?>
			<ul class="mt-2">
				<!-- <li class="mb-2 text-sm flex">
					<span class="mr-2"><i class="fak fa-valoraciones" ></i></span> 98% valoraciones positivas
				</li>
				<li class="mb-2 text-sm flex">
					<span class="mr-2"><i class="fal fa-user-graduate"></i></span> 112 personas que lo han hecho
				</li> -->
				<?php if( have_rows('ficha-tecnica') ): ?>
					<?php while( have_rows('ficha-tecnica') ): the_row(); 

						$icono 			= get_sub_field('icono');
						$descripcion 	= get_sub_field('descripcion');

					?>
						<li class="mb-2 text-sm flex">
							<span class="mr-2 w-6"><?php the_sub_field('icono'); ?></span> <?php the_sub_field('descripcion'); ?>
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
