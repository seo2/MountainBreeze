@extends('layouts.app')

@section('content') 


<section class="mt-48">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32">
        <div class="w-100">
            @include('partials.the_loop')
        </div>
    </div>
</section>

 
@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection