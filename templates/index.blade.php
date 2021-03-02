@extends('layouts.app')

@section('content') 


<section class="mt-48">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32">
        <div class="w-100">
            @loop
            {{ the_content() }}
            @endloop
        </div>
    </div>
</section>

 
@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection