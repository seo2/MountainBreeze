
@php
/*

Template name: Terminar Proyecto

*/
@endphp

@extends('layouts.app')

@section('content') 
@php
    // redirect if not logged in
    if(!is_user_logged_in()){
        wp_redirect( home_url() .'/mi-cuenta' );
        exit;
    }
@endphp
@loop

@include('partials.terminar-menu')

<section class="w-full lg:pt-12 pb-12 lg:pb-24 bg-beige relative overflow-hidden">
    <div class="container lg:px-32">
        <div class="w-11/12 mx-auto text-center mb-8">
            <h4 class="text-negro text-2xl font-festivo19">Agenda una reunión con tu tallerista</h4>
        </div>
        <form class="w-11/12 md:w-2/3 lg:w-1/2  mx-auto">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-full md:w-1/2">
                    <div class="relative">
                    <input type="text" id="name" name="name" placeholder="Nombre y apellido" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>
                <div class="p-2 w-full md:w-1/2"">
                    <div class="relative">
                        <input type="email" id="email" name="email" placeholder="Email" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <select class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
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
                    <textarea id="message" name="message"  placeholder="Mensaje"  class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm h-32"></textarea>
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

@section('under-footer')

@endsection 