@php
/*

Template name: El Cambio

*/
@endphp

@extends('layouts.app')

@section('content') 
@loop
<section class="w-full bg-fondooscuro @if(is_user_logged_in()) pt-48 @else pt-36 @endif pb-24 lg:pb-12 lg:bg-cover bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/Fondo_Negro_1.png');" id="elCambio">
    <div class="w-full h-60 bg-gradient-to-t from-transparent to-black absolute top-0 left-0"></div>
    <img src="<?php bloginfo('template_url') ?>/dist/img/rayas2.svg" alt="rayas" class="absolute w-1/3 lg:w-1/6 top-24 lg:top-12 right-0">
    <div class="container mx-auto">
        <div class="grid grid-cols-12">
            <div class="col-start-2 col-span-10 lg:col-start-2 lg:col-span-3">
                <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5">@php the_title(); @endphp</h1>
                @php the_content(); @endphp
            </div>
        </div>
    </div>
</section>
<section class="w-full pb-48">
    <div class="container">
        <div class="grid grid-cols-12 flex items-end -mt-12 lg:-mt-24">
            <div class="col-start-2 col-span-10 lg:col-start-6 lg:col-span-6 lg:hidden mb-4">
                <img src="<?php bloginfo('template_url') ?>/dist/img/VIDEO.jpg" alt="" class="w-full">
            </div>
            <div class="col-start-2 col-span-10 lg:col-start-2 lg:col-span-3">
                <a href="@php bloginfo('url'); @endphp/herencia-colectiva" class="btn mb-4">Herencia Colectiva</a>
                <a href="@php bloginfo('url'); @endphp/como-funciona" class="btn">Cómo funciona</a>
            </div>
            <div class="col-start-2 col-span-10 lg:col-start-6 lg:col-span-6 hidden lg:block">
                <img src="<?php bloginfo('template_url') ?>/dist/img/VIDEO.jpg" alt="" class="w-full">
            </div>
        </div>
    </div>
</section>

@endloop

@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection  