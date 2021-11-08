@php
/*

Template name: Subir Proyectos

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

<section class="w-full bg-naranjo mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-beige font-festivo6 text-5xl uppercase">Comparte tu proyecto</h1>
    </div>
</section>

<section class="">
    <div class="flex items-center justify-center bg-beige py-8 px-4 sm:px-6 lg:px-4">
        <div class="max-w-sm w-full space-y-8">
          @loop
          @php the_content(); @endphp
          @endloop

          <form class="mt-6 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class=" -space-y-px">
                <div class="relative">
                    <label for="nombre" class="sr-only">Titulo de tu proyecto</label>
                    <input id="nombre" name="last_name" type="text" autocomplete="last_name" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nombre">
                </div>
                <div class="relative">
                    <label for="nombre" class="sr-only">Apellido</label>
                    <input id="nombre" name="first_name" type="text" autocomplete="first_name" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Apellido">
                </div>
                <div class="relative">
                    <label for="nombre" class="sr-only">Nombre de Usuario</label>
                    <input id="nombre" name="username" type="text" autocomplete="username" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nombre de Usuario">
                </div>
                <div class="relative">
                    <label for="email-address" class="sr-only">Email</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="E-mail">
                </div>
            </div>
      
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-500">
                    Me gustaría recibir información relevante sobre Herencia Colectiva
                </label>
              </div>
            </div>
            
            <input type="hidden" name="task" value="register" />     
            <div>
              <button type="submit" name="btnregister" class="group relative w-full flex justify-center py-2 px-4 border border-negro text-negro uppercase bg-white hover:bg-naranjo hover:border-naranjo focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-naranjo">
                Enviar
              </button>
         
            </div>
      
          </form>



        </div>
      </div>



</section>



@endsection

@section('footer')


@endsection  