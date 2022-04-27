<?php
/**
 * front page 
 * 
 * @package zuhoor
 */
get_header();
?>
<!-- this is home page or the landing page  -->
<?php get_template_part("template-parts/components/front-page/hero")?>
<?php 
    the_content();
    get_template_part("template-parts/components/front-page/faq");
?>

<?php get_footer();?>