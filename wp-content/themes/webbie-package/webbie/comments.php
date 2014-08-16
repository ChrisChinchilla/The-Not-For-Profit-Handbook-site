<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to cake_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */
?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'cake' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>


<div class="pre_comment_info clearfix">
	<?php if ( has_post_thumbnail()) { ?>
		<span class="precomment_image">
			<?php the_post_thumbnail('cake_regular'); ?>
		</span>
	<?php }?>			

	<h2>
		<?php the_title(); ?>
		<span class="divider"></span>
	</h2>
</div>



<?php if ( have_comments() ) : ?>
		
			<h2 id="comments-title" class="sectionTitle"><?php
			printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'cake' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h2>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'cake' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'cake' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use cake_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define cake_comment() and that will be used instead.
					 * See cake_comment() in inspiredthemes/functions.php for more.
					 */
					wp_list_comments( array( 'callback' => 'cake_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'cake' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'cake' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'cake' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php //comment_form(); ?>


<?php 
comment_form(
	array(
	'comment_notes_before' => '',
	'comment_notes_after' => ''
	)); 
?>

</div><!-- #comments -->
