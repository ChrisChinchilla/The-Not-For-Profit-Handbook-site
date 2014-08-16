<?php
/**
 * Template part for displaying site-specific social links
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>


<aside class="social_links">

	<?php if ( $NHP_Options->get('social_twitter_link') ) :  ?>
		<a href="<?php esc_url( $NHP_Options->show('social_twitter_link') ); ?>" title="<?php _e('Twitter','cake'); ?>">
			<i class="icon-twitter"></i>
		</a>
	<?php endif; ?>
	
	<?php if ( $NHP_Options->get('social_facebook_link') ) :  ?>
		<a href="<?php esc_url( $NHP_Options->show('social_facebook_link') ); ?>" title="<?php _e('Facebook','cake'); ?>">
			<i class="icon-facebook"></i>
		</a>
	<?php endif; ?>
	
	<?php if ( $NHP_Options->get('social_instagram_link') ) :  ?>
		<a href="<?php esc_url( $NHP_Options->show('social_instagram_link') ); ?>" title="<?php _e('Instagram','cake'); ?>">
			<i class="icon-instagram"></i>
		</a>
	<?php endif; ?>

	<?php if ( $NHP_Options->get('social_pinterest_link') ) :  ?>
		<a href="<?php esc_url( $NHP_Options->show('social_pinterest_link') ); ?>" title="<?php _e('Pinterest','cake'); ?>">
			<i class="icon-pinterest"></i>
		</a>
	<?php endif; ?>

	<?php if ( $NHP_Options->get('social_linkedin_link') ) :  ?>
		<a href="<?php esc_url( $NHP_Options->show('social_linkedin_link') ); ?>" title="<?php _e('LinkedIn','cake'); ?>">
			<i class="icon-linkedin"></i>
		</a>
	<?php endif; ?>

	<?php if ( $NHP_Options->get('social_flickr_link') ) :  ?>
		<a href="<?php esc_url( $NHP_Options->show('social_flickr_link') ); ?>" title="<?php _e('Flickr','cake'); ?>">
			<i class="icon-flickr"></i>
		</a>
	<?php endif; ?>
	
</aside>		
