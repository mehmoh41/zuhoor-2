<?php

/**
 * Content Template
 * @package Zuhoor
 */
?>
<article id="post<?php the_ID();?>" <?php post_class('mb-5 relative')?>>
    <?php
        if(!is_single()) {
            ?>
            <div class="shadow-lg">
            <?php
        }
    ?>
    
    <?php 
    
        get_template_part("template-parts/components/blog/entry-header");
        get_template_part("template-parts/components/blog/entry-content");
        if(!is_single()) {
            ?>
            <div class="flex justify-between items-center px-4 pb-4">
            <?php
        }
        
            get_template_part("template-parts/components/blog/entry-footer");    
            get_template_part("template-parts/components/blog/entry-meta");
            
            
        
        ?>
        
        <?php
        if(!is_single()) {
            ?>
            </div>
            <?php
        }
        ?>
        
        <?php
        if(!is_single()) {
            ?>
            </div>
            <?php
        }
    ?>
    
</article>
