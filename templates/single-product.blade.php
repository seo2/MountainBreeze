@php
/*

Template name: Curso

*/
@endphp

@extends('layouts.app')

@section('content') 

@include('partials.nav-curso')

@loop
<section class="w-full pt-12 pb-12 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/plantarda.jpg');">
    <div class="flex container mx-auto justify-between flex-row lg:px-32">
        <div class="w-2/3">
            <a href="" class="text-naranjo uppercase"><i class="fak fa-back mr-4"></i> Volver</a>
            <h1 class="text-beige text-2xl lg:text-4xl mb-5">{{ the_title() }}</h1>
        </div>
        <div class="w-1/3">
            Producto
        </div>
    </div>
</section>

<section class="mt-12">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32 gap-12">
        <div class="w-2/3">
            {{ the_content() }}
            {{-- @php wc_get_template_part( 'content', 'single-product' ); @endphp --}}
        </div>
        <div class="w-1/3">
            @php dynamic_sidebar( 'sidebar-1' ); @endphp
        </div>
    </div>
</section>
@endloop


@endsection

@section('footer')


@endsection  