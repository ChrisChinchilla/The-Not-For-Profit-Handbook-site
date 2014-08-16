<?php
/**
 * Template part for displaying the modal dialog
 * activate only on smaller size screens
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>

<div class="action_modal boyoyoing">

	<header class="modal_header">
		<div class="modal_title">
			<i class="icon-cogs"></i>
			<?php _e('Options', 'cake'); ?>
		</div>
		<span class="modal_close">
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<i class="icon-remove-sign"></i>
		</span>
	</header>
	
	<div class="modal_body">
		<div class="modal_inner">
			<ul class="modal_nav">
				<li>
					<a href="#" class="show_hide_meta" title="<?php _e('Category, tags, etc', 'cake');?>">
						<i class="icon-tags"></i>
						<?php _e('Categories &amp; Tags', 'cake');?>
					</a>
				</li>
		
				<li>
					<a href="#" class="show_hide_author" title="<?php _e('Author: ', 'cake'); ?><?php the_author_meta('display_name'); ?>">
						<i class="icon-user"></i>
						<?php //_e('About: ', 'cake'); ?>	<?php the_author_meta('display_name'); ?>
					</a>
				</li>
		
				<li>
					<a href="#" class="show_hide_comments">
						<i class="icon-comments"></i>
						<span class="comment_count"><?php comments_number( __('0 Comments','cake'), __('1 Comment', 'cake'), __('%', 'cake') ); ?></span>
					</a>
				</li>
			</ul>	
			
			<?php if ( !is_front_page() ) { ?>
			<div class="general_actions clearfix">
				<?php if ( $NHP_Options->get('show_hide_contact_form') ) {?>	
				<a href="#" class="show_hide_contact" title="<?php _e('Contact Form', 'cake');?>">
					<i class="icon-envelope-alt"></i>
				</a>
				<?php } ?>
	
	
				<?php if ( $NHP_Options->get('got_widget') && $NHP_Options->get('twitter_widget_code') ) { ?>
				<a href="#" class="show_hide_twitter" title="<?php _e('Twitter: ', 'cake'); ?>">
					<i class="icon-twitter"></i>
				</a>
				<?php } ?>
	
				<a href="#" class="show_hide_search" title="<?php _e('Search', 'cake');?>">
					<i class="icon-search"></i>
				</a>
			</div>
			<?php } ?>
			
				
		</div>
	</div>
	
	
</div>
<div class="modal_overlay"></div>
