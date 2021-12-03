@php
/*

Template Name: Subir proyectos 2

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
    $tallerID       = $_GET['taller'];
    $course_title   = get_the_title($tallerID);


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

    $post_title     = $_POST['title'];
    $sample_image   = $_FILES['sample_image']['name'];
    $post_content   = $_POST['sample_content'];
    
    $post_type = "proyectos";

    // check if $_FILES['sample_image'] is empty
    if(!empty($sample_image))
    {

        $query = $wpdb->prepare(
            'SELECT ID FROM ' . $wpdb->posts . '
            WHERE post_title = %s
            AND post_type = \'proyectos\'',
            $post_title
        );
        $wpdb->query( $query );

        if ( $wpdb->num_rows ) {
            $mensaje = "<span class='text-naranjo text-lg'><i class='fas fa-exclamation-triangle'></i> El proyecto ya existe</span>";
        }else {
            $new_post = array(
                'post_title'    => $post_title,
                'post_content'  => $post_content,
                'post_status'   => 'publish',
                'post_name'     => $post_title,
                'post_type'     => $post_type
            );

            $pid = wp_insert_post($new_post);
            add_post_meta($pid, 'meta_key', true);

            if (!function_exists('wp_generate_attachment_metadata'))
            {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                require_once(ABSPATH . "wp-admin" . '/includes/media.php');
            }

            $attach_id = media_handle_upload( 'sample_image', $pid );
            if ($attach_id > 0)
            {
                update_post_meta($pid, '_thumbnail_id', $attach_id);
            }

            $files = $_FILES["image_gallery"];  
            foreach ($files['name'] as $key => $value) {  
                if ($files['name'][$key]) { 
                    $file = array( 
                        'name'      => $files['name'][$key],
                        'type'      => $files['type'][$key], 
                        'tmp_name'  => $files['tmp_name'][$key], 
                        'error'     => $files['error'][$key],
                        'size'      => $files['size'][$key]
                    ); 
                    $_FILES = array ("image_gallery" => $file); 
                    foreach ($_FILES as $file => $array) {              
                        $newupload = my_handle_attachment($file,$pid); 
                    }
                } 
            } 

            $taller = update_field( 'taller', $tallerID, $pid );
            $mensaje .= "Tu proyecto se ha subido correctamente";
            $link = get_permalink($pid);
            wp_redirect( $link.'?mensaje='.$mensaje );

        }
	}else{
        // font awesome alert icon
        $mensaje = "<span class='text-naranjo text-lg'><i class='fas fa-exclamation-triangle'></i> Por favor, selecciona un archivo de imagen.</span>";
    }
}

@endphp
@loop


@include('partials.terminar-menu')

<section class="w-full lg:pt-12 pb-12 lg:pb-24 bg-beige relative overflow-hidden">
    <div class="container lg:px-32">
        <div class="w-11/12 mx-auto text-center mb-8">
            <h4 class="text-negro text-2xl font-festivo19">Subir proyecto a {{$course_title}}</h4>
            <h3 class="mt-4 font-bold">{!! $mensaje !!}</h3>
        </div>

        <form class="w-11/12 md:w-2/3 lg:w-1/2 mx-auto" action="<?php the_permalink(); ?>?taller=<?php echo $tallerID; ?>" method="post"  enctype="multipart/form-data">
            <input type="hidden" name="ispost" value="1" />
            <input type="hidden" name="userid" value="<?php echo $user_id; ?>" />
            <div class="w-full">
                <input type="text" placeholder="Título de tu Proyecto..." class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="title" />
            </div>
    
            <div class="w-full">
                <textarea placeholder="Escribe sobre tu proyecto..." name="sample_content"></textarea>
            </div>
            
            <div class="w-full my-4">
                <label class="control-label">Adjunta una foto de portada</label>
                <input type="file" name="sample_image" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
            </div>
                
            <div class="w-full my-4">
                <label class="control-label">Adjunta Galería de fotos</label>
                <input type="file" multiple name="image_gallery[]" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
            </div>

            <div class="w-full grid grid-cols-2 gap-4">
                <input type="submit" class="h-12 grid-span-1 w-full block mx-auto leading-12 text-center border border-gris bg-gris border-solid text-beige hover:bg-negro hover:border-negro transition duration-200 uppercase" value="Guardar Borrador" name="submitpost2" />
                <input type="submit" class="h-12 grid-span-1 w-full block mx-auto leading-12 text-center border border-naranjo bg-naranjo border-solid text-beige hover:bg-negro hover:border-negro transition duration-200 uppercase" value="Subir Proyecto" name="submitpost" />
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