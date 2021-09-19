$( document ).ready(function() {
    $('#hero-carousel').owlCarousel({
        items: 1,
        dots: true
    });
    
    $('#talleristasCarousel').owlCarousel({
        loop:true,
		margin:10,
		nav:true,
		dots: true,
		autoplay: true,
        navText:['<div class="col-span-1 text-lg lg:text-4xl hidden md:block"><span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full"><i class="fal fa-chevron-left -ml-1"></i></span></div>','<div class="col-span-1 text-lg lg:text-4xl hidden md:block"><span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full float-right"><i class="fal fa-chevron-right -mr-1"></i></span></div>'],
        responsive:{
            0:{
                items:1,
				dots: true
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


// Small plugin to convert tab like designs to dropdown on small screen.
                                                                                  


// Small plugin to convert tab like designs to dropdown on small screen.
                                                                                  

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