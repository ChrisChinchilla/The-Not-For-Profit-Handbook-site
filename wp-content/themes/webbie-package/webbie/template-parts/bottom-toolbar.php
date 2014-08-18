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

		<?php if ( $NHP_Options->get('show_hide_contact_form') ) { ?>
		<span class="action_block">
			<a href="#" class="show_hide_contact" title="<?php _e('Contact Form', 'cake');?>">
				<i class="icon-envelope-alt"></i>
			</a>
		</span>
		<?php } ?>

		<span class="action_block">
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<a href="https://twitter.com/ProjectAus" target="_blank">
				<i class="icon-twitter"></i>
			</a>
		</span>

		<span class="action_block">
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<a href="https://www.facebook.com/projectaustralia" target="_blank">
				<i class="icon-facebook"></i>
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
