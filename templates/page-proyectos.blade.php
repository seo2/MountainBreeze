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
            @include('partials.sidebar-curso')
        </div>
    </div>
</section>

@include('partials.interesar')



@endsection

@section('footer')


@endsection  