<?php
/**
 *  register sidebars
 * theme Sidebar
 * 
 * @package Zuhoor
 * 
 */
namespace ZUHOOR_THEME\Inc;
use ZUHOOR_THEME\Inc\Traits\Singleton;
class Sidebars {
    use Singleton;
    protected function __construct() {
        // load other classes
        $this->setup_hooks();
    }
    protected function setup_hooks() {    
        // actions and filters
        add_action("widgets_init" , [$this , 'register_sidebars']);
        add_action("widgets_init" , [$this , 'register_widgets']);
        
    }
    public function register_sidebars() {
        register_sidebar(
            [
                'name' => __("Sidebar" , 'zuhoor'),
                'id' => 'sidebar-1',
                'description' => __("Main Sidebar" , 'zuhoor'),
                'before_widget' => '<div class="widget flex items-center border-indigo-600 uppercase">',
                'before_title' => '<h3 class="widget-title font-semibold inline-block">',
                'after_title' => '</h3>',
                'after_widget' => '</svg></div>',
                
            ]
            );
            register_sidebar(
                [
                    'name' => __("Footer" , 'zuhoor'),
                    'id' => 'sidebar-2',
                    'description' => __("Footer Sidebar" , 'zuhoor'),
                    'before_widget' => '<div class="widget col-span-3">',
                    'before_title' => '<h3 class="widget-title">',
                    'after_title' => '</h3>',
                    'after_widget' => '</div>'
                ]
                );
    }
  
    public function register_widgets() {
        register_widget( 'ZUHOOR_THEME\Inc\Clock_Widget' ); 
    }


}
    
?>