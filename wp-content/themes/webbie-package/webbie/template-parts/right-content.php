<?php
/**
 * Template part for displaying the off-canvas meta info of the current entry
 *
 * The contents of this template are called up by the bottom footer action links
 * which are defined in the bottom-toolbar.php file
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>

<?php 
// avail the comments only in
// single post or page view
if ( is_singular() ) { ?>
<section class="right_content nano" id="post_comments">
	<div class="content overthrow">
		<?php comments_template( '', true ); ?>
	</div>
</section>
<?php } ?>
		
		
		
<?php 
// avail the author info only in
// single post or page view
if ( is_singular() && !is_front_page() ) { ?>
<section class="right_content nano" id="post_author_meta">
	<div class="content overthrow">
	
		<div class="meta_content">
		
			<header class="pic_and_title">
			
				<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="author_avatar post_thumb">
					<?php echo get_avatar( get_the_author_meta('ID'), 250 ); ?>
				</a>

				<h2>
					<?php the_author_meta('display_name'); ?>

					<span class="divider"></span>

					<span class="author_links">
						<?php if ( get_the_author_meta('user_url') ) :  ?>
							<a href="<?php echo get_the_author_meta('user_url'); ?>" title="<?php _e('Website','cake'); ?>">
								<i class="icon-globe"></i>
							</a>
						<?php endif; ?>
						
						
						<?php if ( get_the_author_meta('twitter') ) :  ?>
							<a href="<?php the_author_meta('twitter'); ?>" title="<?php _e('Twitter','cake'); ?>">
								<i class="icon-twitter"></i>
							</a>
						<?php endif; ?>
						
						<?php if ( get_the_author_meta('facebook') ) :  ?>
							<a href="<?php echo the_author_meta('facebook'); ?>" title="<?php _e('Facebook','cake'); ?>">
								<i class="icon-facebook"></i>
							</a>
						<?php endif; ?>
						
						<?php if ( get_the_author_meta('instagram') ) :  ?>
							<a href="<?php echo the_author_meta('instagram'); ?>" title="<?php _e('Instagram','cake'); ?>">
								<i class="icon-instagram"></i>
							</a>
						<?php endif; ?>
				
						<?php if ( get_the_author_meta('pinterest') ) :  ?>
							<a href="<?php echo the_author_meta('pinterest'); ?>" title="<?php _e('Pinterest','cake'); ?>">
								<i class="icon-pinterest"></i>
							</a>
						<?php endif; ?>
				
						<?php if ( get_the_author_meta('linkedin') ) :  ?>
							<a href="<?php echo the_author_meta('linkedin'); ?>" title="<?php _e('LinkedIn','cake'); ?>">
								<i class="icon-linkedin"></i>
							</a>
						<?php endif; ?>
				
						<?php if ( get_the_author_meta('flickr') ) :  ?>
							<a href="<?php echo the_author_meta('flickr'); ?>" title="<?php _e('Flickr','cake'); ?>">
								<i class="icon-flickr"></i>
							</a>
						<?php endif; ?>
					</span>
					
					<span class="divider"></span>
					
				</h2>
				
			</header>
			
			<div class="meta_details">
				<blockquote class="meta_pullquote">
					<?php the_author_meta('description'); ?>
				</blockquote>						
			</div>

		</div>
	</div>
</section>
<?php } ?>



<?php 
// avail the post meta info only in
// single post or page view
if ( is_singular() && !is_front_page() ) { ?>
<section class="right_content nano" id="post_meta_content">
	<div class="content overthrow">
	
		<div class="meta_content">
		
			<header class="pic_and_title">
				<?php if ( has_post_thumbnail()) { ?>
				<span class="post_thumb">
					<?php the_post_thumbnail('cake_regular'); ?>
				</span>
				<?php } ?>

				<h2>
					<?php the_title(); ?>
					<small class="sub_sub_title">
						<?php the_time('F j, Y') ?>
					</small>
					<span class="divider"></span>
				</h2>
				
			
			</header>
			
			
			
			
			<div class="meta_details">
				<blockquote class="meta_pullquote">
				
					<?php
					// meta info ( terms: tags & categories ) for book sections
					if ( is_object_in_term( $post->ID, 'chapter_category' ) ) { ?>
					
						<?php 
							// section categories
							$terms = get_the_terms($post->ID, 'chapter_category');
							if (is_array($terms)) {
								echo '<p><span class="title_meta"><i class="icon-folder-open"></i><br/> ';
								foreach($terms as $term){
									echo ' <a href="'.get_term_link($term->slug, 'chapter_category').'" >'. $term->name . '</a> . '; 
								} 
								echo '</span></p>';
							}
						?>
						
						<?php 
							// section tags
							$terms = get_the_terms($post->ID, 'chapter_tag');
							if (is_array($terms)) {
								echo '<p><span class="title_meta"><i class="icon-tags"></i><br/> ';
								foreach($terms as $term){
									echo ' <a href="'.get_term_link($term->slug, 'chapter_tag').'" >'. $term->name . '</a> . '; 
								} 
								echo '</span></p>';
							}
						?>
					
					<?php } else { // meta for all other entries ?>
					
						<p>
							<span class="title_meta">
								<i class="icon-folder-open"></i><br/>
								<?php the_category(' . '); ?>
							</span>
						</p>
	
						<?php the_tags('<p><i class="icon-tags"></i><br /> ', '. ', ' </p>'); ?>
					
					<?php } ?>			

				</blockquote>
			</div>

		</div>			


	</div>
</section>
<?php } ?>






<?php if ( $NHP_Options->get('got_widget') && $NHP_Options->get('twitter_widget_code') ) { ?>
<section class="right_content nano" id="twitter_widget">
	<div class="content overthrow">
	
		<div class="meta_content">
		
			<header class="pic_and_title">
				<h2>
					<span class="term_name">
						<i class="icon-twitter"></i>
					</span> 
					<?php esc_attr( $NHP_Options->show('twitter_widget_title') ); ?>
					<span class="divider"></span>
				</h2>
			</header>
			
			<div class="meta_details">
				<?php $NHP_Options->show('twitter_widget_code'); ?>
			</div>

		</div>
	</div>
</section>
<?php } ?>




<?php if ( $NHP_Options->get('show_hide_contact_form') ) { ?>
<section class="right_content nano" id="contact_form">
	<div class="content overthrow">
	
		<div class="meta_content">
		
			<header class="pic_and_title">
				<h2>
					<span class="term_name">
						<i class="icon-envelope"></i>
					</span> 
					<?php _e('Contact','cake'); ?>
					<span class="divider"></span>
				</h2>
			</header>
			
			<div class="meta_details">
				<?php get_template_part('template-parts/cake_contact-form') ?>
			</div>

		</div>
	</div>
</section>
<?php } ?>





<section class="right_content nano" id="right_search_content">
	<div class="content overthrow">
	
		<div class="meta_content">
		
			<header class="pic_and_title">
				<h2>
					<span class="term_name">
						<i class="icon-search"></i>
					</span> 
					<?php _e('Search','cake'); ?>
					<span class="divider"></span>
				</h2>
			</header>
			
			<div class="meta_details">
				<?php get_search_form( 'true' ); ?>
			</div>

		</div>
	</div>
</section>





