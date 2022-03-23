<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\View\Factory;
use Illuminate\Events\Dispatcher;
use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;

$GLOBALS['filesystem']  = new Filesystem;
$GLOBALS['compiler']    = new BladeCompiler($GLOBALS['filesystem'], getCompiledTemplateDirectory());
global $taller;

add_action('init', function() {
    $GLOBALS['compiler']->component('partials.the_loop', 'loop');
});

add_action('wp_enqueue_scripts', function () {
    if (!function_exists('enablejQuery') || !enablejQuery()) {
        wp_deregister_script('jquery');
    }
    wp_enqueue_style('owl', get_stylesheet_directory_uri() . '/dist/owlcarousel/owl.carousel.min.css');
    wp_enqueue_style('owltheme', get_stylesheet_directory_uri() . '/dist/owlcarousel/owl.theme.default.min.css');
    wp_enqueue_style('apercupro', get_stylesheet_directory_uri() . '/dist/fonts/apercupro.css');
    wp_enqueue_style('festivo', get_stylesheet_directory_uri() . '/dist/fonts/festivo.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    
    wp_enqueue_script('jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js");
    wp_enqueue_script('owl', get_stylesheet_directory_uri() . "/dist/owlcarousel/owl.carousel.min.js");
    wp_enqueue_script('fontawesome', "https://kit.fontawesome.com/a0d8b6c07b.js");
    wp_enqueue_script('alpine-js-defer', 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js');
    wp_enqueue_script('app', get_stylesheet_directory_uri() . '/dist/app.js');
});
global $container;
add_filter('template_include', function ($template) use ($container) {
    $templateName = wp_basename(wp_basename($template, '.php'), '.blade');
    if (getBladeViewFactory($container)->exists($templateName)) {
        $GLOBALS['template_name'] = $templateName;
        $template = __DIR__ . '/../mountainbreeze/index.php';
    }

    return $template;
});

collect([
    'index',
    '404',
    'archive',
    'author',
    'category',
    'tag',
    'taxonomy',
    'date',
    'embed',
    'home',
    'frontpage',
    'privacypolicy',
    'page',
    'paged',
    'search',
    'single',
    'singular',
    'attachment'
])->each(function($type) {
    add_filter("{$type}_template_hierarchy", function($templates) {
        return collect($templates)->map(function($template) {
            $filename = wp_basename($template, '.php');
            return ["templates/$filename.blade.php", $template];
        })->flatten()
          ->toArray();
    });
});

function getBladeViewFactory()
{
    $viewResolver = new EngineResolver;

    $viewResolver->register('blade', function () {
        return new CompilerEngine($GLOBALS['compiler']);
    });

    $viewResolver->register('php', function () {
        return new PhpEngine;
    });

    return new Factory(
        $viewResolver,
        new FileViewFinder($GLOBALS['filesystem'], getTemplateDirectory()),
        new Dispatcher($GLOBALS['container'])
    );
}

function getTemplateDirectory()
{
    return [__DIR__ . '/../templates/'];
}

function getCompiledTemplateDirectory()
{
    return __DIR__ . '/../compiled/';
}


/**
 * Esta función agrega los parámetros "async" y "defer" a recursos de Javascript.
 * Solo se debe agregar "async" o "defer" en cualquier parte del nombre del 
 * recurso (atributo "handle" de la función wp_register_script).
 *
 * @param $tag
 * @param $handle
 *
 * @return mixed
 */
function mg_add_async_defer_attributes( $tag, $handle ) {

	// Busco el valor "async"
	if( strpos( $handle, "async" ) ):
		$tag = str_replace(' src', ' async="async" src', $tag);
	endif;

	// Busco el valor "defer"
	if( strpos( $handle, "defer" ) ):
		$tag = str_replace(' src', ' defer="defer" src', $tag);
	endif;

	return $tag;
}
add_filter('script_loader_tag', 'mg_add_async_defer_attributes', 10, 2);


function show_loggedin_function( $atts ) {

	global $current_user, $user_login;
    get_currentuserinfo();
	add_filter('widget_text', 'do_shortcode');
	if ($user_login) 
		return $current_user->display_name;
	else
		return '<a href="' . wp_login_url() . ' ">Login</a>';
	
}
add_shortcode( 'show_loggedin_as', 'show_loggedin_function' );


function herenciacolectiva_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Cursos', 'herenciacolectiva' ),
        'description'   => __( 'Seguimiento del curso' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

add_action('init','herenciacolectiva_widgets_init');


function wpb_custom_new_menu() {
    register_nav_menu('menu-principal',__( 'Menú principal' ));
    register_nav_menu('menu-talleres',__( 'Talleres' ));
    register_nav_menu('menu-footer',__( 'Menú footer' ));
  }
add_action( 'init', 'wpb_custom_new_menu' );
  

function mountainbreeze_theme_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    if ( function_exists( 'add_image_size' ) ) { 
        add_image_size( 'talleres-home', 800, 500, true ); 
        add_image_size( 'slider-home', 2160, 1266, true ); 
        add_image_size( 'slider-home-mobile', 375, 687  , true ); 
    }
    


}
add_action( 'after_setup_theme', 'mountainbreeze_theme_support' );


require_once("wc_functions.php");


function ld_next_lesson_link( $course_id = null ) {
	global $post;
	$user = _wp_get_current_user();

	if( is_null( $course_id ) ) {
		$course_id = learndash_get_course_id( $post );
	}

	if( !$course_id || !isset( $user->ID ) )  {
		// User Not Logged In OR No Course Identified
		return false;
	}

	$lessons = learndash_get_lesson_list( $course_id );
		
	if( !$lessons ) {
		// No Lesson
		return false;
	}

	$first_lesson = reset( $lessons );

	$user_course_progress = get_user_meta( $user->ID, '_sfwd-course_progress', true );

	if( isset( $user_course_progress[$course_id] ) ) {
		$course_progress = $user_course_progress[$course_id];

		// get first lesson link
		if( !$course_progress['lessons'] && isset( $first_lesson->ID ) ) {
			$lesson_id = $first_lesson->ID;
		} else {
			end( $course_progress['lessons'] );
			$lesson_id = key( $course_progress['lessons'] );
			
			foreach( $lessons as $key => $lesson ) {
				if( $lesson->ID == $lesson_id ) {
					$lesson_id = $lessons[$key+1]->ID;
					break;
				}
			}
		}

	} elseif( isset ( $first_lesson->ID ) ) {
		// get first lesson link
		$lesson_id = $first_lesson->ID;
	}

	if( !$lesson_id ) {
		// No Lesson ID
		return false;
	}

	if( 'sfwd-lessons' != get_post_type( $lesson_id ) ) {
		// ID not for a Learndash Lesson
		return false;
	}

	$link = get_post_permalink( $lesson_id );
	return $link;
}

function shortcode_ld_next_lesson_link( $atts , $content = 'Next Lesson' ){
	extract(shortcode_atts(array(
		'course_id' => null ,
		'class' => 'learndash-next-lesson'
	), $atts));
	$url = ld_next_lesson_link( $course_id );
	if( $url ) {
		return '<a href="'.$url.'" class="'.$class.'">'.$content.'</a>';
	}
	return false;
}
add_shortcode('ld_next_lesson_link', 'shortcode_ld_next_lesson_link');

function bm_bbp_no_breadcrumb ($param) {

    return true;
    
}

add_filter ('bbp_no_breadcrumb', 'bm_bbp_no_breadcrumb');



// SHOW MODAL DE @CarolinaRojas

function show_modal(){
	
	global $wpdb;

	date_default_timezone_set('America/Santiago');

	// Find todays date in Ymd format.
	$today = date('Ymd');

	// Query posts using a meta_query to compare two custom fields; start_date and end_date.
	$args = array(
		'post_type' => 'modal',
		'posts_per_page'	=> 1,
		'meta_query' => array(
			array(
				'key'     => 'fecha_de_inicio',
				'compare' => '<=',
				'value'   => $today,
			),
			array(
				'key'     => 'fecha_de_termino',
				'compare' => '>=',
				'value'   => $today,
			)
		),
	);

	$the_query = new WP_Query( $args );

    if($the_query->have_posts() && is_home()) :

        while ( $the_query->have_posts() ) : $the_query->the_post(); 
        
                $titulo     = get_the_title();
                $frecuencia = get_field_object('frecuencia');
                $frecuencia = $frecuencia['value'];
                $horas      = get_field('horas');
                $fecha_de_inicio = get_field('fecha_de_inicio');
                $contenido = get_field_object('contenido');
                $contenido = $contenido['value'];

                $content_html       = get_field('html');
                $texto_boton        = get_field('texto_boton');
                $texto_bajo_boton   = get_field('texto_bajo_boton');
                $link               = get_field('link');
                $letra_chica        = get_field('letra_chica');
                $imagen_desktop     = get_field('imagen_desktop');
                $imagen_mobile      = get_field('imagen_mobile');

                $css = "";

                if($contenido == "imagen"){
                    $css = "modal-img";
                }

                $op = "";

                if(isset($_GET["op"])){
                    $op = $_GET["op"];
                    if($op == "img"){
                        $css = "modal-img";
                    }
                }
            
        ?>

            <div id="modalHome" class="<?php echo $css;?> top-0 left-0 w-full h-screen fixed z-50 bg-black bg-opacity-70"  style="display:none;">
                <div class="w-full h-screen  flex flex-col justify-center items-center" >
                    <div class="w-11/12 md:w-3/5 bg-white shadow-2xl relative">
                        <a href="javascript:void(0);" class="absolute right-0 -top-10 sm:-right-8 sm:-top-8 text-white text-3xl hover:text-naranjo transition duration-200" id="cerrarModal"><i class="fal fa-times-circle"></i></a>
                        <div class="modal-content">
                            <?php if($contenido == "html" && $op != "img") :?>
                                <h1 class="font-bold text-3xl mb-3"><?php echo $titulo;?></h1>
                                <div class="font-light text-lg"><?php echo $content_html;?></div>
                                <?php if($texto_boton != "") :?>
                                    <a href="<?php echo $link;?>" target="_blank" class="btn-modal bg-naranjo px-12 py-2 block w-auto mx-auto my-4 hover:bg-azul transition duration-200"><span><?php echo $texto_boton;?></span></a>
                                <?php endif;?>
                                <?php if($texto_bajo_boton != "") :?>
                                    <p class="font-light text-lg"><?php echo $texto_bajo_boton;?></p>
                                <?php endif;?>
                                <?php if($letra_chica != "") :?>
                                    <small class="mt-12"><?php echo $letra_chica;?></small>
                                <?php endif;?>
                            <?php else : ?>
                                <div class="contenido-img relative">
                                    <?php
                                        if(get_field('link') && !get_field('texto_boton')){
                                    ?>
                                    <a href="<?php the_field('link'); ?>">
                                    <?php
                                        }
                                    ?>
                                    <img src="<?php the_field('imagen_desktop'); ?>"    class="hidden md:block w-full">
                                    <img src="<?php the_field('imagen_mobile'); ?>"     class="block md:hidden w-full">
                                    <?php
                                        if(get_field('link') && !get_field('texto_boton')){
                                    ?>
                                    </a>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if(get_field('texto_boton')){
                                    ?>
                                    <div class="overlay absolute w-full h-full bg-black bg-opacity-30 top-0"></div>
                                    <div class="caption-modal absolute w-full h-full top-0 text-beige flex flex-col justify-center text-center px-4 py-8" >
                                        <h1 class="font-bold text-3xl mb-3"><?php echo $titulo;?></h1>
                                    <?php if($content_html != "") :?>
                                        <div class="font-light text-lg"><?php echo $content_html;?></div>
                                    <?php endif;?>
                                    <?php if($texto_boton != "") :?>
                                        <a href="<?php echo $link;?>" target="_blank" class="btn-modal bg-naranjo px-12 py-2 block w-auto mx-auto my-4 hover:bg-azul transition duration-200"><span><?php echo $texto_boton;?></span></a>
                                    <?php endif;?>
                                    <?php if($texto_bajo_boton != "") :?>
                                        <p class="font-light text-lg"><?php echo $texto_bajo_boton;?></p>
                                    <?php endif;?>
                                    <?php if($letra_chica != "") :?>
                                        <small class="mt-12"><?php echo $letra_chica;?></small>
                                    <?php endif;?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>    
            </div>	
            <?php	
            if($frecuencia == "24" || $frecuencia == "cada_x_horas") : // modal lo muestra cada cierto tiempo
                if($frecuencia == "24"){
                    $tiempo = 24;
                }else{
                    $tiempo = $horas;
                }
            ?>
            
            <script>
            if(localStorage.last){
                if( (localStorage.last - Date.now() ) / (1000*60*60*<?php echo $tiempo;?>) >= 1){ //Date.now() is in milliseconds, so convert it all to days, and if it's more than 1 day, show the div
                    //alert("mostrar modal cada <?php echo $tiempo;?> hora(s)");
                    localStorage.last = Date.now(); //Reset your timer
                    setTimeout(function(){
                        mostrarModal();
                    }, 500);
                }
            }else {
                localStorage.last = Date.now();
                //alert("mostrar modal cada <?php echo $tiempo;?> horas(s)");
                setTimeout(function(){
                    mostrarModal();
                }, 500);
            }
            </script>
        <?php
            else : // modal lo muestra siempre 
        ?>	
            <script>
                setTimeout(function(){
                    mostrarModal();
                }, 500);
            </script>
        <?php	
            endif;
            ?>	
            <script>
                function mostrarModal(){
                        $('#modalHome').fadeIn();
                        $('body').css({'overflow':'hidden'});
                }

                $('#cerrarModal').on('click', function(){
                    $('#modalHome').fadeOut();
                    $('body').css({'overflow':'auto'});
                });
            </script>
        <?php	
            
        endwhile;
    endif;
    wp_reset_query();	
}

add_action('wp_footer', 'show_modal');

// a function that gets current user name   
function get_current_user_name() {
    global $current_user;
    get_currentuserinfo();
    return $current_user->user_login;
}

// function that gets post title by id
function get_post_title_by_id($post_id) {
    $post = get_post($post_id);
    return $post->post_title;
}


function shapeSpace_register_add_meta($user_id) { 
	add_user_meta($user_id, 'login_amount', '1');
}
add_action('user_register', 'shapeSpace_register_add_meta');

add_action( 'wp_login', 'track_user_logins', 10, 2 );
function track_user_logins( $user_login, $user ){
    if( $login_amount = get_user_meta( $user->id, 'login_amount', true ) ){
        // They've Logged In Before, increment existing total by 1
        update_user_meta( $user->id, 'login_amount', ++$login_amount );
    } else {
        // First Login, set it to 1
        update_user_meta( $user->id, 'login_amount', 1 );
    }
}

// Function that checks user firt login
function is_first_login() {
    if( is_user_logged_in() ){
        // Get current total amount of logins (should be at least 1)
        $login_amount = get_user_meta( get_current_user_id(), 'login_amount', true );

        // return content based on how many times they've logged in.
        if( $login_amount == 1 ){
            return true;
        } else {
            return false;
        }
    }
}   // end is_first_login()


function __update_post_meta( $post_id, $field_name, $value = '' )
{
    if ( empty( $value ) OR ! $value )
    {
        delete_post_meta( $post_id, $field_name );
    }
    elseif ( ! get_post_meta( $post_id, $field_name ) )
    {
        add_post_meta( $post_id, $field_name, $value );
    }
    else
    {
        update_post_meta( $post_id, $field_name, $value );
    }
}


add_filter( 'comment_post_redirect', 'redirect_after_comment', 10, 2 );

function redirect_after_comment( $location, $comment ){
    $post_id = $comment->comment_post_ID;
    // product-only comment redirects
    if( 'product' == get_post_type( $post_id ) ){
        $related_courses = get_post_meta($post_id, '_related_course');
        foreach ($related_courses as $related_course) {
            $id = $related_course[0];
        }
        $location = 'http://herenciacolectiva.test/evaluar-taller/?taller='.$id.'&eval=1';
    }
    return $location;
}






function my_handle_attachment($file_handler,$post_id,$set_thu=false) {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
  
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  
    $attach_id = media_handle_upload( $file_handler, $post_id );
    if ( is_numeric( $attach_id ) ) {
      update_post_meta( $post_id, '_my_file_upload', $attach_id );
    }
    return $attach_id;
  }



    function add_site_favicon() {
        echo "<link rel='shortcut icon' type='image/svg+xml' href='" . get_stylesheet_directory_uri() . "/dist/img/isotipo.svg' />" . "\n";
    }
       
    add_action('login_head', 'add_site_favicon');
    add_action('admin_head', 'add_site_favicon');



add_action( 'wp_head', 'ilc_favicon');
function ilc_favicon(){
    echo "<link rel='shortcut icon' type='image/svg+xml' href='" . get_stylesheet_directory_uri() . "/dist/img/isotipo.svg' />" . "\n";
}




