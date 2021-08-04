@php
/*

Template name: Proyectos Archive

*/
@endphp

@extends('layouts.app')

@section('content') 


<section class="bg-beige pt-40 pb-4">
    <div class="flex container flex-col md:flex-row max-w-screen-xl mx-auto lg:items-center justify-left md:px-6 lg:px-12">
        <div class="w-3/3 px-4">
            <p  class="text-negro font-festivo8 my-2 inline-block uppercase text-4xl">Proyectos:</p>
            <h1 class="text-negro mb-4 text-4xl" >Técnicas de sustentabilidad</h1>
        </div>
    </div>
</section>
<section class="">
    <div class="flex container flex-col md:flex-row max-w-screen-xl mx-auto lg:items-center justify-left md:px-6 lg:px-12">
        <div class="w-3/3 px-4">

            <div class="grid lg:grid-cols-3 lg:gap-x-16 w-5/6 mx-auto lg:w-full leading-loose mt-12" x-data="{
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
    </div>


    <div class="container mx-auto lg:px-12 hidden">
        <div class="grid grid-cols-12 gap-4 h-16 lg:h-24">
            <div class="col-start-5 col-span-1 mb-8 text-4xl hidden md:block">
                <a href="#" class="h-16 w-16 leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full">
                    <i class="fal fa-chevron-left -ml-1"></i>
                </a>
            </div>
            <div class="col-span-12 lg:col-span-2 lg:mb-8 text-4xl text-center flex justify-center space-x-2">
                <div class="">
                    <span class="w-3 h-3 rounded-md inline-block bg-naranjo hover:bg-gris5 transition duration-200"></span><br>
                    <span class="text-naranjo text-sm">1</span>
                </div>
                <div class="">
                    <span class="w-3 h-3 rounded-md inline-block bg-gris4 hover:bg-gris5 transition duration-200"></span><br>
                    <span class="text-gris4 text-sm">2</span>
                </div>
                <div class="">
                    <span class="w-3 h-3 rounded-md inline-block bg-gris4 hover:bg-gris5 transition duration-200"></span><br>
                    <span class="text-gris4 text-sm">3</span>
                </div>
                <div class="">
                    <span class="w-3 h-3 rounded-md inline-block bg-gris4 hover:bg-gris5 transition duration-200"></span><br>
                    <span class="text-gris4 text-sm">4</span>
                </div>
            </div>
            <div class="col-span-1 mb-8 text-4xl hidden md:block">
                <a href="#" class="h-16 w-16 leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full float-right">
                    <i class="fal fa-chevron-right -mr-1"></i>
                </a>
            </div>
        </div>
    </div>    


</section>

@endsection

@section('footer')


@endsection  