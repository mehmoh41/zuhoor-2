<?php

?>
<div class="border-t-2">
<section class="max-w-screen-md mx-auto text-center">
<form role="search" method="get" id="searchform" class="ml-4"
    class="searchform" action="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
    <div class="mt-8">
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
        <input class="border bg-gray-100 px-4 py-2 w-2/3" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search here..."/>
        <input type="submit" class="px-4 py-2 bg-indigo-500 text-white cursor-pointer hover:bg-transparent border border-indigo-600 hover:text-black transition-all ease-in-out duration-300 outline-none" id="searchsubmit"
            value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
    </div>
</form>

</section>
</div>