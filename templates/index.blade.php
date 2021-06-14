@extends('layouts.app')

@section('content') 


<section class="my-48">
    <div class="flex container mx-auto justify-between flex-row lg:px-32">
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