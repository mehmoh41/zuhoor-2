<?php
/**
 * template for entry content
 * 
 * To be used inside the loop
 * @package Zuhoor
 */


/**
 * excerpt more function
 */
// function wpdocs_excerpt_more( $more ) {
//     return sprintf( '<a href="%1$s" class="more-link text-blue-600 underline">%2$s</a>',
//           esc_url( get_permalink( get_the_ID() ) ),
//           sprintf( __( ' Continue reading %s', 'wpdocs' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
//     );
// }
// add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

?>


<div class="entry-content text-justify">
    <?php 
        if (is_single()) {


            the_content(
                sprintf(
                    wp_kses(
                        __("continue reading %s <span class='meta-nav my-3'>&rarr;</span>" , 'zuhoor'),
                        [
                            'span' => [
                                'class' => []
                            ]
                        ]
                            ),''
                            ),
                            the_title('<span class="screen-reader-text">"' , '"</span>' , false),
            );
            wp_link_pages(
                [
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zuhoor' ),
                    'after'  => '</div>',
                ]
            );
        }
        else {
            ?>
		<div class="truncate-4">
			<?php // zuhoor_the_excerpt( 150 ); ?>
		</div>
		<?php
		// echo zuhoor_excerpt_more();
        }
    ?>
</div>