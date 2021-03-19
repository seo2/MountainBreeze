$( document ).ready(function() {
    $('#hero-carousel').owlCarousel({
        items: 1,
        dots: true
    });
    
    $('#talleristas').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        navText:['<div class="col-span-1 text-4xl hidden md:block"><span class="h-16 w-16 leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full"><i class="fal fa-chevron-left -ml-1"></i></span></div>','<div class="col-span-1 text-4xl hidden md:block"><span class="h-16 w-16 leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full float-right"><i class="fal fa-chevron-right -mr-1"></i></span></div>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
});


