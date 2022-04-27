<?php
/**
 * calling all assets here
 * @package Zuhoor
 * 
 */
namespace ZUHOOR_THEME\Inc;
use ZUHOOR_THEME\Inc\Traits\Singleton;
class Assets {
    use Singleton;
    protected function __construct() {
        // load other classes
        $this->setup_hooks();
    }
    protected function setup_hooks() {    
        // actions and filters
        add_action( "wp_enqueue_scripts", [$this , 'register_styles'] );
        add_action( "wp_enqueue_scripts", [$this , 'register_scripts'] );
        add_action( 'enqueue_block_assets', [$this , 'enqueue_editor_assets'] );
        add_action( 'wp_enqueue_scripts', [$this , 'ajax_enqueue_zuhoor'] );
    }
    public function register_styles() {
        
        wp_enqueue_style( 'font-css', get_template_directory_uri() . '/assets/src/library/fonts/fonts.css', [], false,'all' );
        wp_enqueue_style('editor-css' , get_template_directory_uri() . '/assets/src/css/editor.css' , [] , false , 'all');
        wp_register_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css', [], 'all' );
        wp_register_style( 'slick-theme', get_template_directory_uri() .'/assets/css/slick-theme.css', [], 'all' );
        wp_register_style( "style-css", get_stylesheet_uri(), [], filemtime(ZUHOOR_DIR_PATH.'/style.css'));


        // enqueu styles
        wp_enqueue_style( 'slick-css' );
        wp_enqueue_style( 'slick-theme');
        wp_enqueue_style( "style-css" );
        

        
    }
    public function register_scripts() {
        wp_register_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], false, true );
        wp_register_script('main-js' , get_template_directory_uri() . '/assets/js/main.js' , [] , false , 'all');
        // faq
        wp_register_script('faq-js' , get_template_directory_uri() . '/assets/js/faq.js' , [] , false , 'all');
        wp_register_script('scroll-js' , get_template_directory_uri() . '/assets/js/scroll.js' , [] , false , 'all');
        // load more
        wp_register_script( "loadmore-js",  get_template_directory_uri() . '/assets/js/loadmore.js', [], false, 'all' );

        // enqueuing scripts 
        wp_enqueue_script( 'slick-js' );
        wp_enqueue_script("faq-js");
        wp_enqueue_script("scroll-js");
        wp_enqueue_script("loadmore-js");
        wp_enqueue_script("main-js");
        
        

        // 
        // wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

        
        
    }
    function ajax_enqueue_zuhoor() {
        // wp_localize_script( 'zuhoor-script', 'ajax_posts', array(
        //     'ajaxurl' => admin_url( 'admin-ajax.php' ),
        //     'noposts' => __('No older posts found', 'zuhoor'),
        // ));
        wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/assets/js/loadmore.js', array('jquery') );
        wp_localize_script( 'ajax-script', 'ajax_posts', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
   }
   
    public function enqueue_editor_assets() {
        wp_enqueue_style('tailwindcss' , 'https://cdn.tailwindcss.com' , [] , false , 'all');
    }
}
