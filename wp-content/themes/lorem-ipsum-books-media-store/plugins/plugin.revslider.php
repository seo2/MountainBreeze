<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_revslider_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_revslider_theme_setup', 1 );
	function lorem_ipsum_books_media_store_revslider_theme_setup() {
		if (lorem_ipsum_books_media_store_exists_revslider()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_list_sliders',					'lorem_ipsum_books_media_store_revslider_list_sliders' );
			add_filter( 'lorem_ipsum_books_media_store_filter_shortcodes_params',			'lorem_ipsum_books_media_store_revslider_shortcodes_params' );
			add_filter( 'lorem_ipsum_books_media_store_filter_theme_options_params',			'lorem_ipsum_books_media_store_revslider_theme_options_params' );
		}
		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',				'lorem_ipsum_books_media_store_revslider_required_plugins' );
		}
	}
}

if ( !function_exists( 'lorem_ipsum_books_media_store_revslider_settings_theme_setup2' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_revslider_settings_theme_setup2', 3 );
	function lorem_ipsum_books_media_store_revslider_settings_theme_setup2() {
		if (lorem_ipsum_books_media_store_exists_revslider()) {

			// Add Revslider specific options in the Theme Options
			lorem_ipsum_books_media_store_storage_set_array_after('options', 'slider_engine', "slider_alias", array(
					"title" => esc_html__('Revolution Slider: Select slider',  'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Select slider to show (if engine=revo in the field above)", 'lorem-ipsum-books-media-store') ),
					"override" => "category,services_group,page",
					"dependency" => array(
						'show_slider' => array('yes'),
						'slider_engine' => array('revo')
					),
					"std" => "",
					"options" => lorem_ipsum_books_media_store_get_options_param('list_revo_sliders'),
					"type" => "select"
				)
			);

		}
	}
}

// Check if RevSlider installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_revslider' ) ) {
	function lorem_ipsum_books_media_store_exists_revslider() {
		return function_exists('rev_slider_shortcode');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_revslider_required_plugins' ) ) {
	function lorem_ipsum_books_media_store_revslider_required_plugins($list=array()) {
		if (in_array('revslider', lorem_ipsum_books_media_store_storage_get('required_plugins'))) {
			$path = lorem_ipsum_books_media_store_get_file_dir('plugins/install/revslider.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('Revolution Slider', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'revslider',
					'source'	=> $path,
                    'version'   => '6.3.6',
					'required' 	=> false
				);
			}
		}
		return $list;
	}
}


// Lists
//------------------------------------------------------------------------

// Add RevSlider in the sliders list, prepended inherit (if need)
if ( !function_exists( 'lorem_ipsum_books_media_store_revslider_list_sliders' ) ) {
	function lorem_ipsum_books_media_store_revslider_list_sliders($list=array()) {
		$list["revo"] = esc_html__("Layer slider (Revolution)", 'lorem-ipsum-books-media-store');
		return $list;
	}
}

// Return Revo Sliders list, prepended inherit (if need)
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_revo_sliders' ) ) {
	function lorem_ipsum_books_media_store_get_list_revo_sliders($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_revo_sliders'))=='') {
			$list = array();
			if (lorem_ipsum_books_media_store_exists_revslider()) {
				global $wpdb;
				// Attention! The use of wpdb->prepare() is not required
				// because the query does not use external data substitution
				$rows = $wpdb->get_results( "SELECT alias, title FROM " . esc_sql($wpdb->prefix) . "revslider_sliders" );
				if (is_array($rows) && count($rows) > 0) {
					foreach ($rows as $row) {
						$list[$row->alias] = $row->title;
					}
				}
			}
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_revo_sliders', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_revo_sliders', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Add RevSlider in the shortcodes params
if ( !function_exists( 'lorem_ipsum_books_media_store_revslider_shortcodes_params' ) ) {
	function lorem_ipsum_books_media_store_revslider_shortcodes_params($list=array()) {
		$list["revo_sliders"] = lorem_ipsum_books_media_store_get_list_revo_sliders();
		return $list;
	}
}

// Add RevSlider in the Theme Options params
if ( !function_exists( 'lorem_ipsum_books_media_store_revslider_theme_options_params' ) ) {
	function lorem_ipsum_books_media_store_revslider_theme_options_params($list=array()) {
		$list["list_revo_sliders"] = array('$lorem_ipsum_books_media_store_get_list_revo_sliders' => '');
		return $list;
	}
}
?>