<?php 
function zuhoor_testimonial() {
    $labels = array(
        'name'                  => _x( 'Testimonials', 'Post type general name', 'zuhoor' ),
        'singular_name'         => _x( 'Testimonail', 'Post type singular name', 'zuhoor' ),
        'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'zuhoor' ),
        'name_admin_bar'        => _x( 'Testimonail', 'Add New on Toolbar', 'zuhoor' ),
        'add_new'               => __( 'Add New', 'zuhoor' ),
        'add_new_item'          => __( 'Add New zuhoor', 'zuhoor' ),
        'new_item'              => __( 'New Testimonial', 'zuhoor' ),
        'edit_item'             => __( 'Edit Testimonial', 'zuhoor' ),
        'view_item'             => __( 'View Testimonial', 'zuhoor' ),
        'all_items'             => __( 'All Testimonials', 'zuhoor' ),
        'search_items'          => __( 'Search Testimonials', 'zuhoor' ),
        'parent_item_colon'     => __( 'Parent Testimonials:', 'zuhoor' ),
        'not_found'             => __( 'No Testimonials found.', 'zuhoor' ),
        'not_found_in_trash'    => __( 'No Testimonials found in Trash.', 'zuhoor' ),
        'featured_image'        => _x( 'Testimonail Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'zuhoor' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'zuhoor' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'zuhoor' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'zuhoor' ),
        'archives'              => _x( 'Testimonail archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'zuhoor' ),
        'insert_into_item'      => _x( 'Insert into Testimonial', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'zuhoor' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Testimonial', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'zuhoor' ),
        'filter_items_list'     => _x( 'Filter Testimonials list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'zuhoor' ),
        'items_list_navigation' => _x( 'Testimonials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'zuhoor' ),
        'items_list'            => _x( 'Testimonials list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'zuhoor' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Testimonail custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'zuhoor' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'Testimonail', $args );
}
add_action( 'init', 'zuhoor_testimonial' );



?>