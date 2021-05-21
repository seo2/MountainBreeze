<?php
/* Woocommerce support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_woocommerce_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_woocommerce_theme_setup', 1 );
	function lorem_ipsum_books_media_store_woocommerce_theme_setup() {

		if (lorem_ipsum_books_media_store_exists_woocommerce()) {

			add_action('lorem_ipsum_books_media_store_action_add_styles', 				'lorem_ipsum_books_media_store_woocommerce_frontend_scripts' );

			// Detect current page type, taxonomy and title (for custom post_types use priority < 10 to fire it handles early, than for standard post types)
			add_filter('lorem_ipsum_books_media_store_filter_get_blog_type',				'lorem_ipsum_books_media_store_woocommerce_get_blog_type', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_blog_title',			'lorem_ipsum_books_media_store_woocommerce_get_blog_title', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_current_taxonomy',		'lorem_ipsum_books_media_store_woocommerce_get_current_taxonomy', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_is_taxonomy',				'lorem_ipsum_books_media_store_woocommerce_is_taxonomy', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_title',		'lorem_ipsum_books_media_store_woocommerce_get_stream_page_title', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_link',		'lorem_ipsum_books_media_store_woocommerce_get_stream_page_link', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_id',		'lorem_ipsum_books_media_store_woocommerce_get_stream_page_id', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_detect_inheritance_key',	'lorem_ipsum_books_media_store_woocommerce_detect_inheritance_key', 9, 1);
			add_filter('lorem_ipsum_books_media_store_filter_detect_template_page_id',	'lorem_ipsum_books_media_store_woocommerce_detect_template_page_id', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_orderby_need',				'lorem_ipsum_books_media_store_woocommerce_orderby_need', 9, 2);

			add_filter('lorem_ipsum_books_media_store_filter_show_post_navi', 			'lorem_ipsum_books_media_store_woocommerce_show_post_navi');
			add_filter('lorem_ipsum_books_media_store_filter_list_post_types', 			'lorem_ipsum_books_media_store_woocommerce_list_post_types');

			add_action('woocommerce_product_options_pricing',	   'lorem_ipsum_books_media_store_add_author_field');
			add_action('save_post',								 'lorem_ipsum_books_media_store_save_author_field');
			add_action('woocommerce_single_product_summary',		'lorem_ipsum_books_media_store_show_author_field_single_page', 39);
			add_action('woocommerce_shop_loop_item_title',		  'lorem_ipsum_books_media_store_show_author_field_category_page');
			remove_action('woocommerce_before_shop_loop',		   'woocommerce_result_count', 20);
			remove_action('woocommerce_before_main_content',		'woocommerce_breadcrumb', 20);
			remove_action('woocommerce_single_product_summary',	 'woocommerce_template_single_sharing', 50);
			add_action('woocommerce_single_product_summary',		'lorem_ipsum_books_media_store_add_single_sharing', 51);

			// Author tags
			if (!function_exists('lorem_ipsum_books_media_store_book_author')) {
			function lorem_ipsum_books_media_store_book_author(){

					lorem_ipsum_books_media_store_require_data('taxonomy', 'authors', array(
							'post_type' => array('product'),
							'hierarchical' => true,
							'labels' => array(
								'name' => esc_html_x('Authors', 'Taxonomy General Name', 'lorem-ipsum-books-media-store'),
								'singular_name' => esc_html_x('Author', 'Taxonomy Singular Name', 'lorem-ipsum-books-media-store'),
								'menu_name' => esc_html__('Author', 'lorem-ipsum-books-media-store'),
								'all_items' => esc_html__('All Authors', 'lorem-ipsum-books-media-store'),
								'parent_item' => esc_html__('Parent Author', 'lorem-ipsum-books-media-store'),
								'parent_item_colon' => esc_html__('Parent Author:', 'lorem-ipsum-books-media-store'),
								'new_item_name' => esc_html__('New Author Name', 'lorem-ipsum-books-media-store'),
								'add_new_item' => esc_html__('Add New Author', 'lorem-ipsum-books-media-store'),
								'edit_item' => esc_html__('Edit Author', 'lorem-ipsum-books-media-store'),
								'update_item' => esc_html__('Update Author', 'lorem-ipsum-books-media-store'),
								'separate_items_with_commas' => esc_html__('Separate authors with commas', 'lorem-ipsum-books-media-store'),
								'search_items' => esc_html__('Search authors', 'lorem-ipsum-books-media-store'),
								'add_or_remove_items' => esc_html__('Add or remove authors', 'lorem-ipsum-books-media-store'),
								'choose_from_most_used' => esc_html__('Choose from the most used authors', 'lorem-ipsum-books-media-store'),
							),
							'show_ui' => true,
							'show_admin_column' => true,
							'query_var' => true,
							'rewrite' => array('slug' => 'authors')
						)
					);

				}
			}

			// Hook into the 'init' action
			add_action('init', 'lorem_ipsum_books_media_store_book_author', 0);


		}

		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',					'lorem_ipsum_books_media_store_woocommerce_required_plugins' );
		}
	}
}

// Add 'Author' field
if ( !function_exists( 'lorem_ipsum_books_media_store_add_author_field' ) ) {
	function lorem_ipsum_books_media_store_add_author_field() {
		woocommerce_wp_text_input( array( 'id' => 'product_author', 'class' => 'wc_input_author', 'label' => esc_html__( 'Author', 'lorem-ipsum-books-media-store' ) ) );
	}
}

// Save 'Author' field
if ( !function_exists( 'lorem_ipsum_books_media_store_save_author_field' ) ) {
	function lorem_ipsum_books_media_store_save_author_field($product_id) {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if (isset($_POST['product_author'])) {
			update_post_meta($product_id, 'product_author', sanitize_text_field($_POST['product_author']));
		}
	}
}

// Show 'Author' field in single product page
if ( !function_exists( 'lorem_ipsum_books_media_store_show_author_field_single_page' ) ) {
	function lorem_ipsum_books_media_store_show_author_field_single_page() {?>
		<div class="data-top">
			<div class="woocommerce_product_author">
				<span class="woocommerce_product_author_name">
					<?php
					global $post, $authors, $product;
					$old_author = get_post_meta( $product->get_id(), 'product_author', true );
					$authors = wp_get_object_terms($post->ID, 'authors');
					if (!is_wp_error( $authors ) && (!empty($authors) || !empty($old_author) )){
						esc_html_e('Author: ', 'lorem-ipsum-books-media-store');
						if (!empty($authors)){
							foreach ($authors as $author) { ?>
							<a href="<?php echo esc_url(get_term_link($author->slug, 'authors')); ?>"><?php echo  esc_html($author->name) . ' '; ?></a>
							<?php
							}
						}
						if (empty($authors) && !empty($old_author)){
							echo '<span> ' . esc_html($old_author) . '</span>';
						}
					}?>
				</span>
			</div>
		</div>
		<?php
	}
}

// Show 'Author' field in category page
if ( !function_exists( 'lorem_ipsum_books_media_store_show_author_field_category_page' ) ) {
	function lorem_ipsum_books_media_store_show_author_field_category_page() {
		?>
		<div class="woocommerce_product_author">
			<span class="woocommerce_product_author_name">
				<?php
				global $post, $authors, $product;
				$old_author = get_post_meta( $product->get_id(), 'product_author', true );
				$authors = wp_get_object_terms($post->ID, 'authors');
				if (!empty($authors) || !empty($old_author) ){
					esc_html_e('By', 'lorem-ipsum-books-media-store');
					if (is_array($authors) && count($authors)>0) {
						foreach ($authors as $author) {
							?>
							<a href="<?php echo esc_url(get_term_link($author->slug, 'authors')); ?>"><?php echo  esc_html($author->name) . ' '; ?></a>
							<?php
						}
					}
					if (empty($authors) && !empty($old_author)){
						echo ' ' . esc_html($old_author);
					}
				}?>
			</span>
		</div>
		<?php
	}
}

// Add sharing buttons on single product page
if ( !function_exists( 'lorem_ipsum_books_media_store_add_single_sharing' ) ) {
	function lorem_ipsum_books_media_store_add_single_sharing() {
		$show_share = lorem_ipsum_books_media_store_get_custom_option("show_share");
		if (!lorem_ipsum_books_media_store_param_is_off($show_share) && function_exists('lorem_ipsum_books_media_store_show_share_links')) {
			$rez = lorem_ipsum_books_media_store_show_share_links(array(
				'post_id'	=> get_the_ID(),
				'post_link'  => get_post_permalink(),
				'post_title' => get_the_title(),
				'post_descr' => strip_tags(get_the_excerpt()),
				'post_thumb' => get_the_post_thumbnail(),
				'type'		 => 'block',
				'echo'		 => false
			));
			if ($rez) {
				?>
				<div class="woocommerce_product_share woocommerce_product_share_<?php echo esc_attr($show_share); ?>"><?php lorem_ipsum_books_media_store_show_layout($rez); ?></div>
			<?php
			}
		}
	}
}

// Redefine post_type if number of related products == 0
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_related_products_args' ) ) {
	add_filter( 'woocommerce_related_products_args', 'lorem_ipsum_books_media_store_woocommerce_related_products_args' );
	function lorem_ipsum_books_media_store_woocommerce_related_products_args($args) {
		if ($args['posts_per_page'] == 0)
			$args['post_type'] .= '_';
		return $args;
	}
}

if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_settings_theme_setup2' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_woocommerce_settings_theme_setup2', 3 );
	function lorem_ipsum_books_media_store_woocommerce_settings_theme_setup2() {
		if (lorem_ipsum_books_media_store_exists_woocommerce()) {
			// Add WooCommerce pages in the Theme inheritance system
			lorem_ipsum_books_media_store_add_theme_inheritance( array( 'woocommerce' => array(
				'stream_template' => 'blog-woocommerce',		// This params must be empty
				'single_template' => 'single-woocommerce',		// They are specified to enable separate settings for blog and single wooc
				'taxonomy' => array('product_cat'),
				'taxonomy_tags' => array('product_tag'),
				'post_type' => array('product'),
				'override' => 'page'
				) )
			);

			// Add WooCommerce specific options in the Theme Options

			lorem_ipsum_books_media_store_storage_set_array_before('options', 'partition_service', array(

				"partition_woocommerce" => array(
					"title" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
					"icon" => "iconadmin-basket",
					"type" => "partition"),

				"info_wooc_1" => array(
					"title" => esc_html__('WooCommerce products list parameters', 'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("Select WooCommerce products list's style and crop parameters", 'lorem-ipsum-books-media-store'),
					"type" => "info"),

				"shop_mode" => array(
					"title" => esc_html__('Shop list style',  'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("WooCommerce products list's style: thumbs or list with description", 'lorem-ipsum-books-media-store'),
					"std" => "thumbs",
					"divider" => false,
					"options" => array(
						'thumbs' => esc_html__('Thumbs', 'lorem-ipsum-books-media-store'),
						'list' => esc_html__('List', 'lorem-ipsum-books-media-store')
					),
					"type" => "hidden"), //checklist

				"show_mode_buttons" => array(
					"title" => esc_html__('Show style buttons',  'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("Show buttons to allow visitors change list style", 'lorem-ipsum-books-media-store'),
					"std" => "no",
					"options" => lorem_ipsum_books_media_store_get_options_param('list_yes_no'),
					"type" => "hidden"), //switch

				"show_currency" => array(
					"title" => esc_html__('Show currency selector', 'lorem-ipsum-books-media-store'),
					"desc" => esc_html__('Show currency selector in the user menu', 'lorem-ipsum-books-media-store'),
					"std" => "no",
					"options" => lorem_ipsum_books_media_store_get_options_param('list_yes_no'),
					"type" => "switch"),

				"show_cart" => array(
					"title" => esc_html__('Show cart button', 'lorem-ipsum-books-media-store'),
					"desc" => esc_html__('Show cart button in the user menu', 'lorem-ipsum-books-media-store'),
					"std" => "always",
					"options" => array(
						'hide'   => esc_html__('Hide', 'lorem-ipsum-books-media-store'),
						'always' => esc_html__('Always', 'lorem-ipsum-books-media-store'),
						'shop'   => esc_html__('Only on shop pages', 'lorem-ipsum-books-media-store')
					),
					"type" => "checklist"),

				"crop_product_thumb" => array(
					"title" => esc_html__("Crop product's thumbnail",  'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("Crop product's thumbnails on search results page or scale it", 'lorem-ipsum-books-media-store'),
					"std" => "no",
					"options" => lorem_ipsum_books_media_store_get_options_param('list_yes_no'),
					"type" => "switch")

				)
			);

		}
	}
}

// WooCommerce hooks
if (!function_exists('lorem_ipsum_books_media_store_woocommerce_theme_setup3')) {
	add_action( 'lorem_ipsum_books_media_store_action_after_init_theme', 'lorem_ipsum_books_media_store_woocommerce_theme_setup3' );
	function lorem_ipsum_books_media_store_woocommerce_theme_setup3() {

		if (lorem_ipsum_books_media_store_exists_woocommerce()) {

			add_action(	'woocommerce_before_subcategory_title',		'lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper', 9 );
			add_action(	'woocommerce_before_shop_loop_item_title',	'lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper', 9 );

			add_action(	'woocommerce_before_subcategory_title',		'lorem_ipsum_books_media_store_woocommerce_open_item_wrapper', 20 );
			add_action(	'woocommerce_before_shop_loop_item_title',	'lorem_ipsum_books_media_store_woocommerce_open_item_wrapper', 20 );

			add_action(	'woocommerce_after_subcategory',				'lorem_ipsum_books_media_store_woocommerce_close_item_cat_wrapper', 20 );
			add_action(	'woocommerce_after_shop_loop_item',			'lorem_ipsum_books_media_store_woocommerce_close_item_wrapper', 20 );

			add_action(	'woocommerce_after_shop_loop_item_title',	'lorem_ipsum_books_media_store_woocommerce_after_shop_loop_item_title', 7);

			add_action(	'woocommerce_after_subcategory_title',		'lorem_ipsum_books_media_store_woocommerce_after_subcategory_title', 10 );

			// Remove link around product item
			remove_action('woocommerce_before_shop_loop_item',			'woocommerce_template_loop_product_link_open', 10);
			remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_product_link_close', 5);

			// Remove link around product category
						remove_action('woocommerce_after_subcategory',				'woocommerce_template_loop_category_link_close', 10);

			// Remove native 'Add to cart' button and adding new one
			remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_add_to_cart', 10);
			add_action('woocommerce_before_shop_loop_item_title',	   'lorem_ipsum_books_media_store_before_button_container', 11);
			add_action('woocommerce_before_shop_loop_item_title',	   'woocommerce_template_loop_add_to_cart', 12);
			add_action('woocommerce_before_shop_loop_item_title',	   'lorem_ipsum_books_media_store_after_button_container', 13);

			remove_action( 'woocommerce_shop_loop_item_title',		  'woocommerce_template_loop_product_title', 10);
			add_action(	'woocommerce_shop_loop_item_title',		  'lorem_ipsum_books_media_store_linked_product_title', 9);

			remove_action( 'woocommerce_shop_loop_subcategory_title',		  'woocommerce_template_loop_category_title', 10);
			add_action(	'woocommerce_shop_loop_subcategory_title',		  'lorem_ipsum_books_media_store_woocommerce_template_loop_category_title', 10);

			// Add 'Out of stock' label
			add_action( 'lorem_ipsum_books_media_store_action_woocommerce_item_featured_link_start', 'lorem_ipsum_books_media_store_woocommerce_add_out_of_stock_label' );

		}

		if (lorem_ipsum_books_media_store_is_woocommerce_page()) {

			remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 10 );					// Remove WOOC sidebar

			remove_action( 'woocommerce_before_main_content',			'woocommerce_output_content_wrapper', 10);
			add_action(	'woocommerce_before_main_content',			'lorem_ipsum_books_media_store_woocommerce_wrapper_start', 10);

			remove_action( 'woocommerce_after_main_content',			'woocommerce_output_content_wrapper_end', 10);
			add_action(	'woocommerce_after_main_content',			'lorem_ipsum_books_media_store_woocommerce_wrapper_end', 10);

			add_action(	'woocommerce_show_page_title',				'lorem_ipsum_books_media_store_woocommerce_show_page_title', 10);

			remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_title', 5);
			add_action(	'woocommerce_single_product_summary',		'lorem_ipsum_books_media_store_woocommerce_show_product_title', 5 );

			add_action(	'woocommerce_before_shop_loop', 				'lorem_ipsum_books_media_store_woocommerce_before_shop_loop', 10 );

			remove_action( 'woocommerce_after_shop_loop',				'woocommerce_pagination', 10 );
			add_action(	'woocommerce_after_shop_loop',				'lorem_ipsum_books_media_store_woocommerce_pagination', 10 );

			add_action(	'woocommerce_product_meta_end',				'lorem_ipsum_books_media_store_woocommerce_show_product_id', 10);

			add_filter(	'woocommerce_output_related_products_args',	'lorem_ipsum_books_media_store_woocommerce_output_related_products_args' );




			add_filter(	'woocommerce_product_thumbnails_columns',	'lorem_ipsum_books_media_store_woocommerce_product_thumbnails_columns' );

			add_filter(	'get_product_search_form',				  'lorem_ipsum_books_media_store_woocommerce_get_product_search_form' );

			add_filter(	'post_class',								'lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class' );
			add_filter(	'product_cat_class',							'lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class', 10, 3 );

			lorem_ipsum_books_media_store_enqueue_popup();
		}
	}
}

// Add label 'out of stock'
if ( ! function_exists( 'lorem_ipsum_books_media_store_woocommerce_add_out_of_stock_label' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_add_out_of_stock_label() {
		global $product;
		if ( is_object( $product ) && ! $product->is_in_stock() ) {
			?>
			<span class="outofstock_label"><?php esc_html_e( 'Out of stock', 'lorem-ipsum-books-media-store' ); ?></span>
			<?php
		}
	}
}

// Check if WooCommerce installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_woocommerce' ) ) {
	function lorem_ipsum_books_media_store_exists_woocommerce() {
		return class_exists('Woocommerce');
	}
}

// Return true, if current page is any woocommerce page
if ( !function_exists( 'lorem_ipsum_books_media_store_is_woocommerce_page' ) ) {
	function lorem_ipsum_books_media_store_is_woocommerce_page() {
		$rez = false;
		if (lorem_ipsum_books_media_store_exists_woocommerce()) {
			if (!lorem_ipsum_books_media_store_storage_empty('pre_query')) {
				$id = lorem_ipsum_books_media_store_storage_get_obj_property('pre_query', 'queried_object_id', 0);
				$rez = lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'get', 'post_type')=='product'
						|| $id==wc_get_page_id('shop')
						|| $id==wc_get_page_id('cart')
						|| $id==wc_get_page_id('checkout')
						|| $id==wc_get_page_id('myaccount')
						|| lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'is_tax', 'product_cat')
						|| lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'is_tax', 'product_tag')
						|| lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'is_tax', get_object_taxonomies('product'));

			} else
				$rez = is_woocommerce() || is_shop() || is_product() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_cart() || is_checkout() || is_account_page();
		}
		return $rez;
	}
}

// Filter to detect current page inheritance key
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_detect_inheritance_key' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_detect_inheritance_key($key) {
		if (!empty($key)) return $key;
		return lorem_ipsum_books_media_store_is_woocommerce_page() ? 'woocommerce' : '';
	}
}

// Filter to detect current template page id
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_detect_template_page_id' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_detect_template_page_id($id, $key) {
		if (!empty($id)) return $id;
		if ($key == 'woocommerce_cart')				$id = get_option('woocommerce_cart_page_id');
		else if ($key == 'woocommerce_checkout')	$id = get_option('woocommerce_checkout_page_id');
		else if ($key == 'woocommerce_account')		$id = get_option('woocommerce_account_page_id');
		else if ($key == 'woocommerce')				$id = get_option('woocommerce_shop_page_id');
		return $id;
	}
}

// Filter to detect current page type (slug)
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_blog_type' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_get_blog_type($page, $query=null) {
		if (!empty($page)) return $page;

		if (is_shop()) 					$page = 'woocommerce_shop';
		else if ($query && $query->get('post_type')=='product' || is_product())		$page = 'woocommerce_product';
		else if ($query && $query->get('product_tag')!='' || is_product_tag())		$page = 'woocommerce_tag';
		else if ($query && $query->get('product_cat')!='' || is_product_category())	$page = 'woocommerce_category';
		else if (is_cart())				$page = 'woocommerce_cart';
		else if (is_checkout())			$page = 'woocommerce_checkout';
		else if (is_account_page())		$page = 'woocommerce_account';
		else if (is_woocommerce())		$page = 'woocommerce';
		return $page;
	}
}

// Filter to detect current page title
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_blog_title' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_get_blog_title($title, $page) {
		if (!empty($title)) return $title;

		if ( lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false ) {
			if ( $page == 'woocommerce_category' ) {
				$term = get_term_by( 'slug', get_query_var( 'product_cat' ), 'product_cat', OBJECT);
				$title = $term->name;
			} else if ( $page == 'woocommerce_tag' ) {
				$term = get_term_by( 'slug', get_query_var( 'product_tag' ), 'product_tag', OBJECT);
				$title = esc_html__('Tag:', 'lorem-ipsum-books-media-store') . ' ' . esc_html($term->name);
			} else if ( $page == 'woocommerce_cart' ) {
				$title = esc_html__( 'Your cart', 'lorem-ipsum-books-media-store' );
			} else if ( $page == 'woocommerce_checkout' ) {
				$title = esc_html__( 'Checkout', 'lorem-ipsum-books-media-store' );
			} else if ( $page == 'woocommerce_account' ) {
				$title = esc_html__( 'Account', 'lorem-ipsum-books-media-store' );
			} else if ( $page == 'woocommerce_product' ) {
				$title = lorem_ipsum_books_media_store_get_post_title();
			} else if (($page_id=get_option('woocommerce_shop_page_id')) > 0) {
				$title = lorem_ipsum_books_media_store_get_post_title($page_id);
			} else {
				$title = esc_html__( 'Shop', 'lorem-ipsum-books-media-store' );
			}
		}

		return $title;
	}
}

// Filter to detect stream page title
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_stream_page_title' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_get_stream_page_title($title, $page) {
		if (!empty($title)) return $title;
		if (lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false) {
			if (($page_id = lorem_ipsum_books_media_store_woocommerce_get_stream_page_id(0, $page)) > 0)
				$title = lorem_ipsum_books_media_store_get_post_title($page_id);
			else
				$title = esc_html__('Shop', 'lorem-ipsum-books-media-store');
		}
		return $title;
	}
}

// Filter to detect stream page ID
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_stream_page_id' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_get_stream_page_id($id, $page) {
		if (!empty($id)) return $id;
		if (lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false) {
			$id = get_option('woocommerce_shop_page_id');
		}
		return $id;
	}
}

// Filter to detect stream page link
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_stream_page_link' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_get_stream_page_link($url, $page) {
		if (!empty($url)) return $url;
		if (lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false) {
			$id = lorem_ipsum_books_media_store_woocommerce_get_stream_page_id(0, $page);
			if ($id) $url = get_permalink($id);
		}
		return $url;
	}
}

// Filter to detect current taxonomy
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_current_taxonomy' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_get_current_taxonomy($tax, $page) {
		if (!empty($tax)) return $tax;
		if ( lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false ) {
			$tax = 'product_cat';
		}
		return $tax;
	}
}

// Return taxonomy name (slug) if current page is this taxonomy page
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_is_taxonomy' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_is_taxonomy($tax, $query=null) {
		if (!empty($tax))
			return $tax;
		else
			return $query!==null && $query->get('product_cat')!='' || is_product_category() ? 'product_cat' : '';
	}
}

// Return false if current plugin not need theme orderby setting
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_orderby_need' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_orderby_need($need) {
		if ($need == false || lorem_ipsum_books_media_store_storage_empty('pre_query'))
			return $need;
		else {
			return lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'get', 'post_type')!='product'
					&& lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'get', 'product_cat')==''
					&& lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'get', 'product_tag')=='';
		}
	}
}

// Add custom post type into list
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_list_post_types' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_list_post_types($list) {
		$list['product'] = esc_html__('Products', 'lorem-ipsum-books-media-store');
		return $list;
	}
}



// Enqueue WooCommerce custom styles
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_frontend_scripts' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_frontend_scripts() {
		if (lorem_ipsum_books_media_store_is_woocommerce_page() || lorem_ipsum_books_media_store_get_custom_option('show_cart')=='always')
			if (file_exists(lorem_ipsum_books_media_store_get_file_dir('css/plugin.woocommerce.css')))
				wp_enqueue_style( 'lorem-ipsum-books-media-store-plugin-woocommerce-style',  lorem_ipsum_books_media_store_get_file_url('css/plugin.woocommerce.css'), array(), null );
	}
}

// Before main content
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_wrapper_start' ) ) {
		function lorem_ipsum_books_media_store_woocommerce_wrapper_start() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			<article class="post_item post_item_single post_item_product">
			<?php
		} else {
			?>
			<div class="list_products shop_mode_<?php echo !lorem_ipsum_books_media_store_storage_empty('shop_mode') ? lorem_ipsum_books_media_store_storage_get('shop_mode') : 'thumbs'; ?>">
			<?php
		}
	}
}

// After main content
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_wrapper_end' ) ) {
		function lorem_ipsum_books_media_store_woocommerce_wrapper_end() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			</article>	<!-- .post_item -->
			<?php
		} else {
			?>
			</div>	<!-- .list_products -->
			<?php
		}
	}
}

// Check to show page title
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_show_page_title' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_show_page_title($defa=true) {
		return lorem_ipsum_books_media_store_get_custom_option('show_page_title')=='no';
	}
}

// Check to show product title
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_show_product_title' ) ) {
		function lorem_ipsum_books_media_store_woocommerce_show_product_title() {
		if (lorem_ipsum_books_media_store_get_custom_option('show_post_title')=='yes' || lorem_ipsum_books_media_store_get_custom_option('show_page_title')=='no') {
			wc_get_template( 'single-product/title.php' );
		}
	}
}

// Add list mode buttons
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_before_shop_loop' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_before_shop_loop() {
			echo '';
	}
}


// Open thumbs wrapper for categories and products
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper($cat='') {
		lorem_ipsum_books_media_store_storage_set('in_product_item', true);
		?>
		<div class="post_item_wrap">
			<div class="post_featured">
				<div class="post_thumb">
		<?php
	}
}

// Add 'Add to cart' button wrapper into thumbnail wrapper
if ( !function_exists('lorem_ipsum_books_media_store_before_button_container') ) {
	function lorem_ipsum_books_media_store_before_button_container() {
		?>
		<span class="woocommerce_add_to_cart_button_container">
			<span class="woocommerce_add_to_cart_button_box">
		<?php
	}
}
if ( !function_exists('lorem_ipsum_books_media_store_after_button_container') ) {
	function lorem_ipsum_books_media_store_after_button_container() {
		?>
			</span>
		</span>
		<?php
	}
}

// Open item wrapper for categories and products
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_open_item_wrapper' ) ) {
		function lorem_ipsum_books_media_store_woocommerce_open_item_wrapper($cat='') {
		?>
			</div>
		</div>
		<div class="post_content">
		<?php
		do_action( 'lorem_ipsum_books_media_store_action_woocommerce_item_featured_link_start' );
	}
}

// Close item wrapper for products
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_close_item_wrapper' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_close_item_wrapper($cat='') {
		?>
				</div>
			</div>
		<?php
		lorem_ipsum_books_media_store_storage_set('in_product_item', false);
	}
}

// Close item wrapper for categories
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_close_item_cat_wrapper' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_close_item_cat_wrapper($cat='') {
		?>
				</div>
			</div>
		</a>
		<?php
		lorem_ipsum_books_media_store_storage_set('in_product_item', false);
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_after_shop_loop_item_title' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_after_shop_loop_item_title() {
		if (lorem_ipsum_books_media_store_storage_get('shop_mode') == 'list') {
			$excerpt = apply_filters('the_excerpt', get_the_excerpt());
			echo '<div class="description">'.trim($excerpt).'</div>';
		}
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_after_subcategory_title' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_after_subcategory_title($category) {
		if (lorem_ipsum_books_media_store_storage_get('shop_mode') == 'list')
			echo '<div class="description">' . trim($category->description) . '</div>';
	}
}

// Add Product ID for single product
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_show_product_id' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_show_product_id() {
		global $post, $product;
		echo '<span class="product_id">' . esc_html__('Product ID: ', 'lorem-ipsum-books-media-store') . '<span>' . ($post->ID) . '</span></span>';
	}
}

// Redefine number of related products
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_output_related_products_args' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_output_related_products_args($args) {
		$ppp = $ccc = 0;
		if (lorem_ipsum_books_media_store_param_is_on(lorem_ipsum_books_media_store_get_custom_option('show_post_related'))) {
			$ccc_add = in_array(lorem_ipsum_books_media_store_get_custom_option('body_style'), array('fullwide', 'fullscreen')) ? 1 : 0;
			$ccc =  lorem_ipsum_books_media_store_get_custom_option('post_related_columns');
			$ccc = $ccc > 0 ? $ccc : (lorem_ipsum_books_media_store_param_is_off(lorem_ipsum_books_media_store_get_custom_option('show_sidebar_main')) ? 3+$ccc_add : 2+$ccc_add);
			$ppp = lorem_ipsum_books_media_store_get_custom_option('post_related_count');
			$ppp = $ppp > 0 ? $ppp : $ccc;
		}
		$args['posts_per_page'] = $ppp;
		$args['columns'] = $ccc;
		return $args;
	}
}

// Number columns for product thumbnails
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_product_thumbnails_columns' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_product_thumbnails_columns($cols) {
		return 4;
	}
}

// Add column class into product item in shop streampage
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class($class, $class2='', $cat='') {
		if (!is_product() && !is_cart() && !is_checkout() && !is_account_page()) {
			$cols = function_exists('wc_get_default_products_per_row') ? wc_get_default_products_per_row() : 2;
			$class[] = ' column-1_' . $cols;
		}
		return $class;
	}
}

// Search form
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_product_search_form' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_get_product_search_form($form) {
		return '
		<form role="search" method="get" class="search_form" action="' . esc_url(home_url('/')) . '">
			<input type="text" class="search_field" placeholder="' . esc_attr__('Search', 'lorem-ipsum-books-media-store') . '" value="' . esc_attr(get_search_query()) . '" name="s" title="' . esc_attr__('Search for products:', 'lorem-ipsum-books-media-store') . '" /><button class="search_button icon-search" type="submit"></button>
			<input type="hidden" name="post_type" value="product" />
		</form>
		';
	}
}

// Wrap product title into link
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_the_title' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_the_title($title) {
		if (lorem_ipsum_books_media_store_storage_get('in_product_item') && get_post_type()=='product') {
			$title = '<a href="'.esc_url(get_permalink()).'">'.($title).'</a>';
		}
		return $title;
	}
}
if ( !function_exists( 'lorem_ipsum_books_media_store_linked_product_title' ) ) {
	function lorem_ipsum_books_media_store_linked_product_title() {
		?>
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<?php
	}
}

// Category shortcode title replace
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_template_loop_category_title' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_template_loop_category_title( $category ) {
		?>
		<h3>
			<?php
			lorem_ipsum_books_media_store_show_layout($category->name);

			if ( $category->count > 0 )
				echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
			?>
		</h3>
	<?php
	}
}

// Show pagination links
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_pagination' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_pagination() {
		if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
			return;
		}
		$style = lorem_ipsum_books_media_store_get_custom_option('blog_pagination');
		lorem_ipsum_books_media_store_show_pagination(array(
			'class' => 'pagination_wrap pagination_' . esc_attr($style),
			'style' => $style,
			'button_class' => '',
			'first_text'=> '',
			'last_text' => '',
			'prev_text' => 'Prev',
			'next_text' => 'Next',
			'pages_in_group' => $style=='pages' ? 10 : 20
			)
		);
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_required_plugins' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_required_plugins($list=array()) {
		if (in_array('woocommerce', lorem_ipsum_books_media_store_storage_get('required_plugins'))) {
			$list[] = array(
				'name' 		=> esc_html__( 'WooCommerce', 'lorem-ipsum-books-media-store' ),
				'slug' 		=> 'woocommerce',
				'required' 	=> false
			);
			$list[] = array(
				'name' 		=> esc_html__( 'elegro Crypto Payment', 'lorem-ipsum-books-media-store' ),
				'slug' 		=> 'elegro-payment',
				'required' 	=> false
			);
		}

		return $list;
	}
}

// Show products navigation
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_show_post_navi' ) ) {
	function lorem_ipsum_books_media_store_woocommerce_show_post_navi($show=false) {
		return $show;
	}
}

?>