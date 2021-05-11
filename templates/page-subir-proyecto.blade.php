@php
/*

Template name: Subir Proyectos

*/
@endphp

@extends('layouts.app')

@section('content') 

<section class="w-full bg-naranjo mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-beige font-festivo6 text-5xl uppercase">Comparte tu proyecto</h1>
    </div>
</section>

<section class="">
    <div class="flex items-center justify-center bg-beige py-8 px-4 sm:px-6 lg:px-4">
        <div class="max-w-sm w-full space-y-8">

          <?php echo do_shortcode( '[wpfepp_submission_form form="1"]' ); ?> 
          <?php // echo do_shortcode( '[wpshout_frontend_post]' ); ?>          

        </div>
      </div>



</section>

@endsection

@section('footer')


@endsection  