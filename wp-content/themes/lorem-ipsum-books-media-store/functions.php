<?php
/**
 * Theme sprecific functions and definitions
 */

/* Theme setup section
------------------------------------------------------------------- */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) $content_width = 1170; /* pixels */


// Add theme specific actions and filters
// Attention! Function were add theme specific actions and filters handlers must have priority 1
if ( !function_exists( 'lorem_ipsum_books_media_store_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_theme_setup', 1 );
	function lorem_ipsum_books_media_store_theme_setup() {

		// Register theme menus
		add_filter( 'lorem_ipsum_books_media_store_filter_add_theme_menus',		'lorem_ipsum_books_media_store_add_theme_menus' );

		// Register theme sidebars
		add_filter( 'lorem_ipsum_books_media_store_filter_add_theme_sidebars',	'lorem_ipsum_books_media_store_add_theme_sidebars' );

		// Add theme required plugins
		add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',		'lorem_ipsum_books_media_store_add_required_plugins' );
		
		// Add preloader styles
		add_filter('lorem_ipsum_books_media_store_filter_add_styles_inline',		'lorem_ipsum_books_media_store_head_add_page_preloader_styles');

		// Init theme after WP is created
		add_action( 'wp',									'lorem_ipsum_books_media_store_core_init_theme' );

		// Add theme specified classes into the body
		add_filter( 'body_class', 							'lorem_ipsum_books_media_store_body_classes' );

		// Add data to the head and to the beginning of the body
		add_action('wp_head',								'lorem_ipsum_books_media_store_head_add_page_meta', 1);
		add_action('before',								'lorem_ipsum_books_media_store_body_add_gtm');
		add_action('before',								'lorem_ipsum_books_media_store_body_add_toc');
		add_action('before',								'lorem_ipsum_books_media_store_body_add_page_preloader');

		// Add data to the footer (priority 1, because priority 2 used for localize scripts)
		add_action('wp_footer',								'lorem_ipsum_books_media_store_footer_add_views_counter', 1);
		add_action('wp_footer',								'lorem_ipsum_books_media_store_footer_add_theme_customizer', 1);
		add_action('wp_footer',								'lorem_ipsum_books_media_store_footer_add_custom_html', 1);
		add_action('wp_footer',								'lorem_ipsum_books_media_store_footer_add_gtm2', 1);

		// Switch default markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Custom header setup
		add_theme_support( 'custom-header', array('header-text'=>false));

		// Custom backgrounds setup
		add_theme_support( 'custom-background');

		// Supported posts formats
		add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'link', 'quote', 'image', 'status', 'aside', 'chat') );

		// Autogenerate title tag
		add_theme_support('title-tag');

		// Add user menu
		add_theme_support('nav-menus');

		add_theme_support( 'align-wide' );

		add_theme_support( 'woocommerce', array( 'product_grid' => array( 'max_columns' => 5 ) ) );
		// Next setting from the WooCommerce 3.0+ enable built-in image slider on the single product page
		add_theme_support( 'wc-product-gallery-slider' );
		// Next setting from the WooCommerce 3.0+ enable built-in image lightbox on the single product page
		add_theme_support( 'wc-product-gallery-lightbox' );

		// Set list of the theme required plugins
		lorem_ipsum_books_media_store_storage_set('required_plugins', array(
			'essgrids',
			'learndash',
			'revslider',
			'trx_utils',
			'visual_composer',
            'learndash',
			'woocommerce',
			'instagram-widget-by-wpzoom',
			'elegro-payment',
			'mailchimp-for-wp',
			'contact-form-7'
			)
		);

		lorem_ipsum_books_media_store_storage_set('demo_data_url',  esc_url(lorem_ipsum_books_media_store_get_protocol() . '://loremipsum.themerex.net/demo/'));

		lorem_ipsum_books_media_store_register_theme_sidebars();
	}
}


// Add/Remove theme nav menus
if ( !function_exists( 'lorem_ipsum_books_media_store_add_theme_menus' ) ) {
	function lorem_ipsum_books_media_store_add_theme_menus($menus) {
			return $menus;
	}
}


// Add theme specific widgetized areas
if ( !function_exists( 'lorem_ipsum_books_media_store_add_theme_sidebars' ) ) {
	function lorem_ipsum_books_media_store_add_theme_sidebars($sidebars=array()) {
		if (is_array($sidebars)) {
			$theme_sidebars = array(
				'sidebar_main'		=> esc_html__( 'Main Sidebar', 'lorem-ipsum-books-media-store' ),
				'sidebar_footer'	=> esc_html__( 'Footer Sidebar', 'lorem-ipsum-books-media-store' )
			);
			if (function_exists('lorem_ipsum_books_media_store_exists_woocommerce') && lorem_ipsum_books_media_store_exists_woocommerce()) {
				$theme_sidebars['sidebar_cart']  = esc_html__( 'WooCommerce Cart Sidebar', 'lorem-ipsum-books-media-store' );
			}
			$sidebars = array_merge($theme_sidebars, $sidebars);
		}
		return $sidebars;
	}
}


// Add theme required plugins
if ( !function_exists( 'lorem_ipsum_books_media_store_add_required_plugins' ) ) {
	function lorem_ipsum_books_media_store_add_required_plugins($plugins) {
		$plugins[] = array(
			'name' 		=> esc_html__( 'ThemeREX Utilities', 'lorem-ipsum-books-media-store' ),
			'version'	=> '3.2.0.2',
			'slug' 		=> 'trx_utils',
			'source'	=> lorem_ipsum_books_media_store_get_file_dir('plugins/install/trx_utils.zip'),
			'required' 	=> true
		);
		$plugins[] = array(
			'name' 		=> esc_html__( 'ThemeREX Updater', 'lorem-ipsum-books-media-store' ),
			'version'	=> '1.5.3',
			'slug' 		=> 'trx_updater',
			'source'	=> lorem_ipsum_books_media_store_get_file_dir('plugins/install/trx_updater.zip'),
			'required' 	=> false
		);
		return $plugins;
	}
}

// Return text for the "I agree ..." checkbox
if ( ! function_exists( 'lorem_ipsum_books_media_store_trx_addons_privacy_text' ) ) {
	add_filter( 'trx_utils_filter_privacy_text', 'lorem_ipsum_books_media_store_trx_addons_privacy_text' );
	function lorem_ipsum_books_media_store_trx_addons_privacy_text( $text='' ) {
		return lorem_ipsum_books_media_store_get_privacy_text();
	}
}

// Add data to the head and to the beginning of the body
//------------------------------------------------------------------------

// Add theme specified classes to the body tag
if ( !function_exists('lorem_ipsum_books_media_store_body_classes') ) {
	function lorem_ipsum_books_media_store_body_classes( $classes ) {

		$classes[] = 'lorem_ipsum_books_media_store_body';
		$classes[] = 'body_style_' . trim(lorem_ipsum_books_media_store_get_custom_option('body_style'));
		$classes[] = 'body_' . (lorem_ipsum_books_media_store_get_custom_option('body_filled')=='yes' ? 'filled' : 'transparent');
		$classes[] = 'article_style_' . trim(lorem_ipsum_books_media_store_get_custom_option('article_style'));
		
		$blog_style = lorem_ipsum_books_media_store_get_custom_option(is_singular() && !lorem_ipsum_books_media_store_storage_get('blog_streampage') ? 'single_style' : 'blog_style');
		$classes[] = 'layout_' . trim($blog_style);
		$classes[] = 'template_' . trim(lorem_ipsum_books_media_store_get_template_name($blog_style));
		
		$body_scheme = lorem_ipsum_books_media_store_get_custom_option('body_scheme');
		if (empty($body_scheme)  || lorem_ipsum_books_media_store_is_inherit_option($body_scheme)) $body_scheme = 'original';
		$classes[] = 'scheme_' . trim($body_scheme);

		$top_panel_position = lorem_ipsum_books_media_store_get_custom_option('top_panel_position');
		if (!lorem_ipsum_books_media_store_param_is_off($top_panel_position)) {
			$classes[] = 'top_panel_show';
			$classes[] = 'top_panel_' . trim($top_panel_position);
		} else 
			$classes[] = 'top_panel_hide';
		$classes[] = lorem_ipsum_books_media_store_get_sidebar_class();

		if (lorem_ipsum_books_media_store_get_custom_option('show_video_bg')=='yes' && (lorem_ipsum_books_media_store_get_custom_option('video_bg_youtube_code')!='' || lorem_ipsum_books_media_store_get_custom_option('video_bg_url')!=''))
			$classes[] = 'video_bg_show';

		if (!lorem_ipsum_books_media_store_param_is_off(lorem_ipsum_books_media_store_get_theme_option('page_preloader')))
			$classes[] = 'preloader';

		return $classes;
	}
}


// Add page meta to the head
if (!function_exists('lorem_ipsum_books_media_store_head_add_page_meta')) {
	function lorem_ipsum_books_media_store_head_add_page_meta() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1<?php if (lorem_ipsum_books_media_store_get_theme_option('responsive_layouts')=='yes') echo ', maximum-scale=1'; ?>">
		<meta name="format-detection" content="telephone=no">
	
		<link rel="profile" href="//gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php
	}
}

// Add page preloader styles to the head
if (!function_exists('lorem_ipsum_books_media_store_head_add_page_preloader_styles')) {
	function lorem_ipsum_books_media_store_head_add_page_preloader_styles($css) {
		if (($preloader=lorem_ipsum_books_media_store_get_theme_option('page_preloader'))!='none') {
			$image = lorem_ipsum_books_media_store_get_theme_option('page_preloader_image');
			$bg_clr = lorem_ipsum_books_media_store_get_scheme_color('bg_color');
			$link_clr = lorem_ipsum_books_media_store_get_scheme_color('text_link');
			$css .= '
				#page_preloader {
					background-color: '. esc_attr($bg_clr) . ';'
					. ($preloader=='custom' && $image
						? 'background-image:url('.esc_url($image).');'
						: ''
						)
					. '
				}
				.preloader_wrap > div {
					background-color: '.esc_attr($link_clr).';
				}';
		}
		return $css;
	}
}

// Add gtm code to the beginning of the body 
if (!function_exists('lorem_ipsum_books_media_store_body_add_gtm')) {
	function lorem_ipsum_books_media_store_body_add_gtm() {
		lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_get_custom_option('gtm_code'));
	}
}

// Add TOC anchors to the beginning of the body 
if (!function_exists('lorem_ipsum_books_media_store_body_add_toc')) {
	function lorem_ipsum_books_media_store_body_add_toc() {
		// Add TOC items 'Home' and "To top"
		if (lorem_ipsum_books_media_store_get_custom_option('menu_toc_home')=='yes' && function_exists('lorem_ipsum_books_media_store_sc_anchor'))
			lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_anchor(array(
				'id' => "toc_home",
				'title' => esc_html__('Home', 'lorem-ipsum-books-media-store'),
				'description' => esc_html__('{{Return to Home}} - ||navigate to home page of the site', 'lorem-ipsum-books-media-store'),
				'icon' => "icon-home",
				'separator' => "yes",
				'url' => esc_url(home_url('/'))
				)
			)); 
		if (lorem_ipsum_books_media_store_get_custom_option('menu_toc_top')=='yes' && function_exists('lorem_ipsum_books_media_store_sc_anchor'))
			lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_anchor(array(
				'id' => "toc_top",
				'title' => esc_html__('To Top', 'lorem-ipsum-books-media-store'),
				'description' => esc_html__('{{Back to top}} - ||scroll to top of the page', 'lorem-ipsum-books-media-store'),
				'icon' => "icon-double-up",
				'separator' => "yes")
				)); 
	}
}

// Add page preloader to the beginning of the body
if (!function_exists('lorem_ipsum_books_media_store_body_add_page_preloader')) {
	function lorem_ipsum_books_media_store_body_add_page_preloader() {
		if ( ($preloader=lorem_ipsum_books_media_store_get_theme_option('page_preloader')) != 'none' && ( $preloader != 'custom' || ($image=lorem_ipsum_books_media_store_get_theme_option('page_preloader_image')) != '')) {
			?><div id="page_preloader"><?php
				if ($preloader == 'circle') {
					?><div class="preloader_wrap preloader_<?php echo esc_attr($preloader); ?>"><div class="preloader_circ1"></div><div class="preloader_circ2"></div><div class="preloader_circ3"></div><div class="preloader_circ4"></div></div><?php
				} else if ($preloader == 'square') {
					?><div class="preloader_wrap preloader_<?php echo esc_attr($preloader); ?>"><div class="preloader_square1"></div><div class="preloader_square2"></div></div><?php
				}
			?></div><?php
		}
	}
}

// Add theme required plugins
if ( !function_exists( 'lorem_ipsum_books_media_store_add_trx_utils' ) ) {
	add_filter( 'trx_utils_active', 'lorem_ipsum_books_media_store_add_trx_utils' );
	function lorem_ipsum_books_media_store_add_trx_utils($enable=true) {
		return true;
	}
}

// Add data to the footer
//------------------------------------------------------------------------

// Add post/page views counter
if (!function_exists('lorem_ipsum_books_media_store_footer_add_views_counter')) {
	function lorem_ipsum_books_media_store_footer_add_views_counter() {
		// Post/Page views counter
		get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/_parts/views-counter.php'));
	}
}

// Add theme customizer
if (!function_exists('lorem_ipsum_books_media_store_footer_add_theme_customizer')) {
	function lorem_ipsum_books_media_store_footer_add_theme_customizer() {
		// Front customizer
		if (lorem_ipsum_books_media_store_get_custom_option('show_theme_customizer')=='yes') {
			get_template_part(lorem_ipsum_books_media_store_get_file_slug('core/core.customizer/front.customizer.php'));
		}
	}
}

// Add custom html
if (!function_exists('lorem_ipsum_books_media_store_footer_add_custom_html')) {
	function lorem_ipsum_books_media_store_footer_add_custom_html() {
		?><div class="custom_html_section"><?php
			lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_get_custom_option('custom_code'));
		?></div><?php
	}
}

// Add gtm code
if (!function_exists('lorem_ipsum_books_media_store_footer_add_gtm2')) {
	function lorem_ipsum_books_media_store_footer_add_gtm2() {
		lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_get_custom_option('gtm_code2'));
	}
}

// Return text for the "I agree ..." checkbox
if ( ! function_exists( 'lorem_ipsum_books_media_store_trx_addons_privacy_text' ) ) {
	add_filter( 'trx_addons_filter_privacy_text', 'lorem_ipsum_books_media_store_trx_addons_privacy_text' );
	function lorem_ipsum_books_media_store_trx_addons_privacy_text( $text='' ) {
		return lorem_ipsum_books_media_store_get_privacy_text();
	}
}

//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'lorem_ipsum_books_media_store_importer_set_options' ) ) {
	add_filter( 'trx_utils_filter_importer_options', 'lorem_ipsum_books_media_store_importer_set_options', 9 );
	function lorem_ipsum_books_media_store_importer_set_options( $options=array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Prepare demo data
			if ( is_dir( LOREM_IPSUM_BOOKS_MEDIA_STORE_THEME_PATH . 'demo/' ) ) {
				$options['demo_url'] = LOREM_IPSUM_BOOKS_MEDIA_STORE_THEME_PATH . 'demo/';
			} else {
				$options['demo_url'] = esc_url( lorem_ipsum_books_media_store_get_protocol().'://demofiles.themerex.net/lorem-ipsum/' ); // Demo-site domain
			}

			// Required plugins
			$options['required_plugins'] =  array(
				'instagram-widget-by-wpzoom',
				'essential-grid',
				'learndash',
				'elegro-payment',
				'mailchimp-for-wp',
				'revslider',
				'js_composer',
				'woocommerce'
			);

			$options['theme_slug'] = 'lorem_ipsum_books_media_store';

			// Set number of thumbnails to regenerate when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 3;
			// Default demo
			$options['files']['default']['title'] = esc_html__( 'Lorem Ipsum Demo', 'lorem-ipsum-books-media-store' );
			$options['files']['default']['domain_dev'] = esc_url('http://loremipsum.upd.themerex.net'); // Developers domain
			$options['files']['default']['domain_demo']= esc_url('http://loremipsum.themerex.net'); // Demo-site domain

		}
		return $options;
	}
}

/**
 * Fire the wp_body_open action.
 *
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}

// Include framework core files
//-------------------------------------------------------------------
require_once trailingslashit( get_template_directory() ) . 'fw/loader.php';
?>