@php
/*

Template name: Talleres

*/
@endphp

@extends('layouts.app')

@section('content') 


<div class="pt-16 -mt-8 lg:mt-28 -mb-10 z-2 relative lg:bg-cover bg-top bg-no-repeat" style="background-image: url('@php bloginfo('template_url') @endphp/dist/img/bg_beige.png');">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-1 col-span-12 text-center lg:mb-8">
                <h2 class="font-festivo6 text-4xl lg:text-6xl text-beige leading-none"  style="background: url('@php bloginfo('template_url') @endphp/dist/img/trazo.svg') center center no-repeat; background-size: contain;">
                    Talleres:
                </h2>
                <h3 class="font-festivo6 text-2xl lg:text-4xl text-negro">
                    Técnicas y oficios
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="pt-16" style="background: url('@php bloginfo('template_url') @endphp/dist/img/bg_beige2.png') top center no-repeat; background-size: cover;">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 lg:gap-4">

            
            
            <div class="col-start-2 col-span-10 lg:col-start-2 lg:col-span-5 mb-12">
                <div class="relative">
                    <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                    <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                        <i class="fak fa-add-bag"></i>
                    </a>
                </div>
                <div class="relative mt-3">
                    <p class="text-naranjo text-lg lg:text-xl">$12.990</p>
                    <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                    <p class="text-negro mb-4">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. </p>
                    <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                </div>
            </div>



            {{-- <div class="col-span-5 mb-8 hidden md:block">
                <div class="relative">
                    <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                    <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                        <i class="fak fa-add-bag"></i>
                    </a>
                </div>
                <div class="relative mt-3">
                    <p class="text-naranjo text-xl">$12.990</p>
                    <h4 class="text-negro text-2xl font-bold leading-none my-3">Técnicas de Sustentabilidad</h4>
                    <p class="text-negro mb-4">Et has minim elitr intellegat. Mea aeterno eleifend antiopam ad, nam no suscipit quaerendum. </p>
                    <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<div class="w-full lg:pt-32 pb-36 relative lg:bg-contain bg-no-repeat bg-top -mt-12 " style="background-image: url('@php bloginfo('template_url') @endphp/dist/img/bg_beige_top_a_blanco.png');">

    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="grid grid-cols-12 gap-2 lg:gap-4">
                    <div class="col-span-6 lg:col-span-3 mb-8">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-2 lg:mt-3">
                            <p class="text-naranjo text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-6 lg:col-span-3 mb-8">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-2 lg:mt-3">
                            <p class="text-naranjo text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-3 mb-8 hidden md:block">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-3">
                            <p class="text-naranjo text-xl">$12.990</p>
                            <h4 class="text-negro text-2xl font-bold leading-none my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-3 mb-8 hidden md:block">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-3">
                            <p class="text-naranjo text-xl">$12.990</p>
                            <h4 class="text-negro text-2xl font-bold leading-none my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-6 lg:col-span-3 mb-8">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-2 lg:mt-3">
                            <p class="text-naranjo text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-6 lg:col-span-3 mb-8">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-2 lg:mt-3">
                            <p class="text-naranjo text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-3 mb-8 hidden md:block">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-3">
                            <p class="text-naranjo text-xl">$12.990</p>
                            <h4 class="text-negro text-2xl font-bold leading-none my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-3 mb-8 hidden md:block">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-3">
                            <p class="text-naranjo text-xl">$12.990</p>
                            <h4 class="text-negro text-2xl font-bold leading-none my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="w-full lg:pt-32 pb-12 relative lg:bg-100 bg-no-repeat bg-top -mt-48 bg-rosado" style="background-image: url('@php bloginfo('template_url') @endphp/dist/img/bg_rosado_bot_blanco_top.png');">
  
    <div class="container mx-auto">
        <h2 class="font-festivo6 text-4xl text-negro leading-none mb-12 text-center">
            ¡Talleres en promoción!
        </h2>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="grid grid-cols-12 gap-2 lg:gap-4">
                    <div class="col-span-6 lg:col-span-3 mb-8">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-2 lg:mt-3">
                            <p class="text-beige text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-6 lg:col-span-3 mb-8">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-2 lg:mt-3">
                            <p class="text-beige text-lg lg:text-xl">$12.990</p>
                            <h4 class="text-negro text-xl lg:text-2xl font-bold leading-none my-2 lg:my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-3 mb-8 hidden md:block">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-3">
                            <p class="text-beige text-xl">$12.990</p>
                            <h4 class="text-negro text-2xl font-bold leading-none my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-span-3 mb-8 hidden md:block">
                        <div class="relative">
                            <img src="@php bloginfo('template_url') @endphp/dist/img/pan.jpg" alt="pan">
                            <a href="#" class="text-blanco bg-azul hover:bg-rosado hover:text-fondooscuro transition duration-200 rounded-full absolute bottom-0 right-0 mr-4 mb-4 w-10 h-10 leading-10 text-center">
                                <i class="fak fa-add-bag"></i>
                            </a>
                        </div>
                        <div class="relative mt-3">
                            <p class="text-beige text-xl">$12.990</p>
                            <h4 class="text-negro text-2xl font-bold leading-none my-3">Técnicas de Sustentabilidad</h4>
                            <p class="text-negro text-sm"><i class="fak fa-espiga"></i> Lorem ipsum</p>
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