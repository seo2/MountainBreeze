@extends('layouts.app')


@section('content') 
<?php
global $atts;
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

<div class="flex h-2/4 overflow-hidden items-center bg-beige relative pt-28 lg:pt-0">
<?php 
    $rows = get_field('slide');
    
    if($rows)
    {
        shuffle( $rows );
        
        foreach($rows as $row)
        {
            $imagen_de_fondo =  $row['imagen_de_fondo'];
            $imagen_de_fondo_mobile =  $row['imagen_de_fondo_mobile'];
            ?>
                <img src="<?php echo $imagen_de_fondo; ?>"           class="hidden md:block w-full"  alt="¡Bienvenido a Herencia Colectiva!">
                <img src="<?php echo $imagen_de_fondo_mobile; ?>"    class="md:hidden w-full"        alt="¡Bienvenido a Herencia Colectiva!">
            <?php
                break;
        }
    }
    ?>
<div class="w-full h-3/4 bg-gradient-to-t from-black to-transparent absolute bottom-0 left-0"></div>
<div class="absolute  bottom-0 left-0 mb-24 lg:mb-0 w-full px-4 lg:px-0 lg:bottom-auto lg:left-auto text-center flex items-center justify-center flex-col">
    <img src="<?php bloginfo('template_url') ?>/dist/img/raya_naranja_horizontal.svg" alt="rayas" class="absolute w-5/6 lg:w-1/4 mx-auto top-20 lg:top-auto">
    <h1 class="font-festivo6 uppercase mb-4 md:mb-8 lg:mb-16 text-6xl lg:text-7xl  leading-none text-beige relative z-10">ERROR 404</h1>
    <p class="text-blanco">Lo que estás buscando no está aquí, te invitamos a ver nuestros talleres.</p>
    <a href="<?php bloginfo('url') ?>/talleres/" class="bg-blanco text-negro px-3 py-2 rounded-none w-full lg:w-1/6 mt-4 uppercase hover:bg-naranjo transition duration-200">Ir a los talleres</a>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); // (5) ?>

@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection