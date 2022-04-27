<?php
/**
 * calling all assets here
 * @package Zuhoor
 * 
 */
namespace ZUHOOR_THEME\Inc;
use ZUHOOR_THEME\Inc\Traits\Singleton;
class Block_Patterns {
    use Singleton;
    protected function __construct() {
        // load other classes
        $this->setup_hooks();
    }
    protected function setup_hooks() {    
        // actions and filters
        add_action( 'init', [ $this, 'zuhoor_register_block_patterns'] );
        add_action( 'init', [ $this, 'register_block_pattern_categories'] );

    }
    public function zuhoor_register_block_patterns() {
        /**
         * Cover pattern
         */
        $cover_content = $this->get_pattern_content('template-parts/patterns/cover');
        $about_content = $this->get_pattern_content('template-parts/patterns/about');

        register_block_pattern(
            'zuhoor/cover',
            [
                'title' => __('Custom Cover Block' , 'zuhoor'),
                'description' => __('Cover Block for worpdress' , 'zuhoor'),
                'categories' => ['cover'],
                'content' => $cover_content,
            ]
        );
        register_block_pattern(
            'zuhoor/about',
            [
                'title' => __('Custom About Block' , 'zuhoor'),
                'description' => __('About Block for worpdress' , 'zuhoor'),
                'categories' => ['about'],
                'content' => $about_content,
            ]
        );
    }
    
    public function get_pattern_content($content_path) {
        ob_start();
        get_template_part($content_path);
        $cover_content = ob_get_contents();
        ob_end_clean();
        return $cover_content;
    }
    public function register_block_pattern_categories() {
        $pattern_categories = [
            'cover' => __('Cover' , 'zuhoor'),
            'carousel' => __('Carousel' , 'zuhoor'),
            'about' => __('About' , 'zuhoor'),
        ];
        if(!empty($pattern_categories && is_array($pattern_categories))) {
            foreach ($pattern_categories as $pattern_category => $pattern_category_label) {
                register_block_pattern_category(
                    $pattern_category,
                    ['label' => $pattern_category_label]
                );
            }
        }
    }
}