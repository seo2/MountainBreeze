@php
    $tallerID = $_GET['taller'];


@endphp

@php
    // get course post type title by id
    $course_title = get_the_title($tallerID);
    // get course permalink by id
    $course_permalink = get_permalink($tallerID);


    // execute [ld_certificate] shortcode
    echo do_shortcode('[ld_certificate course_id="268"]');
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


<div class="w-full h-screen fixed z-50 bg-black bg-opacity-70 woocommerce" id="modalCertificado" style="display:none;">
    <div class="w-full h-screen  flex flex-col justify-center items-center"  id="reviews">
        <div class="w-11/12 md:w-2/5 bg-white min-h-1/2 shadow-2xl relative p-8 ">

@php
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();

@endphp
                <div id="review_form_wrapper" class="lolol">
                    <div id="review_form">
                        <?php
                        $commenter    = wp_get_current_commenter();
                        $comment_form = array(
                            /* translators: %s is product title */
                            'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
                            /* translators: %s is product title */
                            'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
                            'title_reply_before'  => '<span id="reply-title" class="text-negro font-festivo19 text-2xl lg:text-3xl uppercase mb-4 inline-block w-full">',
                            'title_reply_after'   => '</span>',
                            'comment_notes_after' => '',
                            'label_submit'        => esc_html__( 'Submit', 'woocommerce' ),
                            'logged_in_as'        => '',
                            'comment_field'       => '',
                        );
    
                        $name_email_required = (bool) get_option( 'require_name_email', 1 );
                        $fields              = array(
                            'author' => array(
                                'label'    => __( 'Name', 'woocommerce' ),
                                'type'     => 'text',
                                'value'    => $commenter['comment_author'],
                                'required' => $name_email_required,
                            ),
                            'email'  => array(
                                'label'    => __( 'Email', 'woocommerce' ),
                                'type'     => 'email',
                                'value'    => $commenter['comment_author_email'],
                                'required' => $name_email_required,
                            ),
                        );
    
                        $comment_form['fields'] = array();
    
                        foreach ( $fields as $key => $field ) {
                            $field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
                            $field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );
    
                            if ( $field['required'] ) {
                                $field_html .= '&nbsp;<span class="required">*</span>';
                            }
    
                            $field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';
    
                            $comment_form['fields'][ $key ] = $field_html;
                        }
    
                        $account_page_url = wc_get_page_permalink( 'myaccount' );
                        if ( $account_page_url ) {
                            /* translators: %s opening and closing link tags respectively */
                            $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
                        }
    
                        if ( wc_review_ratings_enabled() ) {
                            $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
                                <option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
                                <option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
                                <option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
                                <option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
                                <option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
                                <option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
                            </select></div>';
                        }
    
                        $comment_form['comment_field'] .= '<p class="comment-form-comment my-4"><label for="comment" class="hidden">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" class="appearance-none rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" required placeholder="' . esc_html__( 'Your review', 'woocommerce' ) . '"></textarea></p>';
    
                        comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                        ?>
                    </div>
                </div>
@php
                endwhile;
                wp_reset_query();
@endphp

            <a href="javascript:void(0);" class="absolute -right-8 -top-8 text-white text-3xl hover:text-naranjo transition duration-200" id="cerrarModal"><i class="fal fa-times-circle"></i></a>
        </div>
    </div>
</div>



<section class="w-full bg-beige pt-44 pb-24 lg:bg-cover bg-left-bottom lg:bg-bottom bg-no-repeat " style="background-image: url('<?php bloginfo('template_url') ?>/dist/img/bg_verde_proyecto.png');" id="comoFunciona1">
    <div class="w-11/12 lg:w-1/2 mx-auto text-center relative">
        <h1 class="text-beige font-festivo6 text-5xl lg:text-6xl uppercase mb-5">¡Felicidades!</h1>
        <img src="<?php bloginfo('template_url'); ?>/dist/img/rayas_rosadas.svg" class="block mx-auto w-70 mb-8 md:mb-8">
        <h2 class="text-beige font-festivo19 text-3xl lg:text-4xl uppercase mb-2">@php the_title();@endphp <a href="{{ $course_permalink }}" class="hover:underline">{{ $course_title }}</a></h2>
        <h3 class="text-beige font-festivo8 text-3xl lg:text-4xl uppercase mb-5">Comparte tus aprendizajes y sube tu proyecto</h3>
        <div class="w-11/12 lg:w-full mx-auto grid grid-cols-4 gap-4">
            <a href="javascript:void(0);" id="btn-evalua" class="flex py-3 text-left  bg-rosado border-rosado hover:bg-beige text-negro leading-5 mb-3 col-span-1 justify-center transition duration-200">
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
                <span>Contáctate con<br>tu tallerista</span>
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

        $( 'body' )
		// Star ratings for comments
		.on( 'init', '#rating', function() {
			$( '#rating' )
				.hide()
				.before(
					'<p class="stars">\
						<span>\
							<a class="star-1" href="#">1</a>\
							<a class="star-2" href="#">2</a>\
							<a class="star-3" href="#">3</a>\
							<a class="star-4" href="#">4</a>\
							<a class="star-5" href="#">5</a>\
						</span>\
					</p>'
				);
		} )
		.on( 'click', '#respond p.stars a', function() {
			var $star   	= $( this ),
				$rating 	= $( this ).closest( '#respond' ).find( '#rating' ),
				$container 	= $( this ).closest( '.stars' );

			$rating.val( $star.text() );
			$star.siblings( 'a' ).removeClass( 'active' );
			$star.addClass( 'active' );
			$container.addClass( 'selected' );

			return false;
		} )
		.on( 'click', '#respond #submit', function() {
			var $rating = $( this ).closest( '#respond' ).find( '#rating' ),
				rating  = $rating.val();

			if ( $rating.length > 0 && ! rating && wc_single_product_params.review_rating_required === 'yes' ) {
				window.alert( wc_single_product_params.i18n_required_rating_text );

				return false;
			}
		} );

        // Init Tabs and Star Ratings
        $( '#rating' ).trigger( 'init' );


    }
    
    // on click display modal
    document.getElementById('btn-evalua').addEventListener('click', function() {
        document.getElementById('modalCertificado').classList.add('block');
    });
    // on click close modal
    document.getElementById('cerrarModal').addEventListener('click', function() {
        document.getElementById('modalCertificado').classList.remove('block');
    });
    

</script>