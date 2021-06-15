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

	<div class="woocommerce-tabs wc-tabs-wrapper pt-4">
		<ul class="wc-tabs flex-grow md:pb-0 flex justify-between lg:justify-start flex-row uppercase border-b" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab px-4 lg:px-6 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
                <li class="<?php echo esc_attr( 'unidades'); ?>_tab px-4 lg:px-6 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" id="tab-title-unidades" role="tab" aria-controls="tab-unidades">
					<a href="#tab-<?php echo esc_attr(  'unidades'); ?>">
						Unidades
					</a>
				</li>
                <li class="<?php echo esc_attr( 'proyectos'); ?>_tab px-4 lg:px-6 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" id="tab-title-proyectos" role="tab" aria-controls="tab-proyectos">
					<a href="#tab-<?php echo esc_attr(  'proyectos'); ?>">
						Proyectos
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
				<p class="mt-4">
					Estos son los contenidos que veremos en este taller.<br>Puedes revisar las unidades y sus capítulos para conocer más detalles.
				</p>
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
            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--valoraciones panel entry-content wc-tab" id="tab-valoraciones" role="tabpanel" aria-labelledby="tab-title-valoraciones">

                        <div class="flex flex-col my-8">
                            <div class="flex justify-between items-center mb-8">
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-full mr-4" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div>
                                        <i class="fas fa-star text-naranjo"></i>
                                        <i class="fas fa-star text-naranjo"></i>
                                        <i class="fas fa-star text-naranjo"></i>
                                        <i class="fas fa-star text-gris4"></i>
                                        <i class="fas fa-star text-gris4"></i>
                                    </div>
                                </div>
                                <span class="text-gris4">06/10/2020</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna wirl aliqua. Up exlaborum incididunt quis nostrud exercitatn.</p>
                        </div>
                        <hr>
                        <div class="flex flex-col my-8">
                            <div class="flex justify-between items-center mb-8">
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-full mr-4" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div>
                                        <i class="fas fa-star text-naranjo"></i>
                                        <i class="fas fa-star text-naranjo"></i>
                                        <i class="fas fa-star text-naranjo"></i>
                                        <i class="fas fa-star text-gris4"></i>
                                        <i class="fas fa-star text-gris4"></i>
                                    </div>
                                </div>
                                <span class="text-gris4">06/10/2020</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna wirl aliqua. Up exlaborum incididunt quis nostrud exercitatn.</p>
                        </div>
			</div>
            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--valoraciones panel entry-content wc-tab" id="tab-proyectos" role="tabpanel" aria-labelledby="tab-title-proyectos">
			<?php
						$args = array(    
							'posts_per_page' 	=> 2, 
							'post_type' 		=> 'proyectos',
							'meta_query'	 	=> array(
								array(
									'key' 	=> 'taller',
									'value' => $product_id 
								)
							)
						); 
						$proyectos = new WP_Query($args); 
						if ( $proyectos->have_posts() ) { 
					?>
				<div class="grid lg:grid-cols-2 lg:gap-x-16 w-5/6 mx-auto lg:w-full leading-loose mt-4">
					<?php
                            while ( $proyectos->have_posts() ) {
                                $proyectos->the_post();    
					?>
					<a href="<?php the_permalink(); ?>" class="mb-12 block cursor-pointer">
						<?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'w-full' ) ); ?>
						<span class="text-naranjo uppercase text-sm"><?php the_author(); ?></span>
						<h3 class="text-negro uppercase font-festivo6 text-2xl leading-tight"><?php the_title(); ?></h3>
					</a>
					<?php } ?>
					<?php wp_reset_postdata();  ?>
				</div>
					<?php }else{ ?>
					<p class="text-center mt-16" >
						<?php _e( 'Aún no hay proyectos publicados para este taller.' );  ?>
					</p>
					<?php } ?> 
			</div>
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
