@php
/*

Template name: El Cambio

*/
@endphp

@extends('layouts.app')

@section('content') 
@loop
<section class="w-full bg-fondooscuro @if(is_user_logged_in()) pt-48 @else pt-36 @endif pb-24 lg:pb-12 lg:bg-cover bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/Fondo_Negro_1.png');" id="elCambio">
    <div class="w-full h-60 bg-gradient-to-t from-transparent to-black absolute top-0 left-0"></div>
    <img src="<?php bloginfo('template_url') ?>/dist/img/rayas2.svg" alt="rayas" class="absolute w-1/3 lg:w-1/6 top-24 lg:top-12 right-0">
    <div class="container mx-auto lg:px-12">
        <div class="grid grid-cols-12">
            <div class="col-start-2 col-span-10 lg:col-start-2 lg:col-span-3">
                <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5">@php the_title(); @endphp</h1>
                @php the_content(); @endphp
            </div>
        </div>
    </div>
</section>
<section class="w-full pb-48">
    <div class="container  mx-auto lg:px-12">
        <div class="grid grid-cols-12 items-end -mt-12 ">
            <div class="col-start-2 col-span-10 lg:col-start-2 lg:col-span-3">
                @php
                        $rows = get_field('botones');
                        if($rows)
                        {
                            foreach($rows as $row)
                            {
                                $texto_del_boton  =  $row['texto_del_boton'];
                                $enlace_del_boton =  $row['enlace_del_boton'];
                @endphp
                                    <a href="{{$enlace_del_boton}}" class="btn mb-4">{{$texto_del_boton}}</a>
                @php
                            }
                        }
                @endphp
            </div>
            <div class="col-start-2 col-span-10 lg:col-start-6 lg:col-span-6 order-1 lg:order-2 lg:block mb-4 lg:-mt-36">
                <div class="flex items-center justify-center relative cursor-pointer text-beige hover:text-negro transition duration-200" id="imagenVideo">
                    <i class="fa-solid fa-circle-play absolute z-10 text-7xl "></i>
                        <img src="{{get_field('imagen_video')}}" alt="" class="w-full">
                </div>
            </div>

        </div>
    </div>
</section>

            
<!- embed video modal -->
<div class="hidden fixed w-full min-h-full bg-black bg-opacity-50 top-0 left-0 z-50 flex justify-center items-center" id="videoModal">
    <div class="modal-content w-11/12 md:w-3/5 relative">
        <button class="modal-close is-large text-beige text-4xl absolute -top-12 right-0 md:top-0 md:-right-12 hover:text-rosado transition-all ease-in transitio" aria-label="close"><i class="fa-solid fa-circle-xmark"></i></button>
        <div class="aspect-w-16 aspect-h-9 shadow-xl">
            <iframe src="https://player.vimeo.com/video/146022717?color=0c88dd&title=0&byline=0&portrait=0&badge=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>


@endloop

@endsection


@section('footer')

    @include('partials.suscribirse')
    <script>
        $(document).ready(function(){
            $('.modal-close').on('click', function(){
                $('#videoModal').addClass('hidden');
                $('body').removeClass('overflow-hidden');
            });
            $('#imagenVideo').on('click', function(){
                $('#videoModal').removeClass('hidden');
                $('body').addClass('overflow-hidden');
            });
        });
    </script>


    
@endsection  