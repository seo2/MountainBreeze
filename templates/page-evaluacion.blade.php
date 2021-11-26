
@php
/*

Template name: Evaluar Taller

*/
@endphp

@extends('layouts.app')

@section('content') 
@php
$tallerID = $_GET['taller'];
    $course_title = get_the_title($tallerID);
$eval     = $_GET['eval'];
    // redirect if not logged in
    if(!is_user_logged_in()){
        wp_redirect( home_url() .'/mi-cuenta' );
        exit;
    }

@endphp

@include('partials.terminar-menu')

<section class="w-full lg:pt-12 pb-12 lg:pb-24 bg-beige relative overflow-hidden woocommerce" >
    <div class="container lg:px-32"  id="reviews">

        <div class="w-11/12  md:w-2/3 lg:w-1/2  mx-auto">

            @php

                // loop through all woocommerce products where _related_course LIKE $tallerID
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 1,
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
            
            @endphp
            <div id="review_form_wrapper" class="lolol">
                <div id="review_form">

                    @if ( $eval == '1' )
                    <div class="w-full mx-auto text-center mb-4"><h4 class="text-naranjo text-2xl font-festivo19">¡Gracias por dejar tu evaluación!</h4></div>
                    @endif

                    @php
                        // get user comments for this product
                        $comments = get_comments( array(
                            'post_id' => get_the_ID(),
                            'user_id' => get_current_user_id(),
                            'status' => 'approve',
                            'type' => 'review'
                        ) );
                        // if user has already commented, show the comment
                        if ( $comments ) {
                            echo '<div class="w-full mx-auto text-center mb-4"><h5 class="text-negro text-base font-sans">Estos son los comentarios que escribiste en '. $course_title .'</h5></div>';
                            // for each comment, show the comment
                            foreach ( $comments as $comment ) {
                                echo '<div class="border rounded-sm border-gris5 bg-white py-4 px-4 mb-6 text-negro">';
                                echo '<p class=" text-gris text-sm mb-4">';
                                echo '<strong class="">' . $comment->comment_author . '</strong>';
                                echo '<span class="woocommerce-review__dash"> – </span>';
                                echo '<time class="woocommerce-review__published-date" datetime="' . get_comment_date( 'c', $comment  ) . '">' . get_comment_date( 'M j, Y', $comment  ) . '</time>';
                                echo '</p>';
                                echo '<div class="description text-base">' . $comment->comment_content . '</div>';
                                echo '</div>';
                            }
                            $comment = $comments[0];
                        }
                    @endphp

                    <?php
                    $commenter    = wp_get_current_commenter();
                    $comment_form = array(
                        /* translators: %s is product title */
                        'title_reply'         => sprintf( 'Evalúa tu experiencia en &ldquo;%s&rdquo;', get_the_title() ),
                        /* translators: %s is product title */
                        'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
                        'title_reply_before'  => '<div class="w-11/12 mx-auto text-center mb-8"><h4 class="text-negro text-2xl font-festivo19 mb-2">',
                        'title_reply_after'   => '</h4><div class="w-full mx-auto text-center mb-4"><p class="text-negro text-base font-sans">Con tu comentario ayudarás a otras personas a conocer más sobre este taller.</p></div></div>',
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

                    $comment_form['comment_field'] .= '<p class="comment-form-comment my-4"><label for="comment" class="hidden">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="12" class="appearance-none h-32 rounded-none mb-3 relative block w-full px-3 py-4 border border-gray-300 placeholder-gray-500 text-negro focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" required placeholder="' . esc_html__( 'Your review', 'woocommerce' ) . '"></textarea></p>';

                    comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                    ?>
                </div>
            </div>
            @php
                            endwhile;
                            wp_reset_query();
            @endphp
            
        </div>        
        


    </div>
  </section>

@endsection

@section('footer')

<script>

        $( 'body' )
		// Star ratings for comments
		.on( 'init', '#rating', function() {
			$( '#rating' )
				.hide()
				.before(
					'<p class="stars text-3xl mt-2">\
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

    

</script>

@endsection  

@section('under-footer')

@endsection 