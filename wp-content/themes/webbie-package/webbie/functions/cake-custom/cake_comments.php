<?php
/*
 * =======================================================================================================================================
 *  DEFINE OUR COMMENT LIST STYLE
 * =======================================================================================================================================
 * template for comments and pingbacks.
 *
 * to override this walker in a child theme without modifying the comments template
 * simply create your own cake_comment(), and that function will be used instead.
 *
 * used as a callback by wp_list_comments() for displaying the comments.
 *
 */
if ( ! function_exists( 'cake_comment' ) ) :

function cake_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    
		<div class="commentWrapper" id="comment-<?php comment_ID(); ?>">
        
        <div class="authorInfo">
            <?php echo get_avatar( $comment, 65 ); ?>
		<?php edit_comment_link( __('<br />edit', 'cake'), ' ' ); ?>
        </div><!-- /authorInfo -->
               

        <div class="comment_text">
		
	        <h4 class="comment_author">
				<?php comment_author_link() ?>
				<span class="divider"></span>
	        </h4>
			
	        <small class="commentmetadata">
	            <span class="post_date"><?php comment_date('M. jS Y') ?> </span> 
	            <span class="post_time"> / <?php comment_time() ?></span> <br />
	        </small>
	
			<?php comment_text() ?> 
			
	        <small class="reply">
	        	<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	        </small>

           <?php if ($comment->comment_approved == '0') : ?> 
           	<p class="pending"><?php _e( 'Your comment is awaiting moderation.', 'cake' ); ?></p>
           <?php endif; ?>
            
        </div><!-- /commTxt -->
            
	<br class="clearfloat" />
	</div><!-- #comment-##  -->

	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p>
			<?php _e( 'Pingback:', 'cake' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'cake'), ' ' ); ?>
		</p>
	<?php
			break;
	endswitch;
}
endif;