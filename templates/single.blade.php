@extends('layouts.app')

@section('content') 

@loop
@php
    if ( get_post_type( get_the_ID() ) == 'proyectos' ) {
        $imagen_banner_taller            = get_the_post_thumbnail_url( $featured_post->ID );
        $volver         = '/mis-proyectos/';
        $volver         = 'javascript:history.back();';
        $tallerID       = get_field('taller');
        $course_title   = get_the_title($tallerID);
    }else{
        $imagen_banner_taller = get_field('imagen_banner_taller');
        $volver               = '/mis-talleres/';
    }
    // current post id
    $post_id = get_the_ID();
@endphp
<section class="w-full flex py-4 md:py-6 mt-32 md:h-48 bg-cover bg-left-bottom lg:bg-center bg-fixed bg-no-repeat bg-azul relative" @if ($imagen_banner_taller)  style="background-image: url({{$imagen_banner_taller}});" @endif >
    @if ($imagen_banner_taller)  
        <div class="absolute inset-0 w-full h-full  bg-gradient-to-t from-black opacity-50"></div>
    @endif 
    @if ( get_post_type( get_the_ID() ) == 'proyectos' )
    <div class="container flex flex-col md:flex-row h-100 max-w-screen-xl mx-auto justify-between px-6 lg:px-32 relative z-10">
        <div class="relative w-full mb-4 md:mb-0">
            <a href="@php echo $volver; @endphp" class="text-blanco uppercase relative top-2 hover:text-naranjo transition duration-200 block"><i class="fak fa-back mr-4"></i> Volver</a>
            @php
                //check if the post is from current user
                $user_id = get_current_user_id();
                $post_author_id = get_the_author_meta('ID');
                $is_current_user = ($user_id == $post_author_id);
                if($user_id == $post_author_id){
                    echo'<a href="'.$edit_link.'" class="text-blanco uppercase relative top-2 hover:text-naranjo transition duration-200 block">Editar <i class="fas fa-edit"></i></a>';
                }
            @endphp


            <h2 class="text-beige font-festivo6 text-2xl uppercase mt-4">proyecto</h2>
            <h1 class="text-beige font-festivo6 text-5xl uppercase">{{ the_title()}}</h1>
            <h4 class="text-beige text-2xl font-festivo19">Taller {{$course_title}}</h4>
            <h3 class="font-bold">{!! $mensaje !!}</h3>
        </div> 
    </div>
    @else
    <div class="container flex flex-col md:flex-row h-100 max-w-screen-xl mx-auto justify-between px-6 lg:px-32 relative z-10">
        <div class="relative w-full md:w-2/3 mb-4 md:mb-0">
            <a href="" class="text-blanco uppercase relative top-2 hover:text-naranjo transition duration-200 block"><i class="fak fa-back mr-4"></i> Volver</a>
            <h1 class="text-beige font-festivo6 text-2xl lg:text-4xl absolute bottom-0 hidden md:block">{{ the_title() }}</h1>
        </div> 
        <div class="w-full md:w-1/3 flex md:justify-center content-center items-center">
            @php
                $permalink  = get_permalink( get_field('tallerista'));
                $title      = get_the_title( get_field('tallerista') );
                $url        = get_the_post_thumbnail_url( get_field('tallerista')  );
                $instagram  = get_field( 'instagram', get_field('tallerista') );
            @endphp
            <div class="rounded-full h-20 w-20 flex items-center justify-center bg-naranjo border border-negro mr-4 bg-cover" style="background-image: url('<?php echo $url; ?>"></div>
            <div>
                <h1 class="text-beige font-festivo6 text-2xl lg:text-4xl md:hidden ">{{ the_title() }}</h1>
                <a href="@php echo $permalink; @endphp" class="text-beige uppercase text-xle hover:underline">@php echo $title; @endphp</p>
                <a href="https://instagram.com/@php echo $instagram; @endphp" class="text-beige hover:underline">@php echo '@'.$instagram; @endphp</a>
            </div>
        </div>
    </div>
    @endif
</section>
<section class="my-2 md:my-12" id="taller">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-col lg:flex-row px-6 lg:px-32 md:gap-12">
        <div class="w-full md:w-2/3">
            @php

                $html = '
                <div class="w-full mb-8">
                    <p class="text-negro">Ya terminaste el taller, recuerda descargar el certificado, subir tu proyecto, evaluar el taller y contactar una cita con tu tallerista.</p>
                    <a href="/evaluar-taller/?taller='.$post_id.'" class="bg-rosado px-6 py-3 text-negro uppercase text-sm transition duration-200 hover:bg-negro hover:text-beige">Pasos finales <i class="fas fa-long-arrow-right"></i></a>
                </div>
                ';
                echo do_shortcode("[course_complete course_id='$post_id'] ". $html ." [/course_complete]"); 

                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'thumbnail-size', true);
            @endphp
            <img src="@php echo $thumbnail_url[0]; @endphp" alt="@php the_title(); @endphp">
            @php
                  echo do_shortcode("[course_inprogress course_id='$post_id'][uo_course_resume course_id='$post_id'][/course_inprogress]");
            @endphp
            {{ the_content() }}
        </div>
        <div class="w-full md:w-1/3">
            @php dynamic_sidebar( 'sidebar-1' ); @endphp
        </div>
    </div>
</section>
@endloop


@endsection

@section('footer')
<script>
    // prepend html in #bbpress-forums   
    jQuery(document).ready(function($) {
        // if #bbpress-forums exists
        if ($('#bbpress-forums').length) {
            // prepend html
            $('#bbpress-forums').prepend('<div class="clear-both"></div><h4 class="text-negro text-2xl font-festivo19 md:float-left mb-2 md:mb-0">Foro del taller</h4>');
        }
        // change .learndash-resume-button input value to "Continuar Taller"
        $('.learndash-resume-button input').val('Continuar taller');
        $('.learndash-wrapper .ld-course-navigation .ld-course-navigation-actions .ld-home-link').css('display', 'none');
    }); 
</script>
@endsection  