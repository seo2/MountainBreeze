@extends('layouts.app')

@section('content') 


<section class="my-48">
    <div class="flex container flex-row max-w-screen-xl px-4 mx-auto lg:items-center justify-left md:px-6 lg:px-12">
        <div class="w-full">
            @loop
            <h1 class="font-festivo6 text-5xl mb-4">{{ the_title() }}<h1>
            {{ the_content() }}
            @endloop
        </div>
    </div>
</section>

 
@endsection

@section('footer')
    @if(!is_page('cart'))
        @include('partials.suscribirse')
    @endif
@endsection