<?php
/**
 * registering metaboxes
 * @package Zuhoor
 * 
 */
namespace ZUHOOR_THEME\Inc;
use ZUHOOR_THEME\Inc\Traits\Singleton;
class TestMetaBox {
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
        $screens = [ 'Testimonail', 'wporg_cpt' ];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'wporg_box_id',                 // Unique ID
                'Quoter Position',      // Box title
                [$this,'custom_meta_box_html'],  // Content callback, must be of type callable
                $screen,                            // Post type
                'side'
            );
        }
     }
    public function custom_meta_box_html($post) {
        $data = get_post_custom( $post->ID );
        $val = isset($data['zuhoor-field']) ? esc_attr( $data['zuhoor-field'][0]) : '';
        ?>
            <input type="text" name="zuhoor-field" id="zuhoor-field" placeholder="Shia Imam" value="<?php echo $val?>">
        <?php
    }

    // function zuhoor_save_meta_box_data( $post_id ) {
        function zuhoor_save_meta_box_data($post_id) {
        /**
         * when the post is saved or updated we get $_POST available
         * check if the current user is authorized
         * 
         */
        
        

        global $post;
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post->ID;
        }
        if(isset($_POST['zuhoor-field'])) {
            update_post_meta( $post_id, 'zuhoor-field' , $_POST['zuhoor-field']);
        }
        

    //      if( ! current_user_can("edit_post" , $post_id)) { 
    //         return;
    //      }
    //      /**
    //       * check if nonce value we recieved is the same as created.
    //       */
    //      if(!isset($_POST['hide_title_meta_box_nonce_name'])
    //       || ! wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'] , plugin_basename(__FILE__) )
    //       ) {
    //           return;
    //      }
     
    //     if ( array_key_exists( 'zuhoor_hide_title_field', $_POST ) ) {
    //         update_post_meta(
    //             $post_id,
    //             '_hide_meta_key',
    //             $_POST['zuhoor_hide_title_field']
    //         );
    //     }
    //  }
    }
}