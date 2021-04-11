@php
/*

Template name: Curso

*/
@endphp

@extends('layouts.app')

@section('content') 

@include('partials.nav-curso')

@loop
<section class="w-full flex pt-6 pb-6 h-48 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/plantarda.jpg');">
    <div class="container flex flex-row h-100 max-w-screen-xl mx-auto justify-between lg:px-32">
        <div class="relative w-2/3">
            <a href="" class="text-naranjo uppercase relative top-0"><i class="fak fa-back mr-4"></i> Volver</a>
            <h1 class="text-beige font-festivo6 text-2xl lg:text-4xl absolute bottom-0">{{ the_title() }}</h1>
        </div>
        <div class="w-1/3">
            lol
        </div>
    </div>
</section>

<section class="my-12" id="taller">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32 gap-12">
        <div class="w-2/3">
            {{ the_content() }}
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