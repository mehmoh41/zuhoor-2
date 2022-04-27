<?php
// slick slider

/**
 * Register all shortcodes here
 */
add_action( 'init', 'register_shortcodes' );
function register_shortcodes() {
	add_shortcode( 'simple_slick_slider', 'sc_simple_slick_slider' );
	add_shortcode( 'post_slick_carousel_slider', 'sc_post_slick_carousel_slider' );
	add_shortcode( 'testimonials_slick_carousel_slider', 'sc_testimonials_slick_carousel_slider' );
}

/**
 * "simple_slick_slider" shortcode callback function - responsible for outputting the HTML markup of your images w/ text in a simple slider.
 */

function sc_simple_slick_slider () {

	$output = '<div class="simple-slick-slider">';
	$output .= 		'<div>';
	$output .= 			'<div>';
	$output .= 				'<img src="http://localhost/tutorial/wordpress/slick-slider/wp-content/uploads/2021/08/Paseo-Outlets-Nike-Factory_.jpg">';
	$output .= 				'<h2>Lorem ipsum dolor sit amet</h2>';
	$output .= 				'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat ante at ex feugiat tincidunt. Cras sed blandit eros. Aliquam hendrerit cursus odio et lacinia.</p>';
	$output .= 			'</div>';
	$output .= 		'</div>';
	$output .= 		'<div>';
	$output .= 			'<div>';
	$output .= 				'<img src="http://localhost/tutorial/wordpress/slick-slider/wp-content/uploads/2021/08/Paseo-Outlets-Adidas_.jpg">';
	$output .= 				'<h2>Consectetur adipiscing elit</h2>';
	$output .= 				'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat ante at ex feugiat tincidunt. Cras sed blandit eros. Aliquam hendrerit cursus odio et lacinia.</p>';
	$output .= 			'</div>';
	$output .= 		'</div>';
	$output .= 		'<div>';
	$output .= 			'<div>';
	$output .= 				'<img src="http://localhost/tutorial/wordpress/slick-slider/wp-content/uploads/2021/08/Paseo-Outlets-Pottery-Barn-2_.jpg">';
	$output .= 				'<h2>Etiam volutpat ante at ex</h2>';
	$output .= 				'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat ante at ex feugiat tincidunt. Cras sed blandit eros. Aliquam hendrerit cursus odio et lacinia.</p>';
	$output .= 			'</div>';
	$output .= 		'</div>';	
	$output .= '</div>';

	return $output;
}

/**
 * "post_slick_carousel_slider" shortcode callback function - responsible for outputting the HTML markup of your posts/custom posts in a carousel slider.
 */

function sc_post_slick_carousel_slider ( ) {

  global $wp_query, $post;

  $posts = new WP_Query( array(
    'cat_name' => 'item3',
    // 'post_status' => 'publish',  
    'orderby' => 'date', 
    'order' => 'DESC',
	'posts_per_page' => 4,
    
    
	) );
	
	

  if( ! $posts->have_posts() ) {
		return false;
  }

  $output = '<div class="w-full py-24 bg-white ">';
  $output .= '<div class="post-slick-carousel-slider max-w-screen-md mx-auto relative">';

  while( $posts->have_posts() ) {
	  
		$posts->the_post();
		$post_ID = get_the_ID();
		$post_title = get_the_title();
		$post_exerpt = get_the_excerpt();
		$post_featured_image = wp_get_attachment_image( get_post_thumbnail_id( $post_ID ), 'full w-full h-[400px] object-cover object-center');
		$post_link = get_post_permalink();

		// $category_post = new WP_Query('cat=5&order=DESC');


		$output .= '<div class="m-2">';
		$output .= 		'<div class="md:flex justify-center items-center">';
		$output .= 			'<div class=" max-w-full md:w-1/2 md:hidden ml-2 mx-auto">';
		$output .= 				$post_featured_image;
		$output .= 			'</div>';
		$output .= 			'<div class="max-w-full p-4 md:p-0 md:w-1/2">';
		$output .= 				'<h2 class="text-3xl font-bold tracking-wide leading-8">'.$post_title.'</h2>';
		$output .= 				'<p class="text-sm my-4">'.wp_trim_words( $post_exerpt, 15 , '[...]').'</p>';
		$output .= 			'<div class="mt-5">';
		$output .= 				'<a class="inline-block px-4 py-2 bg-indigo-500 text-white border-indigo-600 hover:bg-transparent hover:text-white hover:bg-indigo-700" href="'.$post_link.'">Read More</a>';
		$output .= 			'</div>';
		$output .= 			'</div>';
		$output .= 			'<div class=" hidden md:block w-full md:w-1/2 md:ml-2">';
		$output .= 			$post_featured_image;
		$output .= 			'</div>';
		$output .= 		'</div>';
		$output .= '</div>';		
	}

	$output .= '</div>';
	$output .= '</div>';
	
  return $output;
}

// testimonials

function sc_testimonials_slick_carousel_slider ( ) {

	global $wp_query, $post;
  
	$posts = new WP_Query( array(
	  'post_type' => 'Testimonail',
	  'post_status' => 'publish',  
	  'orderby' => 'date', 
	  'order' => 'DESC',
	  'posts_per_page' => 4,
	  
	  
	  ) );
	  
	  
	  
  
	if( ! $posts->have_posts() ) {
		  return false;
	}
  
	$output = '<div class="w-full py-24 ">';
	$output .= '<div class="testimonials-slick-carousel-slider max-w-screen-md mx-auto relative">';
	while( $posts->have_posts() ) {
		
		  $posts->the_post();
		  $post_ID = get_the_ID();
		  $post_title = get_the_title();
		  $post_exerpt = get_the_excerpt();
		  $post_featured_image = wp_get_attachment_image( get_post_thumbnail_id( $post_ID ), 'full w-full h-[400px] object-cover object-center');
		  $post_link = get_post_permalink();
		  
		  $custom_quoter = get_post_meta( $post_ID, 'zuhoor-field' , false);
			global $name;
		 	foreach ($custom_quoter as $quoter) {
				 $name = $quoter;
				 
			 }

		  // $category_post = new WP_Query('cat=5&order=DESC');
		//   $output .= 				'<a class="text-sm" href="'.$post_link.'">';
		  $output .= 			'<div class="max-w-full mx-auto text-center py-10">';
		  $output .= 				'<p class="text-xl text-center w-full md:w-[48rem] mx-auto inline-block text-gray-700 font-semibold leading-widest">'.$post_exerpt.'</p>';
		  $output .= 				'<h2 class="text-xl mt-3 font-bold text-black capitalize">'.$post_title.'</h2>';
		  $output .= 				'<span class="text-sm text-gray-500 capitalize tracking-widest leading-1 ">'.$name.'</span>';
		  $output .= 			'</div>';
		//   $output .= 			'</a>';
	  }
  
	  $output .= '</div>';
	  $output .= '</div>';
	  
	return $output;
  }
  