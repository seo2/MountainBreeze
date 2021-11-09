@php
/*

Template name: Mis Proyectos

*/
@endphp

@extends('layouts.app')

@section('content') 

<section class="w-full bg-beige mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-negro font-festivo6 text-5xl uppercase">Mis Proyectos</h1>
    </div>
</section>

<section class="mt-12 mb-12">
    <div class="container w-full mx-auto min-h-3/4 lg:px-40">

        <?php
            // wordpress loop for proyectos post type where user is author
            $args = array(
                'post_type' => 'proyectos',
                'author' => get_current_user_id(),
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $proyectos = new WP_Query($args); 
            if ( $proyectos->have_posts() ) { 
                while ( $proyectos->have_posts() ) {
                            $proyectos->the_post();    
                            $url = get_the_post_thumbnail_url( $featured_post->ID );
                            
        ?>

        <a href="<?php the_permalink(); ?>" class="flex flex-row border-b border-gris7 py-4 px-4 my-4 hover:bg-beige transition duration-200">
            <div class="w-1/12 flex-none">
                <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" class="w-full">

            </div>
            <div class="flex-grow flex-col flex px-8">
                <p class="flex-grow text-negro">@php
                    the_title();
                @endphp</p>
                <h1 class=" text-naranjo">@php
                    echo get_post_title_by_id(get_field('Taller'));
                @endphp</h1>
            </div>
            <div class="w-2/12 flex flex-none justify-end">
                <p class="self-end text-negro">@php
                    echo get_the_date();
                @endphp</p>
            </div>
        </a>

       <?php
                }
            }else{
        ?>

<div class="flex flex-wrap justify-between">
    <div class="w-full">
        <div class="mb-8">
            <div class="flex flex-wrap justify-between">
                <div class="w-full text-center h-64">
                    <h2 class="text-2xl font-festivo6  text-negro">Aún no subes ningún proyecto a Herencia Colectiva</h2>
                    <p class="text-negro">Acá se mostrarán todos los proyectos que subas en los talleres terminados.</p>
                </div>
            </div>
        </div>
    </div>
</div>   
        <?php
            }
        ?>

    </div>
</section>

@endsection

@section('footer')


@endsection  