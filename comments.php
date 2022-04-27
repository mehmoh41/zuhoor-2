<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage zuhoor
 * @since zuhoor
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
 
<div class="border-t-2">
<div id="comments" class="comments-area max-w-screen-sm mx-auto md:mx-0 bg-gray-100 p-5">
 
 <?php if ( have_comments() ) : ?>
     <h2 class="comments-title">
         <?php
             printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'twentythirteen' ),
                 number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
         ?>
     </h2>

     <ol class="comment-list">
         <?php
             wp_list_comments( array(
                 'style'       => 'ol',
                 'short_ping'  => true,
                 'avatar_size' => 74,
             ) );
         ?>
     </ol><!-- .comment-list -->

     <?php
         // Are there comments to navigate through?
         if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
     ?>
     <nav class="navigation comment-navigation" role="navigation">
         <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'zuhoor' ); ?></h1>
         <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'zuhoor' ) ); ?></div>
         <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'zuhoor' ) ); ?></div>
     </nav><!-- .comment-navigation -->
     <?php endif; // Check for comment navigation ?>

     <?php if ( ! comments_open() && get_comments_number() ) : ?>
     <p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
     <?php endif; ?>

 <?php endif; // have_comments() ?>

 <?php comment_form(); ?>

</div><!-- #comments -->
</div>