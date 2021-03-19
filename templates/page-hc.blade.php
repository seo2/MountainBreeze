@php
/*

Template name: Herencia Colectiva

*/
@endphp

@extends('layouts.app')

@section('content') 

<section class="w-full bg-beige pt-36 @if(is_user_logged_in()) lg:pt-48 @endif  pb-48 lg:pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_rosado_top.png');">
    <div class=" w-4/5  lg:w-1/2 mx-auto lg:text-center">
        <span class="absolute -right-2 transform -rotate-45 lg:relative text-beige text-9xl lg:text-6xl hidden"><i class="fak fa-espiga"></i></span>
        <h1 class="text-negro font-festivo6 text-5xl lg:text-6xl uppercase mb-5">Herencia Colectiva</h1>
        <p class="text-negro mb-2">Los saberes son reliquias, son formas de ver el mundo, de imaginarlo, de sentirlo y experienciarlo. </p>
        <p class="text-negro mb-2">Estos saberes habitan en quienes han sabido guardarlos, preservarlos, rescatarlos y reactualizarlos. Son las reliquias de una herencia circular, colaborativa y común. </p>
        <p class="text-negro">Son las reliquias de una herencia colectiva. </p>
    </div>
</section>
<section class="w-full lg:pt-12 pb-48 bg-beige">
    <div class="container lg:px-32">
        <div class="grid lg:grid-cols-2 gap-16 w-4/5 mx-auto lg:w-full">
            <div class="relative hidden lg:block sticky">
                <img class="absolute z-10 right-80 top-48" src="<?php bloginfo('template_url') ?>/dist/img/scotch.png" alt="cinta adhesiva">
                <img class="absolute z-10 left-4 top-8" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas_horizontales.svg" alt="cinta adhesiva">
                <img class="absolute z-10 right-4 -bottom-16" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas.svg" alt="cinta adhesiva">
                
                <img class="ml-auto relative z-1" src="<?php bloginfo('template_url') ?>/dist/img/hc1.jpg" alt="Origen">
                <img class="-mt-4" src="<?php bloginfo('template_url') ?>/dist/img/hc2.jpg" alt="Somos Herencia">
            </div>
            <div class="">
                <h2 class="text-negro font-festivo8 text-5xl uppercase mb-4 ">Origen</h2>
                <p class="text-negro mb-4">
                    La herencia colectiva recoge el pasado, valora lo recorrido por quienes estuvieron antes y recupera saberes ancestrales. Y, al mismo tiempo, se abre a nuevos posibles a través de la experimentación entusiasta y creativa del presente.                
                </p>
                <p class="text-negro mb-4">
                    Así, los saberes se agencian en prácticas que permiten experimentar, probar, ensayar, trabajar, aplicar, pensar y expandirnos.
                </p>
                <p class="text-negro mb-12">
                    Esta herencia está viva, existe en nuestro cotidiano, en conexión, cooperación y co-creación con otras personas y, también, en vínculo con otros seres, elementos y técnicas: con los animales y vegetales, con el reino funghi y las montañas, con las aguas y los vientos, con la energía calórica del sol y los ciclos lunares, con las tecnologías y los códigos abiertos, con las redes de ceros y unos y sus posibilidades. 
                </p>

                <div class="relative mb-8 lg:hidden">
                    <img class="absolute z-10 right-80 top-48" src="<?php bloginfo('template_url') ?>/dist/img/scotch.png" alt="cinta adhesiva">
                    <img class="absolute z-10 left-4 top-8" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas_horizontales.svg" alt="Rayas">
                    <img class="absolute z-10 right-0 lg:right-4 -bottom-4 lg:-bottom-16 w-3/6 lg:w-auto" src="<?php bloginfo('template_url') ?>/dist/img/rayas_rosas.svg" alt="cinta adhesiva">
                    
                    <img class="ml-auto relative z-1 w-3/4" src="<?php bloginfo('template_url') ?>/dist/img/hc1.jpg" alt="Origen">
                    <img class="-mt-4 w-3/4" src="<?php bloginfo('template_url') ?>/dist/img/hc2.jpg" alt="Somos Herencia">
                </div>

                <h2 class="text-negro font-festivo8 text-5xl uppercase mb-4">TRANSMISIÓN</h2>
                <p class="text-negro mb-4">En Herencia Colectiva buscamos ser un puente, ser el eslabón que conecte a personas que guardan legados y saberes con otras personas que busquen aprenderlos. </p>
                <p class="text-negro mb-4">Queremos ser el vehículo de la transmisión, una dendrita dentro de la red neuronal, un meandro en el río, un conector de Arduino, un espacio expandido para la creación.</p>
                <p class="text-negro mb-12">Queremos posibilitar saberes, aprendizajes y prácticas; y, que las personas que las activan y aprendan, puedan generar nuevas y poderosas redes que se vayan ampliando y creciendo.</p>
                

                <h2 class="text-negro font-festivo8 text-5xl uppercase mb-4">HERENCIA COLECTIVA</h2>
                <p class="text-negro mb-4">La herencia deja de ser lineal para convertirse en rizoma, una herencia que no responde a un linaje singular sino que al linaje de los seres universales que han ido aprendiendo, escuchando y entendiendo cómo vivir más conectados consigo mismos, con los demás y con el entorno. </p>
                <p class="text-negro mb-12">Te invitamos a compartir y creer que eso que imaginamos es posible: que los lazos están, que la conexión pulsa, que la reliquia habita en las personas y nos atraviesa; que los saberes se comparten, se nutren, se transmiten y expanden; que la herencia es colectiva. </p>
                
                
                <a href="@php bloginfo('url'); @endphp/el-cambio" class="btn mb-4">El cambio</a>
                <a href="@php bloginfo('url'); @endphp/como-funciona" class="btn">Cómo funciona</a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection  