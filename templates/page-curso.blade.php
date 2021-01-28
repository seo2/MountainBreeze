@php
/*

Template name: Curso

*/
@endphp

@extends('layouts.app')

@section('content') 

<section class="bg-blanco mt-36 border-b border-gris5 border-solid h-16 ">
    <div class="flex container max-w-screen-xl mx-auto items-center justify-between flex-row lg:px-24">
        <nav class="flex-grow md:pb-0 flex justify-between lg:justify-start flex-row uppercase">
          <a class="px-4 lg:px-12 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="#">Intro</a>
          <a class="px-4 lg:px-12 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="#">Unidades</a>
          <a class="px-4 lg:px-12 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="#">Valoración</a>
          <a class="px-4 lg:px-12 py-4 text-gris text-sm font-sans bg-transparent rounded-none md:mt-0 md:mr-1 hover:text-naranjo focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="#">Proyectos</a>
        </nav>
        <nav class="flex-col flex-grow hidden md:flex md:justify-end md:flex-row">
          <a class="px-4 lg:px-6 lg:mr-12 py-4 text-gris bg-gris6 text-xl font-sans rounded-none hover:text-beige hover:bg-negro focus:text-naranjo focus:bg-gray-200 focus:outline-none focus:shadow-outline transition duration-200" href="#"><i class="fal fa-heart"></i></a>
        </nav>
    </div>
</section>

<section class="mt-12">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32">
        <div class="w-2/3 px-4">
            <div>
                <img src="<?php bloginfo('template_url') ?>/dist/img/foto_curso.jpg" alt="Curso" class="w-full">
            </div>
            <a  class="text-naranjo my-4 inline-block uppercase" href="#">loquemaspuedo</a>
            <h1 class="text-negro mb-4 text-4xl" >Técnicas de sustentabilidad</h1>
            <p  class="text-negro mb-12" >Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum.</p>
            <hr>
            <h2 class="text-negro mt-12 mb-4 text-2xl" >Sobre el curso</h2>
            <p  class="text-negro mb-8" >Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</p>
            <div>
                <img src="<?php bloginfo('template_url') ?>/dist/img/foto_curso2.jpg" alt="Curso" class="w-full">
            </div>
            <h2 class="text-negro mt-12 mb-4 text-2xl" >Requisitos</h2>
            <p  class="text-negro mb-8" >Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. At nam minimum ponderum. Est audiam animal molestiae te.</p>
            
        </div>
        <div class="w-1/3 px-4">
            <div class="bg-beige py-4 px-8">
                <span>$12.990</span>
                <p class="text-sm mt-2 font-bold">Técnicas de sustentabilidad</p>
                <p class="text-sm mb-2 capitalize">loquemaspuedo</p>
                <button class="w-full bg-naranjo text-beige uppercase text-center py-3 hover:bg-negro transition duration-200">Comprar</button>
                <ul class="mt-4">
                    <li class="mb-2 text-sm">
                        <i class="fak fa-valoraciones mr-2" ></i> 98% Valoraciones positivas
                    </li>
                    <li class="mb-2 text-sm">
                        <i class="fak fa-online mr-2" ></i> Online y a tu ritmo
                    </li>
                    <li class="mb-2 text-sm">
                        <i class="fak fa-audio mr-2" ></i> Audio: Español
                    </li>
                    <li class="mb-2 text-sm">
                        <i class="fak fa-nivel mr-2" ></i> Nivel: INICIACIÓN
                    </li>
                    <li class="mb-2 text-sm">
                        <i class="fak fa-lecciones mr-2" ></i> 18 Lecciones (2h 18m)
                    </li>
                    <li class="mb-2 text-sm">
                        <i class="fak fa-idioma mr-2" ></i> Español, Inglés
                    </li>
                    <li class="mb-2 text-sm">
                        <i class="fak fa-acceso mr-2" ></i> Acceso ilimitado
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="w-full pt-24 lg:pt-32 pb-12 relative lg:bg-100 bg-no-repeat bg-top bg-rosado" style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_rosado_bot_blanco_top.png');">
  
    <div class="container mx-auto">
        <h2 class="font-festivo6 text-4xl text-negro leading-none mb-12 text-center">
            Te podría interesar
        </h2>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="grid grid-cols-12 gap-2 lg:gap-4">
                    <div class="flex space-x-4 lg:space-x-0 lg:block col-span-12 lg:col-span-3 mb-8">
                        <div class="relative w-1/4 lg:w-auto ">
                            <img src="<?php bloginfo('template_url') ?>/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="hidden lg:inline-block text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative lg:mt-3">
                            <p class="hidden lg:block text-beige text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="hidden lg:block text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="flex space-x-4 lg:space-x-0 lg:block col-span-12 lg:col-span-3 mb-8">
                        <div class="relative w-1/4 lg:w-auto ">
                            <img src="<?php bloginfo('template_url') ?>/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="hidden lg:inline-block text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative lg:mt-3">
                            <p class="hidden lg:block text-beige text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="hidden lg:block text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="flex space-x-4 lg:space-x-0 lg:block col-span-12 lg:col-span-3 mb-8">
                        <div class="relative w-1/4 lg:w-auto ">
                            <img src="<?php bloginfo('template_url') ?>/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="hidden lg:inline-block text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative lg:mt-3">
                            <p class="hidden lg:block text-beige text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="hidden lg:block text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="flex space-x-4 lg:space-x-0 lg:block col-span-12 lg:col-span-3 mb-8">
                        <div class="relative w-1/4 lg:w-auto ">
                            <img src="<?php bloginfo('template_url') ?>/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="hidden lg:inline-block text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative lg:mt-3">
                            <p class="hidden lg:block text-beige text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="hidden lg:block text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>



@endsection

@section('footer')


@endsection  