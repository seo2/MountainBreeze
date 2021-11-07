
@php
/*

Template name: Terminar Proyecto

*/
@endphp

@extends('layouts.app')

@section('content') 
@loop
<section class="w-full bg-beige pt-48 pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_verde_proyecto.png');" id="comoFunciona1">
    <div class="w-11/12 lg:w-1/2 mx-auto text-center relative">
        <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5">¡Felicidades!</h1>
        <img src="<?php bloginfo('template_url'); ?>/dist/img/rayas_rosadas.svg" class="block mx-auto w-80 mb-8 md:mb-12">
        <h2 class="text-beige font-festivo19 text-3xl lg:text-4xl uppercase mb-2">@php the_title();@endphp</h2>
        <h3 class="text-beige font-festivo8 text-3xl lg:text-4xl uppercase mb-5">Comparte tus aprendizajes
            <br class="hidden sm:block">y sube tu proyecto</h3>
        <div class="w-11/12 md:w-1/2 mx-auto">
            <a href="<?php bloginfo('url');?>/subir-proyecto/" class="btn border-beige hover:border-naranjo text-beige mb-3 "><i class="fas fa-folder-upload mr-2"></i> Subir Proyecto</a>
            <a href="#" class="btn border-beige hover:border-naranjo text-beige mb-3 "><i class="far fa-file-certificate mr-2"></i> Descargar Certificado</a>
            <a href="#" class="btn border-beige hover:border-naranjo text-beige mb-3 "><i class="fas fa-star-half-alt mr-2"></i> Evalúa tu experiencia</a>
        </div> 

    </div>
</section>

<section class="w-full lg:pt-12 pb-12 lg:pb-24 bg-beige relative overflow-hidden">
    <div class="container lg:px-32">
        <div class="w-11/12 mx-auto text-center mb-8">
            <h4 class="text-negro text-2xl font-festivo19">Contáctate con tu tallerista</h4>
        </div>
        <form class="w-11/12 md:w-2/3 lg:w-1/2  mx-auto">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-full md:w-1/2">
                    <div class="relative">
                    <input type="text" id="name" name="name" placeholder="Nombre y apellido" class="w-full bg-white rounded border border-gray-300 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full md:w-1/2"">
                    <div class="relative">
                        <input type="email" id="email" name="email" placeholder="Email" class="w-full bg-white rounded border border-gray-300 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <select class="bg-white rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 text-base pl-3 pr-10 w-full">
                            <option value="" >Agendar una reunión*</option>
                            <option value="" >M</option>
                            <option value="" >L</option>
                            <option value="" >XL</option>
                        </select>
                        <span class="absolute right-0 top-0 h-full w-10 text-center text-negro pointer-events-none flex items-center justify-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                    <textarea id="message" name="message"  placeholder="Mensaje"  class="w-full bg-white rounded border border-gray-300 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button class="h-12 px-24 block mx-auto leading-12 text-center border border-naranjo bg-naranjo border-solid text-beige hover:bg-negro hover:border-negro transition duration-200 uppercase">Enviar</button>
                </div>
            </div>
      </form>
    </div>
  </section>


@endloop

@endsection

@section('footer')


@endsection  
