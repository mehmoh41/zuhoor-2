
<?php
/* Template Name: Archive Page Custom */
get_header(); ?>

<div class="clear"></div>
</header> <!-- / END HOME SECTION -->

<div id="content" class="site-content">

<div class="max-w-screen-xl mx-auto px-6 py-12">

  <div class="grid grid-cols-12 gap-20">
    <div id="primary" class="content-area col-span-9">
      <main id="main" class="grid grid-cols-12 gap-4" role="main">

        
        <?php while ( have_posts() ) : the_post(); // standard WordPress loop. ?>
        <div class="col-span-6 ">
            <?php get_template_part( 'template-parts/archive', 'tmpl_archives' ); // loading our custom file. ?>
            </div>
            <?php endwhile; // end of the loop. ?>
        

      </main><!-- #main -->
    </div><!-- #primary -->
    <div class="col-span-3">
    <?php get_sidebar(); ?>
  </div>
  </div>
  

</div><!-- .container -->

<?php get_footer(); ?>
