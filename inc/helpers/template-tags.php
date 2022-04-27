<?php 
function get_the_post_custom_thumbnail($post_id , $size='featured-thumbnail' , $additional_attributes = []) {
    $custom_thumbnail = '';
    if(null === $post_id) {
        $post_id  = get_the_ID();   
    }
    if(has_post_thumbnail($post_id)) {
        $default_attributes = [
            'loading' => 'lazy'
        ];

        $attributes = array_merge($additional_attributes , $default_attributes);
        
        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $attributes,
            // $additional_attributes,
        );
    }
    return $custom_thumbnail;
    
}

function the_post_custom_thumbnail($post_id , $size='featured-thumbnail' , $additional_attributes = []) {
    
    echo get_the_post_custom_thumbnail($post_id , $size , $additional_attributes);
}


/**
 * get the posted date
 */
function zuhoor_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if(get_the_time('U' !== get_the_modified_time())) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    $time_string = sprintf($time_string , 
        esc_attr(get_the_date(DATE_W3C)),
        esc_attr(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_attr(get_the_modified_date()),
);
$posted_on = sprintf(
    esc_html_x( ' %s' , 'post date' , 'zuhoor'),
    '<a href=" ' .esc_url(get_permalink()). ' " rel="bookmark" class="text-gray-600 text-xs">'.$time_string.'</a>'
);
echo '<span class="posted-on text-sm">'. $posted_on.'</span>';

}

/** 
 * get the author information
 */
function zuhoor_posted_by() {
    $by_line = sprintf(
        esc_html_x('by %s' , 'post author' , 'zuhoor'),
        '<span class="author vcard"><a class="text-gray-900 font-medium leading-none hover:text-indigo-600 transition duration-500 ease-in-out" href=" ' . esc_url(get_author_posts_url( get_the_author_meta('ID'))) . ' ">' . esc_html(get_the_author()) . '</a></span>'
    );
    echo '<span class="byline text-gray-800 text-sm">' .$by_line. '</span>';
}

/**
 * Get the trimmed version of post excerpt.
 *
 * This is for modifing manually entered excerpts,
 * NOT automatic ones WordPress will grab from the content.
 *
 * It will display the first given characters ( e.g. 100 ) characters of a manually entered excerpt,
 * but instead of ending on the nth( e.g. 100th ) character,
 * it will truncate after the closest word.
 *
 * @param int $trim_character_count Charter count to be trimmed
 *
 * @return bool|string
 */
function zuhoor_the_excerpt( $trim_character_count = 0 ) {
	$post_ID = get_the_ID();

	if ( empty( $post_ID ) ) {
		return null;
	}

	if ( has_excerpt() || 0 === $trim_character_count ) {
		the_excerpt();

		return;
	}

	$excerpt = wp_html_excerpt( get_the_excerpt( $post_ID ), $trim_character_count, ' [...]' );


	echo $excerpt;
}

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 *
 * @return string (Maybe) modified "read more" excerpt string.
 */
function zuhoor_excerpt_more( $more = '' ) {

	if ( ! is_single() ) {
		$more = sprintf( '<a class="zuhoor-read-more my-2 text-blue-600 underline" href="%1$s">%2$s</a>',
			get_permalink( get_the_ID() ),
			__( 'Read more', 'zuhoor' )
		);
	}

	return $more;
}

function zuhoor_pagination() {
    // previous_post_link();
    // next_post_link();
    $args = [
        'before_page_number' => '<span class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 text-white text-lg outline-none">',
        'after_page_number' => '</span>'
    ];
    $allowed_args = [
        'span' => [
            'class' => [],
        ],
        'a' => [
            'class' => [],
            'href' => []
        ]
    ]; 
    printf('<nav class="zuhoor-pagination clearfix my-5">%s</nav>' , wp_kses(paginate_links($args) , $allowed_args));
}