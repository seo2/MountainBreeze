<?php
/* Instagram Feed support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_instagram_feed_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_instagram_feed_theme_setup', 1 );
	function lorem_ipsum_books_media_store_instagram_feed_theme_setup() {
		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',					'lorem_ipsum_books_media_store_instagram_feed_required_plugins' );
		}
	}
}

// Check if Instagram Feed installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_instagram_feed' ) ) {
	function lorem_ipsum_books_media_store_exists_instagram_feed() {
		return defined('SBIVER');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_instagram_feed_required_plugins' ) ) {
	function lorem_ipsum_books_media_store_instagram_feed_required_plugins($list=array()) {
		if (in_array('instagram_feed', lorem_ipsum_books_media_store_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Instagram Feed', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'instagram-feed',
					'required' 	=> false
				);
		return $list;
	}
}
