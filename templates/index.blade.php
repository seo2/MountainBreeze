@extends('layouts.app')

@section('content') 

    @include('partials.hero')
        
    @include('partials.talleres')
        
    @include('partials.sobrehc')

    @include('partials.maestres')



    
@endsection

@section('footer')

    @include('partials.suscribirse')

@endsection