<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); 

?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php	
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
<script>
        (function( $ ) {
            $.fn.tabConvert = function(options) {
            
                var settings = $.extend({
                    activeClass: "active",
                    screenSize: 767,
                }, options );
        
                return this.each(function(i) {
                    var wrap = $(this).wrap('<div class="tab-to-dropdown"></div>'),
                            currentItem = $(this),
                            container = $(this).closest('.tab-to-dropdown'),
                            value = $(this).find('.'+settings.activeClass).text(),
                            toggler = '<div class="selected-tab text-naranjo text-sm font-sans uppercase">'+ value +'</div>';
                    currentItem.addClass('converted-tab');
                    container.prepend(toggler);
                    
                    // function to slide dropdown
                    function tabConvert_toggle(){
                        currentItem.parent().find('.converted-tab').slideToggle();
                    }
        
                    container.find('.selected-tab').click(function(){
                        tabConvert_toggle();
                    });
                    
                    currentItem.find('a').click(function(e){
                        var windowWidth = window.innerWidth;
                        if( settings.screenSize >= windowWidth){
                            tabConvert_toggle();
                            var selected_text = $(this).text();
                            $(this).closest('.tab-to-dropdown').find('.selected-tab').text(selected_text);
                        }
                    });
                    
                    //Remove toggle if screen size is bigger than defined screen size
                    function resize_function(){
                        var windowWidth = window.innerWidth;
                        if( settings.screenSize >= windowWidth){
                            currentItem.css('display','none');
                            currentItem.parent().find('.selected-tab').css('display','');
                            currentItem.removeClass('flex');
                        }else{
                            currentItem.css('display','');
                            currentItem.parent().find('.selected-tab').css('display','none');
                            currentItem.addClass('flex');
                        }
                    }
        
                    console.log(currentItem);
        
                    resize_function();
					tabConvert_toggle();
                    
                    $(window).resize(function(){
                        resize_function();
                    });
                    
                });
            };
        
            // 	Toggle will appear on default screen size 767px
            // $('.tabs').tabConvert({
            //     activeClass: "selected",
            // });
          
        // 	Toggle will appear on size 991px
          $('.wc-tabs').tabConvert({
            activeClass: "active",
                screenSize: 768,
          });
        
        }( jQuery ));
        </script>
<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */