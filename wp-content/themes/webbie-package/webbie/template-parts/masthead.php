<?php
/**
 * Template part for displaying the masthead/ main call to action area
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>

<div class="masthead_wrapper sunrise customizable_wrapper">
	<section class="masthead clearfix">
	
		<div class="right_col clearfix">
			<div class="inner">
			<?php if ( $NHP_Options->get('book_cover_image') ) { ?>
				<figure class="book_image">
					<img src="<?php esc_url( $NHP_Options->show('book_cover_image') ); ?>" />
				</figure>
			<?php } ?>
			</div>
		</div>
		
		<div class="left_col">
			<div class="inner">
				<?php get_template_part('template-parts/main-call-to-action'); ?>
			</div>
		</div>
			
	</section>
</div>