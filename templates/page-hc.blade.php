@php
/*

Template name: Herencia Colectiva

*/
@endphp

@extends('layouts.app')

@section('content') 

<section class="w-full bg-beige pt-36 pb-48 lg:pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_rosado_top.png');">
    <div class=" w-4/5  lg:w-1/2 mx-auto lg:text-center">
        <span class="absolute -right-2 transform -rotate-45 lg:relative text-beige text-9xl lg:text-6xl hidden"><i class="fak fa-espiga"></i></span>
        <h1 class="text-negro font-festivo6 text-5xl lg:text-6xl uppercase mb-5">Herencia Colectiva</h1>
        <p class="text-negro mb-2">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</p>
        <p class="text-negro">At nam minimum ponderum. Est audiam animal molestiae te.</p>
    </div>
</section>
<section class="w-full lg:pt-12 pb-48 bg-beige">
    <div class="container lg:px-32">
        <div class="grid lg:grid-cols-2 gap-16 w-4/5 mx-auto lg:w-full">
            <div class="relative hidden lg:block">
                <img class="absolute z-10 right-80 top-48" src="<?php bloginfo('template_url') ?>/dist/img/scotch.png" alt="cinta adhesiva">
                <img class="absolute z-10 left-4 top-8" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas_horizontales.svg" alt="cinta adhesiva">
                <img class="absolute z-10 right-4 -bottom-16" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas.svg" alt="cinta adhesiva">
                
                <img class="ml-auto relative z-1" src="<?php bloginfo('template_url') ?>/dist/img/hc1.jpg" alt="Origen">
                <img class="-mt-4" src="<?php bloginfo('template_url') ?>/dist/img/hc2.jpg" alt="Somos Herencia">
            </div>
            <div class="">
                <h2 class="text-negro font-festivo8 text-5xl uppercase mb-4 ">Origen</h2>
                <p class="text-negro mb-12">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</p>

                <div class="relative mb-8 lg:hidden">
                    <img class="absolute z-10 right-80 top-48" src="<?php bloginfo('template_url') ?>/dist/img/scotch.png" alt="cinta adhesiva">
                    <img class="absolute z-10 left-4 top-8" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas_horizontales.svg" alt="Rayas">
                    <img class="absolute z-10 right-0 lg:right-4 -bottom-4 lg:-bottom-16 w-3/6 lg:w-auto" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas.svg" alt="cinta adhesiva">
                    
                    <img class="ml-auto relative z-1 w-3/4" src="<?php bloginfo('template_url') ?>/dist/img/hc1.jpg" alt="Origen">
                    <img class="-mt-4 w-3/4" src="<?php bloginfo('template_url') ?>/dist/img/hc2.jpg" alt="Somos Herencia">
                </div>

                <h2 class="text-negro font-festivo8 text-5xl uppercase mb-4">Somos Herencia</h2>
                <p class="text-negro mb-12">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</p>
                <a href="@php bloginfo('url'); @endphp/el-cambio" class="btn mb-4">El cambio</a>
                <a href="@php bloginfo('url'); @endphp/como-funciona" class="btn">Cómo funciona</a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection  