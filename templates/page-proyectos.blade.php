@php
/*

Template name: Proyectos

*/
@endphp

@extends('layouts.app')

@section('content') 

@include('partials.nav-curso')

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
            <div class="grid lg:grid-cols-2 lg:gap-x-16 w-5/6 mx-auto lg:w-full leading-loose mt-12" x-data="{
                valoraciones: [
                    {
                        unidad: 'plants',
                        question: 'Et has minim alitr',
                        answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores iure quas laudantium dicta impedit, est id delectus molestiae deleniti enim nobis rem et nihil.',
                        isOpen: false,
                    },
                    {
                        unidad: 'Unidad 2',
                        question: 'Lorem ipsum dolor sit amet',
                        answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                        isOpen: false,
                    },
                    {
                        unidad: 'Unidad 3',
                        question: 'mea aeterno eleifend antiopam?',
                        answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                        isOpen: false,
                    },
                    {
                        unidad: 'Unidad 2',
                        question: 'Lorem ipsum dolor sit amet',
                        answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                        isOpen: false,
                    },
                    {
                        unidad: 'Unidad 3',
                        question: 'mea aeterno eleifend antiopam?',
                        answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                        isOpen: false,
                    }
                ]
            }">
                <template x-for="valoracion in valoraciones" :key="valoracion.question">
                    <div class="mb-16">
                        <img src="https://source.unsplash.com/500x500/?plants" alt="">
                        <span class="text-naranjo uppercase text-sm">Nombre usuario</span>
                        <h3 class="text-negro uppercase font-festivo6 text-2xl leading-tight">Nombre del proyecto que hizo el usuario</h3>
                    </div>
                </template>

            </div>
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