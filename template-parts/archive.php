
<?php
/**
* The template used to display archive content
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="">  
        <?php echo get_the_post_thumbnail( get_the_ID(),'full h-[350px] object-center object-cover' )?>
    </div>
  <header class="my-3">
    <h1 class="font-bold text-3xl"><?php the_title(); ?></h1>
  </header><!-- .entry-header -->

  <div class="mb-3 w-[24rem]">

    <?php zuhoor_the_excerpt( 150 ); 
    echo zuhoor_excerpt_more();
    ?>
    

    <!-- THIS IS WHERE THE FUN PART GOES -->

  </div><!-- .entry-content -->

</article><!-- #post-## -->
