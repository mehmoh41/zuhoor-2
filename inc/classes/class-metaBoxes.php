<?php
/**
 * registering metaboxes
 * @package Zuhoor
 * 
 */
namespace ZUHOOR_THEME\Inc;
use ZUHOOR_THEME\Inc\Traits\Singleton;
class MetaBoxes {
    use Singleton;
    protected function __construct() {
        // load other classes
        $this->setup_hooks();
    }
    protected function setup_hooks() {    
        // actions and filters
        add_action("add_meta_boxes" , [$this , 'add_custom_meta_box']);
        add_action( 'save_post', [$this , 'zuhoor_save_meta_box_data'] );

    }
    function add_custom_meta_box() {
        $screens = [ 'post', 'wporg_cpt' ];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'wporg_box_id',                 // Unique ID
                'Custom Meta Box Title',      // Box title
                [$this,'custom_meta_box_html'],  // Content callback, must be of type callable
                $screen,                            // Post type
                'side'
            );
        }
     }
    public function custom_meta_box_html($post) {
        $value = get_post_meta( $post->ID, '_hide_page_title', true );
        ?>
        <label for="zuhoor-field"><?php esc_html_e("Hide the page title" , 'zuhoor')?></label>
        <select name="zuhoor_field" id="zuhoor-field" class="postbox">
            <option value=""><?php esc_html_e("Select" , 'zuhoor')?></option>
            <option value="Yes" <?php selected( $value, 'yes' ); ?>><?php esc_html_e("Yes" , 'zuhoor')?></option>
            <option value="no" <?php selected( $value, 'no' ); ?>><?php esc_html_e("No" , 'zuhoor')?></option>
        </select>
        <?php
    }

    function zuhoor_save_meta_box_data( $post_id ) {
        /**
         * when the post is saved or updated we get $_POST available
         * check if the current user is authorized
         * 
         */
         if( ! current_user_can("edit_post" , $post_id)) { 
            return;
         }
         /**
          * check if nonce value we recieved is the same as created.
          */
         if(!isset($_POST['hide_title_meta_box_nonce_name'])
          || ! wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'] , plugin_basename(__FILE__) )
          ) {
              return;
         }
     
        if ( array_key_exists( 'zuhoor_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_meta_key',
                $_POST['zuhoor_hide_title_field']
            );
        }
     }
}