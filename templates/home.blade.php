@extends('layouts.app')

@section('content') 

    @include('partials.hero')

    @include('partials.talleres')
    
    @if(is_user_logged_in())
        {{-- @include('partials.promocion') --}}
        @include('partials.sobrehc')
    @else
        @include('partials.sobrehc')
    @endif
    
    @include('partials.maestres')
 <?php //echo do_shortcode('[twb_wc_reviews product_id="" number="" exclude="" exclude_product=""]'); ?>
 <?php //echo do_shortcode('[product_reviews id="274"]'); ?>
@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection