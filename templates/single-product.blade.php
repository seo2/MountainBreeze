@php
/*

Template name: Curso

*/
@endphp

@extends('layouts.app')

@section('content') 

@include('partials.nav-curso')

@loop
<section class="w-full pt-12 pb-12 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/plantarda.jpg');">
    <div class="flex container flex-col md:flex-row max-w-screen-xl mx-auto lg:items-center justify-left md:px-6 lg:px-12">
        <div class="w-2/3">
            <a href="" class="text-naranjo uppercase"><i class="fak fa-back mr-4"></i> Volver</a>
            <h1 class="text-beige text-2xl lg:text-4xl mb-5">{{ the_title() }}</h1>
        </div>
        <div class="w-1/3">
            Producto
        </div>
    </div>
</section>

<section class="mt-12">
    <div class="flex container max-w-screen-xl mx-auto justify-between flex-row lg:px-32 gap-12">
        <div class="w-2/3">
            {{ the_content() }}
            {{-- @php wc_get_template_part( 'content', 'single-product' ); @endphp --}}
        </div>
        <div class="w-1/3">
            @php dynamic_sidebar( 'sidebar-1' ); @endphp
        </div>
    </div>
</section>
@endloop


@endsection

@section('footer')

<script>
    (function( $ ) {
        $.fn.tabConvert = function(options) {
        
            var settings = $.extend({
                activeClass: "active",
                screenSize: 767,
            }, options );
    
            return this.each(function(i) {
                var wrap = $(this).wrap('<div class="tab-to-dropdown"></div>'),
                        currentItem = $(this),
                        container = $(this).closest('.tab-to-dropdown'),
                        value = $(this).find('.'+settings.activeClass).text(),
                        toggler = '<div class="selected-tab">'+ value +'</div>';
                currentItem.addClass('converted-tab');
                container.prepend(toggler);
                
                // function to slide dropdown
                function tabConvert_toggle(){
                    currentItem.parent().find('.converted-tab').slideToggle();
                }
    
                container.find('.selected-tab').click(function(){
                    tabConvert_toggle();
                });
                
                currentItem.find('a').click(function(e){
                    var windowWidth = window.innerWidth;
                    if( settings.screenSize >= windowWidth){
                        tabConvert_toggle();
                        var selected_text = $(this).text();
                        $(this).closest('.tab-to-dropdown').find('.selected-tab').text(selected_text);
                    }
                });
                
                //Remove toggle if screen size is bigger than defined screen size
                function resize_function(){
                    var windowWidth = window.innerWidth;
                    if( settings.screenSize >= windowWidth){
                        currentItem.css('display','none');
                        currentItem.parent().find('.selected-tab').css('display','');
                        currentItem.removeClass('flex');
                    }else{
                        currentItem.css('display','');
                        currentItem.parent().find('.selected-tab').css('display','none');
                        currentItem.addClass('flex');
                    }
                }
    
                console.log(currentItem);
    
                resize_function();
                
                $(window).resize(function(){
                    resize_function();
                });
                
            });
        };
    
        // 	Toggle will appear on default screen size 767px
        // $('.tabs').tabConvert({
        //     activeClass: "selected",
        // });
      
    // 	Toggle will appear on size 991px
      $('.wc-tabs').tabConvert({
        activeClass: "active",
            screenSize: 767,
      });
    
    }( jQuery ));
    </script>


@endsection  