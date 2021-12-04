@php
/*

Template name: Mis Proyectos

*/

// delete post type proyecto by id
// get post id
if (isset($_GET['proyecto'])) {
    $proyecto = $_GET['proyecto'];
    // get post name by id
    $proyecto_name = get_post_field('post_name', $proyecto);
    $seborra = wp_delete_post($proyecto);
    if($seborra){
        $mensaje = 'Proyecto <span class="italic">'.$proyecto_name.'</span> eliminado correctamente';
    }else{
        $mensaje = 'No se pudo eliminar el proyecto'. $proyecto_name;
    }
}

@endphp

@extends('layouts.app')

@section('content') 

<section class="w-full bg-beige mt-8 pt-36 pb-8 lg:pb-8 lg:bg-contain bg-left-top lg:bg-bottom bg-no-repeat " >
    <div class=" w-5/6  lg:w-1/2 mx-auto lg:text-center relative">
        <h1 class="text-negro font-festivo6 text-3xl md:text-5xl uppercase">Mis Proyectos</h1>
        <h2 class="text-naranjo text-xl md:text-2xl">{!! $mensaje !!}</h2>
    </div>
</section>

<section class="mt-12 mb-12">
    <div class="container w-full mx-auto min-h-3/4 lg:px-40">

        <?php
            // wordpress loop for proyectos post type where user is author
            $args = array(
                'post_type' => 'proyectos',
                'author' => get_current_user_id(),
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'any'
            );
            $proyectos = new WP_Query($args); 
            if ( $proyectos->have_posts() ) { 
                while ( $proyectos->have_posts() ) {
                    $proyectos->the_post();    
                    $url            = get_the_post_thumbnail_url( $featured_post->ID );
                    $tallerID       = get_field('taller');
                    $course_title   = get_the_title($tallerID);
                    $url2           = get_the_permalink( $tallerID );
                    $postID         = get_the_ID();
                    $post_status    = get_post_status($postID);
        ?>
        
            <div class="flex flex-col md:flex-row relative border-b border-gris7 py-4 px-4 my-4 hover:bg-beige transition duration-200">
                <div class="w-3/12 md:w-1/12 flex-none mb-2">
                    <a href="<?php the_permalink(); ?>" class="relative">
                        
                        @if($post_status == 'draft')
                            <span class="absolute -top-2 -left-2 bg-azul text-white p-2 z-10 text-xs ">Borrador</span>
                        @endif
    					<?php echo get_the_post_thumbnail( $postID, 'thumbnail', array( 'class' => 'w-full' ) ); ?>
                    </a>
                </div>
                <div class="flex-grow flex-col flex md:px-8">
                    <h1 class="text-lg font-bold flex-grow "><a href="<?php the_permalink(); ?>" class="text-negro hover:underline transition duration-200">@php the_title(); @endphp</a></h1>
                    <h2 class=""><a href="<?php echo $url2; ?>" class="text-naranjo hover:underline transition duration-200"><i class="fas fa-users-class"></i> @php echo $course_title; @endphp</a></h2>
                </div>
                <div class="flex flex-none md:justify-end">
                    <p class="self-end text-negro text-sm">@php echo get_the_date(); @endphp <i class="fas fa-calendar-alt"></i></p>
                </div>
                <div class="absolute top-4 right-4">
                    <a href="@php bloginfo('url'); @endphp/editar-proyecto?proyecto=@php echo $postID; @endphp" class="text-beige text-sm z-50 bg-verde hover:bg-negro hover:text-beige px-3 py-2 transition duration-200">Editar <i class="fas fa-edit"></i></a>
                    <a href="@php bloginfo('url'); @endphp/mis-proyectos?proyecto=@php echo $postID; @endphp" class="text-negro text-sm z-50 bg-rosado hover:bg-negro hover:text-beige px-3 py-2 transition duration-200 btn-eliminar">Eliminar <i class="fas fa-trash-alt"></i></a>
                </div>
            </div>

       <?php
                }
            }else{
        ?>

<div class="flex flex-wrap justify-between">
    <div class="w-full">
        <div class="mb-8">
            <div class="flex flex-wrap justify-between">
                <div class="w-full text-center h-64">
                    <h2 class="text-2xl font-festivo6  text-negro">Aún no subes ningún proyecto a Herencia Colectiva</h2>
                    <p class="text-negro">Acá se mostrarán todos los proyectos que subas en los talleres terminados.</p>
                </div>
            </div>
        </div>
    </div>
</div>   
        <?php
            }
        ?>

    </div>
</section>

<!-- modal eliminar proyecto -->
<div class="fixed top-0 left-0 z-50 bg-black bg-opacity-50 w-full h-full flex flex-row hidden transition duration-200" id="modal-eliminar">
    <div class="modal-content mx-auto self-center bg-beige p-8 shadow-xl">
        <div class="modal-box">
            <div class="flex flex-wrap justify-between">
                <div class="w-full">
                    <div class="">
                        <div class="flex flex-wrap justify-between">
                            <div class="w-full text-center">
                                <h2 class="text-2xl font-festivo6 text-lg mb-8">¿Realmente deseas eliminar este proyecto?</h2>
                                <!-- button confirm delete proyecto -->

                                <form action="" method="POST">
                                    <input type="hidden" name="proyecto" id="proyecto" value="">
                                    <button type="submit" class="text-beige text-lg z-50 bg-red-500 hover:bg-negro hover:text-beige px-3 py-2 transition duration-200 mx-2">Eliminar</button>
                                    <!-- button cancel delete proyecto -->
                                    <button type="button" class="text-beige text-lg z-50 bg-azul hover:bg-negro hover:text-beige px-3 py-2 transition duration-200  mx-2 btn-cancelar-eliminar-proyecto">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script>
    // on click btn-eliminar open confirm modal
    $('.btn-eliminar').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $('form').attr('action', url);
        $('#modal-eliminar').removeClass('hidden');     
    });
    // on click btn-cancelar-eliminar-proyecto close confirm modal
    $('.btn-cancelar-eliminar-proyecto').click(function(e){
        e.preventDefault();
        $('#modal-eliminar').addClass('hidden');
    });
</script>

@endsection  