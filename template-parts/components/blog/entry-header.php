<?php 
    /**
     * template for post entry header
     * @package Zuhoor
     */
    $the_post_id = get_the_ID();
    $hide_title = get_post_meta($the_post_id , '_hide_meta_key' , true);
    $heading_class = !empty($hide_title) && 'yes' === $hide_title ? 'hide' : '';

    $has_post_thumbnail = get_the_post_thumbnail($the_post_id);

?>
<header class="entry-header">
    
    <?php 
        // display feature image
        
        if($has_post_thumbnail) {
            ?>
            <div class="entry-image mb-3 w-full">
            <a href="<?php echo esc_url(get_permalink())?>">
                <?php
                if(is_single()) {
                    the_post_custom_thumbnail(
                        $the_post_id ,
                         'full', 
                         [
                        'sizes' => '(max-width:357px) 357px, 357px',
                        'class' => 'attachment-featured-large size-featured-image w-full h-64 object-center object-cover '
                         ]
                ); 
                }
                else {
                    ?>
                    <div class="w-full bg-cover no-repeat" style="background-image:url(<?php echo get_the_post_thumbnail_url( $the_post_id, 'thumbnail' )?>);height:350px"></div>
                    <?php
                //     the_post_custom_thumbnail(
                //         $the_post_id ,
                //          'featured-thumbnail', 
                //          [
                //         'sizes' => '357px, 357px',
                //         'class' => 'attachment-featured-large size-featured-image w-full h-full'
                //          ]
                // );
                }
                    
                 ?>
            </a>
            </div>
            <?php
        }
        // get the title
        if (is_single() || is_page()) {
            printf('<h1 class="text-4xl text-dark font-bold mt-5 my-3 %1$s">%2$s</h1>' , 
            esc_attr($heading_class),
            wp_kses_post(get_the_title())
        );
        }
        else {
            printf('<h2 class="text-gray-900 text-2xl mb-2 px-4"><a href="%1$s">%2$s</a></h2>' , 
            esc_url(get_the_permalink()),
            wp_kses_post(get_the_title())
        );
        }
    ?>
    
    <!--  -->
</header>