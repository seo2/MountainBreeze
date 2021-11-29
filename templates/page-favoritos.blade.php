@php
/*

Template name: Mis favoritos

*/
@endphp

@extends('layouts.app')

@section('content') 

<section class="w-full bg-beige mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-negro font-festivo6 text-5xl uppercase">Favoritos</h1>
    </div>
</section>

<section class="my-12">
    <div class="container w-full lg:w-3/5 mx-auto min-h-3/4 ">
        @loop
        {{ the_content() }}
        @endloop
    </div>
</section>

@endsection

@section('footer')


@endsection  