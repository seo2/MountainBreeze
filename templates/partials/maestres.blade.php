 
<div class="pt-16 pb-32 bg-blanco" >
    <div class="container mx-auto mb-8">
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
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10 lg:mb-8">
                <div class="owl-carousel w-full" id="talleristas">
                    @php
                        $args = array(
                            'post_type' => 'tallerista'
                        );
                        $talleristas = new WP_Query( $args );

                        if ( $talleristas->have_posts() ) {
                            while ( $talleristas->have_posts() ) {
                                $talleristas->the_post();                  
                    @endphp 
                    <div class="w-full mb-8">
                        <div class="relative">
                            @php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) ); @endphp 
                        </div>
                        <div class="relative mt-3">
                            <h4 class="text-negro text-xl lg:text-2xl font-bold lg:font-festivo6 leading-none mt-3 mb-1">@php the_title(); @endphp</h4>
                            <a href="https://instagram.com/@php echo get_field('instagram'); @endphp" target="_blank" class="text-naranjo text-sm uppercase"><span>@</span>@php echo get_field('instagram'); @endphp</a>
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
    {{-- <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 h-16 lg:h-24">
            <div class="col-start-5 col-span-1 mb-8 text-4xl hidden md:block">
                <span class="h-16 w-16 leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full">
                    <i class="fal fa-chevron-left -ml-1"></i>
                </span>
            </div>
            <div class="col-span-12 lg:col-span-2 lg:mb-8 text-4xl text-center">
                <span class="w-3 h-3 rounded-md inline-block bg-naranjo hover:bg-gris5 transition duration-200 mx-2"></span>
                <span class="w-3 h-3 rounded-md inline-block bg-naranjo hover:bg-gris5 transition duration-200 mx-2"></span>
                <span class="w-3 h-3 rounded-md inline-block bg-naranjo hover:bg-gris5 transition duration-200 mx-2"></span>
                <span class="w-3 h-3 rounded-md inline-block bg-naranjo hover:bg-gris5 transition duration-200 mx-2"></span>
            </div>
            <div class="col-span-1 mb-8 text-4xl hidden md:block">
                <span class="h-16 w-16 leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full float-right"><i class="fal fa-chevron-right -mr-1"></i></span>
            </div>
        </div>
    </div> --}}

</div>