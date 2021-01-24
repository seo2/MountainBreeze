@extends('layouts.app')

@section('content') 

    @include('partials.hero')
        
    @include('partials.talleres')
    
    @if(is_user_logged_in())
        @include('partials.promocion')
    @else
        @include('partials.sobrehc')
    @endif
    
    @include('partials.maestres')
 
@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection