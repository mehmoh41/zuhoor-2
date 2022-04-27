<?php

/**
 * Bootstraps the theme.
 * @package Zuhoor
 * 
 */

namespace ZUHOOR_THEME\Inc;

use ZUHOOR_THEME\Inc\Traits\Singleton;

class ZUHOOR_THEME
{
    use Singleton;

    protected function __construct()
    {
        // load other classes
        Assets::get_instance();
        Menus::get_instance();
        MetaBoxes::get_instance();
        Sidebars::get_instance();
        Clock_Widget::get_instance();
        Block_Patterns::get_instance();
        Blocks::get_instance();
        TestMetaBox::get_instance();
        $this->setup_hooks();
    }
    // <input type="text" id="zuhoor-field" name="zuhoor-field" placeholder="John Doe">
    protected function setup_hooks()
    {

        /**
         * actions
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }
    public function setup_theme()
    {
        // add language support for wordpress

        // by using the title tag we say let the wordpress support the document title tag.
        add_theme_support('title-tag');

        // custome log
        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
        ]);

        add_theme_support('custom-background', [
            'default-color' => '#fff',
            'default-image' => '',
            'default-repeat' => 'no-repeat',
            'default-size' => 'cover',
        ]);

        add_theme_support("post-thumbnails");

        /**
         * register image size 
         * 
        */
        add_image_size('featured-thumbnail' , 357 , 357, true) ;
        // selective refresh is a hybrid preview mechanism that has the performance benefit of not having to refresh the entire preview window.
        add_theme_support('customize-selective-refresh-widgets');

        // adds default post and comments rss feed links to the head
        add_theme_support('automatic-feed-links');

        add_theme_support('html5', 
        array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

        
        //TinyMCE is an online rich-text editor released as open-source software under the LGPL. It has the ability to convert HTML textarea fields or other HTML elements to editor instances

        add_theme_support("wp-block-styles");
        add_theme_support('align-wide');

        // load the editor styles in gutenberg editor.
        add_theme_support( 'editor-styles' );

        // editor style support
        // add path to our custom editor styles
        add_editor_style('assets/src/css/editor.css'); 

        // remove the core block pattern
        // remove_theme_support( 'core-block-patterns' );

        global $content_width;
        if(!isset($content_width)) {
            $content_width = 1200;
        }
    }
}
