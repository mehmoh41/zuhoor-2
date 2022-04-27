<section class="w-full bg-white">
<div class="max-w-screen-md mx-auto py-24">
<h1 class="faq-heading text-4xl text-center capitalize font-black mb-12">frequenlty asked Questions?</h1>
        <section class="faq-container relative">
            
                <!-- faq question -->
                <?php 
                    global $wp_query,$post;
                    $args = [
                        'post_type' => 'faq',
                        'post_status' => 'publish',
                        'orderby'=> 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 8,
                    ];
                    $faqs = new WP_Query( $args );
                    if(!$faqs->have_posts()) {
                        return;
                    }
                    while($faqs->have_posts()) : $faqs->the_post();
                    $the_id = $faqs->get_the_ID();
                    ?>
                    <div class="my-2">
                    <h1 class="faq-page py-4 px-5 bg-gray-100 font-bold text-black cursor-pointer"><?php echo get_the_title( $the_id )?></h1>
                <!-- faq answer -->

                <div class="faq-body hidden px-8 bg-gray-200 py-5">
                    <p><?php echo get_the_content()?></p>
                </div>
                </div>
                    <?php

                    


                    endwhile;?>
                
            
            
        </section>
        </div>
</section>