@php
/*

Template Name: Editar Proyecto

*/
@endphp

@extends('layouts.app')

@section('content') 
@php
    // redirect if not logged in
    if(!is_user_logged_in()){
        wp_redirect( home_url() .'/mi-cuenta' );
        exit;
    }
    $mensaje        = "";
    $proyectoID       = $_GET['proyecto'];

    $args = array(
        'post_type' => 'proyectos',
        'author' => get_current_user_id(),
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post__in' => array($proyectoID)
    );
    $proyectos = new WP_Query($args); 
    if ( $proyectos->have_posts() ) { 
        while ( $proyectos->have_posts() ) {
            $proyectos->the_post();    
            $url            = get_the_post_thumbnail_url( $featured_post->ID );
            $tallerID       = get_field('taller');
            $postID         = get_the_ID();
            $project_title  = get_the_title();
            $post_content   = get_the_content();
        }
    }
    $course_title       = get_the_title($tallerID);
    $imagen_banner_taller = $url;
if($postID){

    if(isset($_POST['ispost']))
    {
        global $current_user, $wpdb;

        get_currentuserinfo();
        $mensaje        = "";
        $user_login     = $current_user->user_login;
        $user_email     = $current_user->user_email;
        $user_firstname = $current_user->user_firstname;
        $user_lastname  = $current_user->user_lastname;
        $user_id        = $current_user->ID;

        $project_title     = $_POST['title'];
        $sample_image   = $_FILES['sample_image']['name'];
        $post_content   = $_POST['sample_content'];
        
        $post_type = "proyectos";

        // update wordpress post
        $post_id = $wpdb->get_var( $query );
        $post = array(
            'ID'           => $proyectoID,
            'post_title'   => $project_title,
            'post_content' => $post_content
        );
        wp_update_post( $post );

        if ($_FILES){

            $attach_id = media_handle_upload( 'sample_image', $proyectoID );

        }else{
            // font awesome alert icon
            $mensaje = "<span class='text-naranjo text-lg'><i class='fas fa-exclamation-triangle'></i> Por favor, selecciona un archivo de imagen.</span>";
        }
    }
}else{
    wp_redirect( home_url() .'/no-existe' );
    exit;
}
    

$volver = '/mis-proyectos/';

@endphp
@loop

<section class="w-full flex py-4 md:py-6 mt-32 md:h-48 bg-cover bg-left-bottom lg:bg-center bg-fixed bg-no-repeat bg-rosado relative" >

    <div class="container flex flex-col md:flex-row h-100 max-w-screen-xl mx-auto justify-between px-6 lg:px-32 relative z-10">
        <div class="relative w-full mb-4 md:mb-0">
            <a href="@php echo $volver; @endphp" class="text-negro uppercase relative top-2 hover:text-naranjo transition duration-200 block"><i class="fak fa-back mr-4"></i> Volver</a>
            <h2 class="text-negro font-festivo6 text-2xl uppercase mt-4">Editar proyecto</h2>
            <h1 class="text-negro font-festivo6 text-5xl uppercase">{{$project_title}}</h1>
            <h4 class="text-negro text-2xl font-festivo19">Taller {{$course_title}}</h4>
            <h3 class="font-bold">{!! $mensaje !!}</h3>
        </div> 
    </div>
</section>


<section class="w-full pt-4 pb-12 lg:pb-24 bg-beige relative overflow-hidden">
    <div class="container lg:px-32">

        <form class="w-11/12 md:w-2/3 lg:w-1/2 mx-auto" action="@php bloginfo('url'); @endphp/editar-proyecto?proyecto=@php echo $proyectoID; @endphp" method="post"  enctype="multipart/form-data">
            <input type="hidden" name="ispost" value="1" />
            <input type="hidden" name="userid" value="<?php echo $user_id; ?>" />
            
            <div class="w-full my-4 px-24 pb-6">
                <img src="<?php echo $url; ?>" alt="<?php echo $project_title; ?>" class="w-full shadow-xl">
            </div>

            <div class="w-full my-4">
                <label class="control-label">Cambiar foto de portada</label>
                <input type="file" multiple name="sample_image" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
            </div>
            
            <div class="w-full">
                <input type="text" placeholder="Título de tu Proyecto..." value="{{$project_title}}" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="title" />
            </div>
    
            <div class="w-full">
                <textarea placeholder="Escribe sobre tu proyecto..." name="sample_content">{{$post_content}}</textarea>
            </div>
    
            <div class="w-full my-4">
                <input type="submit" class="h-12 px-24 block mx-auto leading-12 text-center border border-naranjo bg-naranjo border-solid text-beige hover:bg-negro hover:border-negro transition duration-200 uppercase" value="Actualizar Proyecto" name="submitpost" />
            </div>
        </form>

    </div>
</section>

@endloop

@endsection

@section('footer')

{{-- <script>
    function returnformValidations()
    {
        var title = document.getElementById("title").value;
        var content = document.getElementById("content").value;
        var category = document.getElementById("category").value;
    
        if(title=="")
        {
            alert("Please enter post title!");
            return false;
        }
        if(content=="")
        {
            alert("Please enter post content!");
            return false;
        }
        if(category=="")
        {
            alert("Please choose post category!");
            return false;
        }
    }
    
    </script> --}}
    
    
    <script src="https://cdn.tiny.cloud/1/mk0fu9zzsfp89kxopyusgvdrxvhqaym0p8rccxh3zdofvviq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: 'textarea',
            statusbar: false,
            language: 'es_MX',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
            content_style: "body { font-family:'Apercu Pro', 'sans-serif'; font-size:14px }"
        });
      </script>
@endsection  