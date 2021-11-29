 
<div class="pt-16 pb-32 bg-blanco" id="talleristas">
    <div class="container mx-auto lg:px-12 lg:px-12 mb-8">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-1 col-span-12 text-center">
                <h2 class="font-festivo6 text-4xl lg:text-6xl text-naranjo">
                    Talleristas
                    {{-- <span class="font-festivo8 block lg:inline-block">Grandes</span> maestres --}}
                </h2>
                <img src="<?php bloginfo('template_url') ?>/dist/img/x_x_x_x.svg" alt="x_x" class="mx-auto my-3 lg:my-1 w-1/3 lg:w-auto">
            </div>
        </div>
    </div>
    <div class="container mx-auto lg:px-12">
        <div class="grid grid-cols-12">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="owl-carousel w-full" id="talleristasCarousel">
                    @php
                        $args = array(
                            'post_type' => 'tallerista'
                        );
                        $talleristas = new WP_Query( $args );
                        global $post_id;

                        if ( $talleristas->have_posts() ) {
                            while ( $talleristas->have_posts() ) {
                                $talleristas->the_post();                  
                    @endphp 
                    <div class="w-full">
                        <a href="@php the_permalink(); @endphp" class="relative block cursor-pointer">
                            @php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft w-full' ) ); @endphp 
                        </a>
                        <div class="relative mt-3">
                            <a href="@php the_permalink(); @endphp" class="text-negro block text-xl lg:text-2xl font-bold lg:font-festivo6 leading-none mt-3 hover:text-naranjo">@php the_title(); @endphp</a>
                            <a href="https://instagram.com/@php echo get_field('instagram'); @endphp" target="_blank" class="text-naranjo text-sm uppercase hover:underline"><span>@</span>@php echo get_field('instagram'); @endphp</a>
                        </div>
                    </div>
                    @php
                            }
                        }
                        wp_reset_postdata();                        
                    @endphp 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden">

    <span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full"><svg class="svg-inline--fa fa-chevron-left fa-w-8 -ml-1" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path></svg><!-- <i class="fal fa-chevron-left -ml-1"></i> Font Awesome fontawesome.com --></span>
    <span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full float-right"><svg class="svg-inline--fa fa-chevron-right fa-w-8 -mr-1" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg><!-- <i class="fal fa-chevron-right -mr-1"></i> Font Awesome fontawesome.com --></span>
</div>