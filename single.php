<?php

/** 
 * Main template file
 * @package zuhoor
 *
 */
get_header();
?>

<div class="max-w-screen-xl mx-auto my-10 px-10">
  <!-- <div class="bg-cover h-64 text-center overflow-hidden" style="height: 450px; background-image: url('https://api.time.com/wp-content/uploads/2020/07/never-trumpers-2020-election-01.jpg?quality=85&w=1201&h=676&crop=1')" title="Woman holding a mug">
            </div> -->
  <div class="relative">
    <div class="text-gray-700 text-md grid grid-cols-12 gap-0 md:gap-8">
      
        
        
      
        <?php
            if (have_posts()) :
                ?>
                
                    <?php 
                        if(is_home() && !is_front_page()) {
                            ?>
                            <header class="py-3 my-12">
                                <h1 class="text-5xl " style="font-weight: bold;">
                                    <?php single_post_title(); ?>
                                </h1>
                                
                            </header>
                            <?php
                        }
                    ?>
                
                
                <div class="col-span-12 md:col-span-8">
                    <?php
                        while (have_posts()) : the_post();
                            ?>

                                <?php get_template_part('template-parts/content')?>
                      
                  
                            <?php
                        endwhile;
                    ?>
                    <div class="flex justify-between items-center mb-8">
                    <span class="inline-block underline text-blue-700"><?php previous_post_link();?></span>
                    <span class="inline-block underline text-blue-700"><?php next_post_link();?></span>
           </div>
                  </div>
                    

                
                <?php
                else:
                    get_template_part("template-parts/content-none");
            endif;
            
            
            

            

        ?>
    <div class="col-span-12 md:col-span-4 lg:border-l">
            <?php get_sidebar()?>
    </div>

    
    
  </div>   
  
      </div>
      <?php comments_template( '/comments.php' )?>
        </div>


    
<?php
get_footer();
