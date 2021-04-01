
@php
/*

Template name: Cómo funciona

*/
@endphp

@extends('layouts.app')

@section('content') 
@loop
<section class="w-full bg-beige pt-36 pb-48 lg:pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_naranjo_top.png');" id="comoFunciona1">
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <span class="absolute lg:relative -top-8 -right-2 lg:top-auto lg:right-auto transform -rotate-45 text-negro text-9xl lg:text-6xl"><i class="fak fa-llama"></i></span>
        <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5 w-3/4 lg:w-full">@php the_title();@endphp</h1>
        @php the_content(); @endphp
    </div>
</section>

<section class="w-full lg:pt-12 pb-12 lg:pb-48 bg-beige relative overflow-hidden">
    <div class="container lg:px-32">
        <div class="grid lg:grid-cols-12 gap-16 w-5/6 mx-auto lg:w-full">
            <div class="col-span-5 relative flex flex-col flex-wrap">
                <div class="flex-grow">
                    <h2 class="text-negro font-festivo8 text-7xl uppercase lg:mb-4">Pasos</h2>
                    <img src="<?php bloginfo('template_url') ?>/dist/img/oxoxox.svg" alt="x_x" class="hidden lg:block">
                </div>
                <div class="hidden lg:block">
                    <a href="@php bloginfo('url'); @endphp/el-cambio" class="btn mb-4">El cambio</a>
                    <a href="@php bloginfo('url'); @endphp/herencia-colectiva" class="btn">Herencia Colectiva</a>
                </div>
            </div>
            <div class="col-span-7 -mt-8 lg:mt-auto">
                <div class="mb-8 relative">
                    <div class="w-10 h-10 leading-10 text-center bg-contain bg-no-repeat absolute text-negro"  style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/circulo_1.svg');">
                        1.
                    </div>
                    <div class="pl-16 text-gris text-sm">
                        @php the_field('paso_1') @endphp
                    </div>
                </div>
                <div class="mb-8 relative">
                    <div class="w-10 h-10 leading-10 text-center bg-contain bg-no-repeat absolute text-negro"  style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/circulo_2.svg');">
                        2.
                    </div>
                    <div class="pl-16 text-gris text-sm">
                        @php the_field('paso_2') @endphp
                    </div>
                </div>
                <div class="mb-8 relative">
                    <div class="w-10 h-10 leading-10 text-center bg-contain bg-no-repeat absolute text-negro"  style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/circulo_3.svg');">
                        3.
                    </div>
                    <div class="pl-16 text-gris text-sm">
                        @php the_field('paso_3') @endphp
                    </div>
                </div>
                <div class="relative">
                    <div class="w-10 h-10 leading-10 text-center bg-contain bg-no-repeat absolute text-negro"  style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/circulo_4.svg');">
                        4.
                    </div>
                    <div class="pl-16 text-gris text-sm">
                        @php the_field('paso_4') @endphp
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <img class="absolute z-10 -right-56 -bottom-4 lg:-bottom-32 w-1/4 hidden lg:block" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas.svg" alt="cinta adhesiva">
</section>
@endloop

@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection  
