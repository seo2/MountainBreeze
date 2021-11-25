
@php
/*

Template name: Terminar Proyecto

*/
@endphp

@extends('layouts.app')

@section('content') 
@php
    $tallerID = $_GET['taller'];
    $course_title = get_the_title($tallerID);
    // redirect if not logged in
    if(!is_user_logged_in()){
        wp_redirect( home_url() .'/mi-cuenta' );
        exit;
    }


    //function to generate response
    function my_contact_form_generate_response($type, $message){
        if($type == "success"){
            $response = "<span class='text-verde'>{$message}</span>";
        } else {
            $response = "<span class='text-naranjo'>{$message}</span>";
        }
        return $response;
    }

    //response messages
    $missing_content = "Por favor completa todos los campos del formulario.";
    $email_invalid   = "La dirección de correo es invalida.";
    $message_unsent  = "El mensaje no se ha podido enviar, por favor prueba nuevamente.";
    $message_sent    = "¡Gracias! Tu mensaje ha sido enviado.";
    $missing_horario    = "Por favor seleccione un horario.";

    //user posted variables
    $name            = $_POST['message_name'];
    $email           = $_POST['message_email'];
    $message         = $_POST['message_text'];
    $horario         = $_POST['message_horario'];

    //php mailer variables
    $to         = get_option('admin_email');
    $subject    = "Agendar una reunión. Taller ".$course_title;
    $headers    = array('Content-Type: text/html; charset=UTF-8','From: Herencia Colectiva <hola@herenciacolectiva.com>','Reply-To: '.$name .' <'. $email .'>');

    //validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $response = my_contact_form_generate_response("error", $email_invalid);
    }else{
        //validate presence of name and message
        if(empty($name) || empty($message)){
            $response = my_contact_form_generate_response("error", $missing_content);
        }else{
            if(!empty($horario)){
            $response = my_contact_form_generate_response("error", $missing_horario);
            }else{
                $sent = wp_mail($to, $subject, strip_tags($message), $headers);
                if($sent){
                    $response = my_contact_form_generate_response("success", $message_sent);
                }else{
                    $response = my_contact_form_generate_response("error", $message_unsent);
                }  
            }
        }
    }





@endphp
@loop

@include('partials.terminar-menu')

<section class="w-full lg:pt-12 pb-12 lg:pb-24 bg-beige relative overflow-hidden">
    <div class="container lg:px-32">
        <div class="w-11/12 mx-auto text-center mb-8">
            <h4 class="text-negro text-2xl font-festivo19">Agenda una reunión con tu tallerista</h4>
            <h3 class="mt-4 font-bold">{!! $response !!}</h3>
        </div>
        <form class="w-11/12 md:w-2/3 lg:w-1/2 mx-auto" action="<?php the_permalink(); ?>?taller=<?php echo $tallerID; ?>" method="post">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-full md:w-1/2">
                    <div class="relative">
                    <input type="text" id="name" name="message_name" placeholder="Nombre y apellido" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" value="<?php echo esc_attr($_POST['message_name']); ?>">
                    </div>
                </div>
                <div class="p-2 w-full md:w-1/2"">
                    <div class="relative">
                        <input type="email" id="email" name="message_email" placeholder="Email" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" value="<?php echo esc_attr($_POST['message_email']); ?>">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <select class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="message_horario">
                            <option value="" >Agendar una reunión*</option>
                            <?php
                                $args = array(
                                    'post_type' => 'sfwd-courses',
                                    'posts_per_page' => -1,
                                    'p'  => $tallerID, );
                                $loop = new WP_Query($args);
                                while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <?php if( get_field('horario') ): ?>
                                <?php while( the_repeater_field('horario') ): ?>
                                <option value="<?php the_sub_field('dia__hora'); ?>"> <?php the_sub_field('dia__hora'); ?></option>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php
                                endwhile;
                                wp_reset_query();
                            ?>
                        </select>
                        <span class="absolute right-0 top-0 h-full w-10 text-center text-negro pointer-events-none flex items-center justify-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                    <textarea id="message" name="message_text"  placeholder="Mensaje"  class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm h-32" ><?php echo esc_attr($_POST['message_text']); ?></textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button class="h-12 px-24 block mx-auto leading-12 text-center border border-naranjo bg-naranjo border-solid text-beige hover:bg-negro hover:border-negro transition duration-200 uppercase">Enviar</button>
                </div>
            </div>
      </form>
    </div>
  </section>


@endloop

@endsection

@section('footer')


@endsection  

@section('under-footer')

@endsection 