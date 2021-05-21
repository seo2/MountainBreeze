@extends('layouts.app')

@section('content') 


<?php 
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); 
?>
<section class="w-full flex mt-32 pt-6 pb-6 h-48 bg-azul  ">
    <div class="container flex flex-row h-100 max-w-screen-xl mx-auto justify-between lg:px-32">
        <div class="relative w-2/3">
            <a href="/mis-talleres/" class="text-blanco uppercase relative top-0 hover:text-beige transition duration-200"><i class="fak fa-back mr-4"></i> Volver</a>
            <h1 class="text-beige font-festivo6 text-2xl lg:text-4xl absolute bottom-0">{{ the_title() }}</h1>
        </div> 
        <div class="w-1/3 flex justify-center content-center items-center">
            @php
                $permalink  = get_permalink( get_field('tallerista'));
                $title      = get_the_title( get_field('tallerista') );
                $url        = get_the_post_thumbnail_url( get_field('tallerista')  );
                $instagram  = get_field( 'instagram', get_field('tallerista') );
            @endphp
            <div class="rounded-full h-20 w-20 flex items-center justify-center bg-naranjo border border-negro mr-4 bg-cover" style="background-image: url('<?php echo $url; ?>">

            </div>
            <div>
                <a href="@php echo $permalink; @endphp" class="text-beige uppercase text-xle hover:underline">@php echo $title; @endphp</p>
                <a href="https://instagram.com/@php echo $instagram; @endphp" class="text-beige hover:underline">@php echo '@'.$instagram; @endphp</a>
            </div>
        </div>
    </div>
</section>

<section class="mt-12 mb-48">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32">
        <div class="w-full">
 
        <?php
                the_content();
        ?>
        </div>
    </div>
</section>
<?php 
        } // end while
    } // end if
?>

 
@endsection

@section('footer')
    @if(!is_page('cart'))
        @include('partials.suscribirse')
    @endif
@endsection