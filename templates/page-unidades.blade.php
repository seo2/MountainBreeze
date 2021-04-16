@php
/*

Template name: Unidades

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
            <div class="grid lg:grid-cols-1 lg:gap-x-16 w-5/6 mx-auto lg:w-full leading-loose mt-6"  x-data="{
                unidades: [
                    {
                        unidad: 'Unidad 1',
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
                        unidad: 'Unidad 4',
                        question: 'Why am I so awesome?',
                        answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                        isOpen: false,
                    },
                    {
                        unidad: 'Unidad 5',
                        question: 'up exlaborum incidunt quis nos',
                        answer: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cumque, nulla harum aspernatur veniam ullam provident neque temporibus autem itaque odit.',
                        isOpen: false,
                    },
                ]
            }">
                <template x-for="unidad in unidades" :key="unidad.question">
                    <div>
                        <button class="w-full border-b border-gris5 py-3 flex justify-between items-center mt-4"
                            @click="unidades = unidades.map(f => ({ ...f, isOpen: f.question !== unidad.question ? false : !f.isOpen}))"><!-- Specs has it that only one component can be open at a time and also you should be able to toggle the open state of the active component too -->
                            <div class="text-left">
                                <div x-text="unidad.unidad" class="text-naranjo uppercase font-festivo6"></div>
                                <div x-text="unidad.question" class="text-gris"></div>
                            </div>
                            <svg x-show="!unidad.isOpen" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui text-negro" d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                            </svg>
                            <svg x-show="unidad.isOpen" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                                <path class="heroicon-ui text-naranjo" d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                            </svg>
                        </button>
                        <div class="text-negro mt-2" x-text="unidad.answer" x-show="unidad.isOpen" ></div>
                    </div>
                </template>
            </div>
        </div>
        <div class="w-1/3 px-4">
            @include('partials.sidebar-curso')
        </div>
    </div>
</section>

<section class="w-full pt-24 lg:pt-32 pb-12 relative lg:bg-100 bg-no-repeat bg-top bg-rosado bg-contain" style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_rosado_bot_blanco_top.png');">
  
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