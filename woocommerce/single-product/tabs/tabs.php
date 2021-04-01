<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="wc-tabs flex-grow md:pb-0 flex justify-between lg:justify-start flex-row uppercase" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab px-4 lg:px-12 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
                <li class="<?php echo esc_attr( 'unidades'); ?>_tab px-4 lg:px-12 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" id="tab-title-unidades" role="tab" aria-controls="tab-unidades">
					<a href="#tab-<?php echo esc_attr(  'unidades'); ?>">
						Unidades
					</a>
				</li>
		</ul>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
		<?php endforeach; ?>
            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--unidades panel entry-content wc-tab" id="tab-unidades" role="tabpanel" aria-labelledby="tab-title-unidades">
            
            <?php 
             global $product; 
                $product_id = $product->get_id(); // The product ID
                $related_courses = get_post_meta($product_id, '_related_course');
                foreach ($related_courses as $related_course) {
                    $id = $related_course[0];
                    $url = learndash_get_course_url($id);
                    echo do_shortcode('[course_content course_id="'.$id.'"]');
                }
             ?>
			</div>
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
