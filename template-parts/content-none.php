<?php 
/**
 * the template for displaying a message that cannot be found
 * @package Zuhoor
 */
?>
<section class="not-found">
 <header>
     <h1 class="text-3xl"><?php esc_html_e("Not Found" , 'zuhoor') ?></h1>
 </header>

<div class="content">
    <?php 
        if(is_home() && current_user_can("publish_posts")) {
            ?>
            <p>
                <?php 
                    printf(
                        wp_kses(
                            __("Ready to publish your first post? <a href='%s'>Get Started Here</a>" , 'zuhoor'),
                        [
                            'a' => [
                                'href' => []
                            ]
                        ]
                    ),
                esc_url(admin_url("post-new.php"))        
                )
                            
                ?>
            </p>
            <?php
        }elseif(is_search()) {
            ?>
                <p><?php esc_html_e("sorry but nothing matched your search item, please try with different keywords." , 'zuhoor')?></p>
            <?php
            get_search_form();
        }
        else {
            ?>
                <p><?php esc_html_e("It seems we cannot find what you are looking for." , 'zuhoor')?></p>
            <?php
            get_search_form();
        }
    ?>
</div>

</section>