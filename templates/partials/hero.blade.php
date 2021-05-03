
@if(is_user_logged_in())
<?php
    $slide_params = array(    
        'p'         => 412,
        'post_type' => 'carousel_home'
    ); 
    $slide_query = new WP_Query($slide_params); 
?>
<?php if ($slide_query->have_posts()) :     ?>
<?php while ($slide_query->have_posts()) : 
    $slide_query->the_post(); 
?>  
<div class="flex items-center bg-beige relative pt-24 lg:pt-0">
    <?php if( have_rows('slide') ): ?>
        <?php while( have_rows('slide') ): the_row(); ?>
        <img src="<?php the_sub_field('imagen_de_fondo'); ?>"           class="hidden md:block w-full"  alt="¡Bienvenido a Herencia Colectiva!">
        <img src="<?php the_sub_field('imagen_de_fondo_mobile'); ?>"    class="md:hidden w-full"        alt="¡Bienvenido a Herencia Colectiva!">
        <?php endwhile; ?>
    <?php endif; ?>  
    <div class="w-full h-80 bg-gradient-to-t from-black to-transparent absolute bottom-0 left-0"></div>
    <div class="absolute  bottom-0 left-0 mb-24 lg:mb-0 w-full px-4 lg:px-0 lg:bottom-auto lg:left-auto text-center flex items-center justify-center flex-col">
        <img src="<?php bloginfo('template_url') ?>/dist/img/raya_naranja_horizontal.svg" alt="rayas" class="absolute w-5/6 lg:w-1/4 mx-auto top-20 lg:top-auto">
        <h1 class="font-festivo6 uppercase mb-8 lg:mb-5 text-6xl lg:text-7xl  leading-none text-beige relative z-10">Somos<br>Herencia</h1>
        <p class="text-blanco">Hola <span class="font-bold">{{show_loggedin_function( $atts )}}</span>.<br>¡Bienvenido a Herencia Colectiva!</p>
        <a href="/mis-talleres/" class="bg-blanco text-negro px-3 py-2 rounded-none w-full lg:w-1/6 mt-4 uppercase hover:bg-naranjo transition duration-200">Ir a mis talleres</a>
    </div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); // (5) ?>
<?php else:  ?>
<p class="text-center mb-0" style="display:block;margin:0 auto;">
<?php _e( 'No hay Sliders disponibles' ); // (6) ?>
</p>
<?php endif; ?>
@else
<style>
    .owl-carousel .owl-item img{

    }
</style>
<?php
    $slide_params = array(    
        'p'         => 397,
        'post_type' => 'carousel_home'
    ); 
    $slide_query = new WP_Query($slide_params); 
?>
<?php if ($slide_query->have_posts()) :     ?>
<?php while ($slide_query->have_posts()) : 
    $slide_query->the_post(); 
?>   
<div class="owl-carousel owl-theme w-100 bg-negro" id="hero-carousel">
    <?php if( have_rows('slide') ): ?>
        <?php while( have_rows('slide') ): the_row(); ?>
    <div>
        <div class="flex items-center bg-negro relative">
            <img src="<?php the_sub_field('imagen_de_fondo'); ?>"    class="hidden md:block w-full" alt="Portada Herencia Colectiva">
            <img src="<?php the_sub_field('imagen_de_fondo_mobile'); ?>"  class="md:hidden w-full" alt="Portada Herencia Colectiva">
            <img src="<?php bloginfo('template_url') ?>/dist/img/rayas.svg" alt="rayas" class="absolute w-1/3 lg:w-1/6 top-32 lg:top-auto">
            <div class="w-full h-80 bg-gradient-to-t from-black to-transparent absolute bottom-0 left-0"></div>
            <div class="absolute bottom-0 left-0 mb-24 lg:mb-0 w-5/6 px-4 lg:px-0 lg:bottom-auto lg:left-auto lg:w-1/3 lg:ml-48 text-beige">
                <h1 class="font-festivo6 uppercase mb-2 lg:mb-1 text-6xl lg:text-4xl leading-snug"><?php the_sub_field('titulo'); ?></h1>
                <h2 class="font-festivo8 uppercase mb-2 lg:mb-5 text-6xl lg:text-4xl leading-snug"><?php the_sub_field('sub_titulo'); ?></h2>
                <p class="mb-8 text-lg"><?php the_sub_field('texto'); ?></p>
                <a href="<?php the_sub_field('link_boton'); ?>" class="bg-rosado text-beige px-3 py-2 rounded-none  mt-4 uppercase hover:bg-naranjo transition duration-200"><?php the_sub_field('texto_boton'); ?></a>
            </div>
        </div>
    </div>
        <?php endwhile; ?>
    <?php endif; ?>    
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); // (5) ?>
<?php else:  ?>
<p class="text-center mb-0" style="display:block;margin:0 auto;">
<?php _e( 'No hay Sliders disponibles' ); // (6) ?>
</p>
<?php endif; ?>
@endif