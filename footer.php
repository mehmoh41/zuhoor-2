<?php
/**
 * footer template
 * @package zuhoor
 */
?>

<footer class=" border-t border-gray-400">
    
<div id="primary" class="max-w-screen-xl mx-auto pt-20 pb-5 grid grid-cols-12">
    <?php do_action( 'before_sidebar' ); ?>
    <?php // if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
        <!-- <div id="search" class="widget widget_search">
           <?php //get_search_form(); ?>
        </div> -->
        <div class="col-span-12 md:col-span-6 lg:col-span-3 grid grid-rows px-4">
        <a href="<?php echo get_home_url()?>" class="text-4xl font-bold flex items-center md:ml-3">
            <span class="text-6xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-300 via-indigo-500 to-blue-300">Z</span><span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500 text-4xl -ml-1">uhoor</span>
        </a>
        <span class="text-md email flex items-center">
        <svg class="w-4 h-4 mr-3 fill-current text-gray-700" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 330.001 330.001" style="enable-background:new 0 0 330.001 330.001;" xml:space="preserve">
<g id="XMLID_348_">
	<path id="XMLID_350_" d="M173.871,177.097c-2.641,1.936-5.756,2.903-8.87,2.903c-3.116,0-6.23-0.967-8.871-2.903L30,84.602
		L0.001,62.603L0,275.001c0.001,8.284,6.716,15,15,15L315.001,290c8.285,0,15-6.716,15-14.999V62.602l-30.001,22L173.871,177.097z"
		/>
	<polygon id="XMLID_351_" points="165.001,146.4 310.087,40.001 19.911,40 	"/>
</g>
    </svg>
    <span class="text-gray-800 text-md">moh.meh41@gmail.com</span>
        </span>
        <span class="tracking-wide flex items-center">
        <svg class="w-6 h-6 fill-current text-gray-700"version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	  viewBox="0 0 577.565 577.565" style="enable-background:new 0 0 577.565 577.565;"
	 xml:space="preserve">
<g>
	<path d="M436.782,0H140.784c-9.228,0-16.734,7.506-16.734,16.734v544.097c0,9.228,7.507,16.734,16.734,16.734h295.998
		c9.228,0,16.734-7.507,16.734-16.734V16.734C453.516,7.506,446,0,436.782,0z M401.821,28.075c4.849,0,8.788,3.94,8.788,8.798
		c0,4.848-3.939,8.788-8.788,8.788c-4.857,0-8.797-3.939-8.797-8.788C393.023,32.025,396.973,28.075,401.821,28.075z
		 M383.987,32.856c2.219,0,4.017,1.798,4.017,4.017c0,2.218-1.798,4.016-4.017,4.016c-2.228,0-4.017-1.798-4.017-4.016
		C379.97,34.654,381.768,32.856,383.987,32.856z M373.363,32.856c2.219,0,4.017,1.798,4.017,4.017c0,2.218-1.798,4.016-4.017,4.016
		s-4.016-1.798-4.016-4.016C369.337,34.654,371.135,32.856,373.363,32.856z M255.802,28.075h65.953v17.585h-65.953V28.075z
		 M321.754,551.823h-65.953v-17.586h65.953V551.823z M418.603,513.229h-259.65V66.191h259.65V513.229z"/>
</g>
    </svg>
        <span class="text-md text-gray-800">
        +923118198190
        </span></span>
        </div>
        <div class="col-span-12 px-4 md:col-span-6 mt-6 lg:col-span-3">
            <h3 class="text-2xl font-bold">Quick Links</h3>
            <?php 
                    $menu_name = 'Footer Menu';
                
                
                    $menu_items = wp_get_nav_menu_items(4);
                    // echo '<pre>';
                    // print_r(wp_get_nav_menu_items(4));
                    // wp_die();
                    
                    foreach ($menu_items as $menu_item) {
                        ?>
                        <ul>
                            <li>
                                <a href="<?php echo $menu_item->url?>"><?php echo $menu_item->title?></a>
                            </li>
                        </ul>
                        <?php
                    }
                    // echo '<pre>';
                    // print_r(wp_get_nav_menu_items(4));
                    // wp_die();
            ?>
        </div>
        <div class="col-span-12 px-4 md:col-span-6 mt-6 lg:col-span-3">
        <h3 class="widget-title text-2xl font-bold"><?php _e( 'Recent Post', 'zuhoor' ); ?></h3>
            <?php 
            $recent_posts = wp_get_recent_posts( ['numberposts' => 5 , 'post_status' => 'publish'] );
            foreach ($recent_posts as $posts) {
                ?>
                <a href="<?php echo get_permalink($posts['ID']) ?>" class="block text-md">
                    <?php echo $posts['post_title']?>    
                </a>
                <?php
            }

            ?>
            
        </div>
        <div id="archives" class="widget col-span-12 px-4 mt-6 md:col-span-6 lg:col-span-3">
            <h3 class="widget-title text-2xl font-bold"><?php _e( 'Archives', 'zuhoor' ); ?></h3>
            <ul class="text-md">
                <?php wp_get_archives( array( 
                    'type' => 'monthly' , 
                    'limit'=>5
                     ) ); ?>
            </ul>
        </div>
        
   <?php //endif; ?>
</div>

    <?php 
        // if(is_active_sidebar("sidebar-2")) {
        //     dynamic_sidebar("sidebar-2");
        // }
    ?>
    <div class=" max-w-screen-xl mt-12 mx-auto">
        <p class="py-4 text-sm text-center underline">&copy; All Reserved Mehdi Mohammadi</p>
    </div>
</footer>
</section>
<?php wp_footer()?>
<script src="<?php echo get_template_directory_uri() . '/assets/js/loadmore.js'?>"></script>
</body>
</html>