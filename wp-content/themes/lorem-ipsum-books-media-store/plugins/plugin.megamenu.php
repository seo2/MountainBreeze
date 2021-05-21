<?php
/* Mega Main Menu support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_megamenu_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_megamenu_theme_setup', 1 );
	function lorem_ipsum_books_media_store_megamenu_theme_setup() {
		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',					'lorem_ipsum_books_media_store_megamenu_required_plugins' );
		}
	}
}

// Check if MegaMenu installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_megamenu' ) ) {
	function lorem_ipsum_books_media_store_exists_megamenu() {
		return class_exists('mega_main_init');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_megamenu_required_plugins' ) ) {
	function lorem_ipsum_books_media_store_megamenu_required_plugins($list=array()) {
		if (in_array('mega_main_menu', lorem_ipsum_books_media_store_storage_get('required_plugins'))) {
			$path = lorem_ipsum_books_media_store_get_file_dir('plugins/install/mega_main_menu.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('Mega Main Menu', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'mega_main_menu',
					'source'	=> $path,
					'required' 	=> false
				);
			}
		}
		return $list;
	}
}

