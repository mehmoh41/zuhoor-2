<?php 
function zuhoor_faq() {
    $labels = array(
        'name'                  => _x( 'Faqs', 'Post type general name', 'zuhoor' ),
        'singular_name'         => _x( 'Faq', 'Post type singular name', 'zuhoor' ),
        'menu_name'             => _x( 'Faqs', 'Admin Menu text', 'zuhoor' ),
        'name_admin_bar'        => _x( 'Faq', 'Add New on Toolbar', 'zuhoor' ),
        'add_new'               => __( 'Add New', 'zuhoor' ),
        'add_new_item'          => __( 'Add New faq', 'zuhoor' ),
        'new_item'              => __( 'New faq', 'zuhoor' ),
        'edit_item'             => __( 'Edit faq', 'zuhoor' ),
        'view_item'             => __( 'View faq', 'zuhoor' ),
        'all_items'             => __( 'All Faqs', 'zuhoor' ),
        'search_items'          => __( 'Search Faqs', 'zuhoor' ),
        'parent_item_colon'     => __( 'Parent Faqs:', 'zuhoor' ),
        'not_found'             => __( 'No Faqs found.', 'zuhoor' ),
        'not_found_in_trash'    => __( 'No Faqs found in Trash.', 'zuhoor' ),
        'featured_image'        => _x( 'Faq Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'zuhoor' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'zuhoor' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'zuhoor' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'zuhoor' ),
        'archives'              => _x( 'Faq archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'zuhoor' ),
        'insert_into_item'      => _x( 'Insert into faq', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'zuhoor' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this faq', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'zuhoor' ),
        'filter_items_list'     => _x( 'Filter Faqs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'zuhoor' ),
        'items_list_navigation' => _x( 'Faqs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'zuhoor' ),
        'items_list'            => _x( 'Faqs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'zuhoor' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Faq custom post type.',
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
      
    register_post_type( 'faq', $args );
}
add_action( 'init', 'zuhoor_faq' );



?>