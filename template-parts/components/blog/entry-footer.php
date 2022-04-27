<?php 
/**
 * Template for entry footer
 * To be used inside wordpress the loop
 * 
 * @package zuhoor
 */
$the_post_id = get_the_ID();
$article_terms = wp_get_post_terms($the_post_id , ['category' , 'post_tag']);



if(empty($article_terms) && ! is_array($article_terms))  {
    return;
}
?>
<div class="entry-footer">
    <?php 
    
        foreach($article_terms as $key => $article_term) {
            ?>
            <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded tracking-wider mt-2 ml-1"> -->
                
            <a class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out m-[1px]" href="<?php echo esc_url(get_term_link($article_term))?>">
                <?php
                  echo esc_html($article_term->name);   
                 ?>
            </a>
            
            <?php
        }
    
    
        
    ?>
</div>
    