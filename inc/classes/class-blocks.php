<?php 
/**
 * Custom Block Categories
 * @package zuhoor
 * 
 */

namespace ZUHOOR_THEME\Inc;
use ZUHOOR_THEME\Inc\Traits\Singleton;
class Blocks {
    use Singleton;
    protected function __construct() {
        // load other classes
        $this->setup_hooks();
    }
    protected function setup_hooks() {    
        // actions and filters
        add_action( 'block_categories_all', [$this , 'add_block_categories'] );
    }
 
    public function add_block_categories($categories) {
        $category_slugs = wp_list_pluck( $categories, 'slug' );
        $category =  in_array('zuhoor' , $category_slugs , true) ? $categories : array_merge($categories , [
            ['slug' => 'zuhoor',
            'title' => __('Zuhoor Blocks' , 'zuhoor'),
            'icon' => 'table-row-after']
        ]);

        
    }
}