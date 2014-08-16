<?php
/**
 * Template part for displaying the bottom toolbar. search, nav, etc
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>

<a href="#" class="close_right_content">
	<i class="icon-remove"></i> close
</a>



<?php get_template_part( 'template-parts/right-content'); ?>



<div class="bottom_toolbar">

    <section class="sidebar_toolbar">

		<div class="other_actions">
		
		
			<?php if ( $NHP_Options->get('show_hide_contact_form') ) { ?>	
			<span class="action_block">
				<a href="#" class="show_hide_contact" title="<?php _e('Contact Form', 'cake');?>">
					<i class="icon-envelope-alt"></i>
				</a>
			</span>
			<?php } ?>


			<?php if ( $NHP_Options->get('got_widget') && $NHP_Options->get('twitter_widget_code') ) { ?>
			<span class="action_block">
				<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
				<a href="#" class="show_hide_twitter" title="<?php _e('Twitter: ', 'cake'); ?>">
					<i class="icon-twitter"></i>
				</a>
			</span>
			<?php } ?>

			<span class="action_block">
				<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
				<a href="#" class="show_hide_search" title="<?php _e('Search', 'cake');?>">
					<i class="icon-search"></i>
				</a>
			</span>
	
			<?php if ( !is_front_page() ) { ?>
			<div class="nav_divider left_divider"><div class="darker"></div><div class="lighter"></div></div>
			<?php } ?>
			
		</div>
    
    
    </section>


	<?php if ( !is_page() && !is_404() ) { ?>
		<?php cake_single_symbol_nav('entry-nav'); ?>
	<?php } ?>
	
	<?php 
	// avail the meta only in
	// single post or page view
	if ( is_singular()) { ?>
	<div class="other_actions">
	

		<?php if ( !is_front_page() ) { ?>

		<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>

		<span class="action_block">
			<a href="#" class="show_hide_meta" title="<?php _e('Category, tags, etc', 'cake');?>">
				<i class="icon-tags"></i>
			</a>
		</span>

		<span class="action_block">
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<a href="#" class="show_hide_author" title="<?php _e('Author: ', 'cake'); ?><?php the_author_meta('display_name'); ?>">
				<i class="icon-user"></i>
			</a>
		</span>

		<span class="action_block">
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<a href="#" class="show_hide_comments">
				<i class="icon-comments"></i>
			</a>
		</span>
		<?php } ?>		
		
		
	</div>
	<?php if ( !is_front_page() ) { ?>
	<div class="other_actions small_screens">
		<span class="action_block">
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<a href="#" class="show_hide_options">
				<i class="icon-cogs"></i>
			</a>
		</span>
	</div>
	<?php } ?>
	
	<?php } else { ?>	
		<?php cake_index_nav_symbol_nav('index-nav'); ?>
	<?php } ?>
	
</div>
