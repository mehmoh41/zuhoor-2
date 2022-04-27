<?php
/**
 * functions template
 * @package zuhoor
 */
if( !defined('ZUHOOR_DIR_PATH')) {
   define('ZUHOOR_DIR_PATH' , untrailingslashit( get_template_directory() ));
}
if (!defined("ZUHOOR_DIR_URI")) {
   define('ZUHOOR_DIR_URI' , untrailingslashit( get_template_directory_uri() ));
}



if ( ! defined( 'ZUHOOR_BUILD_URI' ) ) {
	define( 'ZUHOOR_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'ZUHOOR_BUILD_PATH' ) ) {
	define( 'ZUHOOR_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

if ( ! defined( 'ZUHOOR_BUILD_JS_URI' ) ) {
	define( 'ZUHOOR_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( ! defined( 'ZUHOOR_BUILD_JS_DIR_PATH' ) ) {
	define( 'ZUHOOR_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}

if ( ! defined( 'ZUHOOR_BUILD_IMG_URI' ) ) {
	define( 'ZUHOOR_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
}

if ( ! defined( 'ZUHOOR_BUILD_CSS_URI' ) ) {
	define( 'ZUHOOR_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( ! defined( 'ZUHOOR_BUILD_CSS_DIR_PATH' ) ) {
	define( 'ZUHOOR_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}

if ( ! defined( 'ZUHOOR_BUILD_LIB_URI' ) ) {
	define( 'ZUHOOR_BUILD_LIB_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/library' );
}

if ( ! defined( 'ZUHOOR_ARCHIVE_POST_PER_PAGE' ) ) {
	define( 'ZUHOOR_ARCHIVE_POST_PER_PAGE', 9 );
}

if ( ! defined( 'ZUHOOR_SEARCH_RESULTS_POST_PER_PAGE' ) ) {
	define( 'ZUHOOR_SEARCH_RESULTS_POST_PER_PAGE', 9 );
}



require_once ZUHOOR_DIR_PATH . '/inc/helpers/autoloader.php';
require_once ZUHOOR_DIR_PATH . '/inc/helpers/template-tags.php';
require_once ZUHOOR_DIR_PATH . '/inc/helpers/slick-slider.php';
require_once ZUHOOR_DIR_PATH . '/inc/helpers/custom-post-testimonials.php';
require_once ZUHOOR_DIR_PATH . '/inc/helpers/faq-custom-post.php';

// require_once ZUHOOR_DIR_PATH . '/inc/helpers/testimonial-metabox.php';




function zuhoor_get_theme_instance() {
   \ZUHOOR_THEME\Inc\ZUHOOR_THEME::get_instance();  
}
zuhoor_get_theme_instance();   

// echo filemtime(get_template_directory() . '/style.css');


// function wporg_save_postdata( $post_id ) {
//    /**
//     * when the post is saved or updated we get $_POST available
//     * check if the current user is authorized
//     * 
//     */
//     if( ! current_user_can("edit_post" , $post_id)) { 
//        return;
//     }
//     /**
//      * check if nonce value we recieved is the same as created.
//      */
//     if(!isset($_POST['hide_title_meta_box_nonce_name'])
//      || ! wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'] , plugin_basename(__FILE__) )
//      ) {
//          return;
//     }

//    if ( array_key_exists( 'zuhoor_hide_title_field', $_POST ) ) {
//        update_post_meta(
//            $post_id,
//            '_hide_meta_key',
//            $_POST['zuhoor_hide_title_field']
//        );
//    }
// }
// add_action( 'save_post', 'wporg_save_postdata' );



// function zuhoor_change_title_text( $title ){
//     $screen = get_current_screen();
	
//     if  ( 'testimonail' == $screen->post_type ) {
//          $title = 'Enter Name Of Quoter';
//     }
  
//     return $title;
// }
  
// add_filter( 'enter_title_here', 'zuhoor_change_title_text' );



// add_action( 'admin_init', 'test_metabox');
// function test_metabox() {
//     add_meta_box( 'test_metabox', "Position Of Quoter", "", "Testimonail", "normal", "low" );
// }
// function test_metabox_field() {
//     echo '<input type="text" name="test_input" id="test_input" value=""/>';
// }


/** 
 * loade more functionality
 */



function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 1;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    // $page++; // added my self
    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
		$out .= get_template_part('template-parts/content');
        // $out .= '<div class="small-12 large-4 columns">
        //         <h1>'.get_the_title().'</h1>
        //         <p>'.get_the_content().'</p>
        //  </div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
