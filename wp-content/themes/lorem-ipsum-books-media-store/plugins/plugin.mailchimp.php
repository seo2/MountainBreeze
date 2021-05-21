<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_mailchimp_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_mailchimp_theme_setup', 1 );
	function lorem_ipsum_books_media_store_mailchimp_theme_setup() {
		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',					'lorem_ipsum_books_media_store_mailchimp_required_plugins' );
		}
	}
}

// Check if Instagram Feed installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_mailchimp' ) ) {
	function lorem_ipsum_books_media_store_exists_mailchimp() {
		return function_exists('__mc4wp_load_plugin') || defined('MC4WP_VERSION');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_mailchimp_required_plugins' ) ) {
	function lorem_ipsum_books_media_store_mailchimp_required_plugins($list=array()) {
		if (in_array('mailchimp-for-wp', lorem_ipsum_books_media_store_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('MailChimp for WP', 'lorem-ipsum-books-media-store'),
				'slug' 		=> 'mailchimp-for-wp',
				'required' 	=> false
			);
		return $list;
	}
}
