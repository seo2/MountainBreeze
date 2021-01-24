@php
/*

Template name: Registro

*/
@endphp

@extends('layouts.app')

@section('content') 

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-8 px-4 sm:px-6 lg:px-4">
    <div class="max-w-sm w-full space-y-8">
      <div>
         <h2 class="mt-6 text-center text-4xl text-negro">
          Regístrate
        </h2>
      </div>
      <form class="mt-6 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true">
        <div class=" -space-y-px">
            <div class="relative">
                <label for="nombre" class="sr-only">Nombre</label>
                <input id="nombre" name="nombre" type="text" autocomplete="nombre" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nombre">
            </div>
            <div class="relative">
                <label for="email-address" class="sr-only">Email</label>
                <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="E-mail">
            </div>
            <div class="relative">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Contraseña">
                <span class="absolute right-3 top-0 text-verde text-sm z-20 py-4 cursor-pointer">Mostrar</span>
            </div>
            <div class="relative">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Repetir contraseña">
                <span class="absolute right-3 top-0 text-verde text-sm z-20 py-4 cursor-pointer">Mostrar</span>
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
  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-negro text-negro uppercase bg-white hover:bg-naranjo hover:border-naranjo focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-naranjo">
            Enviar
          </button>
        </div>
  
        <div class="text-center">
            <div class="text-gris3">
                ¿Ya tienes una cuenta?
                <a href="@php bloginfo('url') @endphp/ingresa" class="font-medium text-naranjo hover:text-naranjo ml-2 underline hover:no-underline">
                    Ingresa acá
                </a>
            </div>
        </div>
      </form>
    </div>
  </div>
  



@endsection

@section('footer')


@endsection  