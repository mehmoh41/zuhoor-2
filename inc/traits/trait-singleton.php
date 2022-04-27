<?php
namespace ZUHOOR_THEME\Inc\Traits;

trait Singleton {
    // public __construct() {

    // }
    public function clone() {
        
    }
    final public static function get_instance() {
        static $instance = [];
        $called_class = get_called_class();

        if( !isset($instance[$called_class])) {
            $instance[$called_class] = new $called_class();
            do_action( sprintf("zuhoor_theme_singleton_init_%s" , $called_class) );
        }
        return $instance[$called_class];
    }
}