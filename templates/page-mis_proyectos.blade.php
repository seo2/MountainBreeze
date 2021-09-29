@php
/*

Template name: Mis Proyectos

*/
@endphp

@extends('layouts.app')

@section('content') 

<section class="w-full bg-beige mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-negro font-festivo6 text-5xl uppercase">Mis Proyectos</h1>
    </div>
</section>

<section class="mt-12 mb-12">
    <div class="container w-full mx-auto min-h-3/4 lg:px-40">
        @loop
        @endloop

        <a href="#" class="flex flex-row border-b border-gris7 py-4 px-4 my-4 hover:bg-beige transition duration-200">
            <div class="w-1/12 flex-none">
                <img src="https://source.unsplash.com/200x200/?plants" alt="" class="w-full">
            </div>
            <div class="flex-grow flex-col flex px-8">
                <p class="flex-grow text-negro">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad</p>
                <h1 class=" text-naranjo">Nombre Taller</h1>
            </div>
            <div class="w-2/12 flex flex-none justify-end">
                <p class="self-end text-negro">06/10/2020</p>
            </div>
        </a>

        <a href="#" class="flex flex-row border-b border-gris7 py-4 px-4 my-4 hover:bg-beige transition duration-200">
            <div class="w-1/12 flex-none">
                <img src="https://source.unsplash.com/200x200/?plants" alt="" class="w-full">
            </div>
            <div class="flex-grow flex-col flex px-8">
                <p class="flex-grow text-negro">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad</p>
                <h1 class=" text-naranjo">Nombre Taller</h1>
            </div>
            <div class="w-2/12 flex flex-none justify-end">
                <p class="self-end text-negro">06/10/2020</p>
            </div>
        </a>

        <a href="#" class="flex flex-row border-b border-gris7 py-4 px-4 my-4 hover:bg-beige transition duration-200">
            <div class="w-1/12 flex-none">
                <img src="https://source.unsplash.com/200x200/?plants" alt="" class="w-full">
            </div>
            <div class="flex-grow flex-col flex px-8">
                <p class="flex-grow text-negro">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad</p>
                <h1 class=" text-naranjo">Nombre Taller</h1>
            </div>
            <div class="w-2/12 flex flex-none justify-end">
                <p class="self-end text-negro">06/10/2020</p>
            </div>
        </a>

    </div>
</section>

@endsection

@section('footer')


@endsection  