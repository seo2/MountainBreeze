@php
    $tallerID = $_GET['taller'];


@endphp

@php
    // get course post type title by id
    $course_title = get_the_title($tallerID);
    // get course permalink by id
    $course_permalink = get_permalink($tallerID);

    // loop through all woocommerce products where _related_course LIKE $tallerID
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_related_course',
                'value' => $tallerID,
                'compare' => 'LIKE'
            )
        )
    );
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
        $producto = get_the_ID();
    endwhile;
    wp_reset_query();
@endphp

<section class="w-full bg-beige pt-44 pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_verde_proyecto.png');" id="comoFunciona1">
    <div class="w-11/12 lg:w-1/2 mx-auto text-center relative">
        <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5">¡Felicidades!</h1>
        <img src="<?php bloginfo('template_url'); ?>/dist/img/rayas_rosadas.svg" class="block mx-auto w-70 mb-8 md:mb-8">
        <h2 class="text-beige font-festivo19 text-3xl lg:text-4xl uppercase mb-2">HAZ FINALIZADO EL TALLER <a href="{{ $course_permalink }}" class="underline hover:no-underline">{{ $course_title }}</a></h2>
        <h3 class="text-beige font-festivo8 text-3xl lg:text-4xl uppercase mb-5">Comparte tus aprendizajes y sube tu proyecto</h3>
        <div class="w-11/12 lg:w-full mx-auto grid grid-cols-4 gap-4 ">
            <a href="{{ bloginfo('url') }}/evaluar-taller/?taller={{ $tallerID }}" id="btn-evalua" class="flex py-3 text-left  @if( is_page('evaluar-taller')) bg-beige border-beige @else bg-rosado border-rosado @endif  hover:bg-beige text-negro leading-5 mb-3 col-span-1 justify-center transition duration-200">
                <i class="fas fa-star-half-alt mr-4 self-center text-lg"></i> 
                <span>Evalúa<br>tu experiencia</span>
            </a>
            @php
                echo do_shortcode('[ld_certificate course_id="'.$tallerID.'" label="<span>Descargar<br>Certificado</span>" class="flex py-3 text-left  bg-rosado border-rosado hover:bg-beige text-negro leading-5 mb-3 col-span-1 justify-center transition duration-200 certificado"]');
            @endphp
            <a href="{{ bloginfo('url') }}/subir-proyecto/?taller={{ $tallerID }}" class="flex py-3 text-left @if( is_page('subir-proyecto')) bg-beige border-beige @else bg-rosado border-rosado @endif hover:bg-beige text-negro leading-5 mb-3 col-span-1 justify-center transition duration-200">
                <i class="fas fa-folder-upload mr-4 self-center text-lg"></i> 
                <span>Subir<br>Proyecto</span>
            </a>
            <a href="{{ bloginfo('url') }}/haz-finalizado-el-taller/?taller={{ $tallerID }}" class="flex py-3 text-left @if( is_page('haz-finalizado-el-taller')) bg-beige border-beige @else bg-rosado border-rosado @endif hover:bg-beige text-negro leading-5 mb-3 col-span-1 justify-center transition duration-200">
                <i class="fas fa-chalkboard-teacher mr-4 self-center text-lg"></i> 
                <span>Agenda reunión<br>con tu tallerista</span>
            </a>
        </div> 

    </div>
</section>

<script>
    // change a target to blank by class after page loads
    window.onload = function() {
        var links = document.getElementsByClassName('certificado');
        for (var i = 0; i < links.length; i++) {
            links[i].setAttribute('target', '_blank');
            links[i].innerHTML = '<div class="w-full h-full flex justify-center items-center"><i class="fas fa-file-certificate mr-4 self-center text-lg"></i><span>Descargar<br>Certificado</span></div>';
        }
    }
</script>