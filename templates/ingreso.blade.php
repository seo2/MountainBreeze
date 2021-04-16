@php
/*

Template name: Ingreso

*/
@endphp

@extends('layouts.app')

@section('content') 

@php
$redirect_to = '';
@endphp

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-8 px-4 sm:px-6 lg:px-4">
    <div class="max-w-sm w-full space-y-8">
      <div>
         <h2 class="mt-6 text-center text-4xl text-negro">
          Ingresa
        </h2>
      </div>
      <form class="mt-6 space-y-6" action="@php echo site_url( '/wp-login.php' ); @endphp" method="POST">
          <div>
            <a href="" class="py-4 px-3 text-center block text-negro border border-gray-300 mb-3"><i class="fab fa-google mr-2 text-lg"></i> Conectarse con Google</a>
            <a href="" class="py-4 px-3 text-center block text-negro border border-gray-300 mb-3"><i class="fab fa-facebook mr-2 text-lg"></i> Conectarse con Facebook</a>
          </div>
    
          <hr>
        <input type="hidden" name="remember" value="true">
        <div class=" -space-y-px">
            <div class="relative">
                <label for="email-address" class="sr-only">Email</label>
                <input id="email-address" name="log" type="text" autocomplete="email" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="E-mail">
            </div>
            <div class="relative">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="pwd" type="password" autocomplete="current-password" required class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Contraseña">
                <span class="absolute right-3 top-0 text-verde text-sm z-20 py-4 cursor-pointer">Mostrar</span>
            </div>
        </div>
  
        <input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
        <input type="hidden" value="1" name="testcookie">
        

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember_me" name="rememberme" value="forever" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="remember_me" class="ml-2 block text-sm text-gray-500">
                Mantenerme conectado
            </label>
          </div>
        </div>
  
        <div class="text-center">
          <input id="wp-submit" type="submit" value="Login"Ingresarname="wp-submit" class="group relative w-full flex justify-center py-2 px-4 border border-negro text-negro uppercase bg-white hover:bg-naranjo hover:border-naranjo focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-naranjo"></p>
            <a href="@php bloginfo('url') @endphp/registrate" class="font-medium text-naranjo hover:text-naranjo mt-4 inline-block text-sm underline hover:no-underline">
                ¿Olvidaste tu contraseña?
            </a>
        </div>
  
        <div class="text-center">
            <div class="text-gris3">
                ¿No eres miembro aún?
                <a href="@php bloginfo('url') @endphp/registrate" class="font-medium text-verde hover:text-verde ml-2 underline hover:no-underline">
                    Regístrate
                </a>
            </div>
        </div>
      </form>
    </div>
  </div>
  



@endsection

@section('footer')


@endsection  