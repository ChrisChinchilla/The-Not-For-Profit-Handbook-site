<?php
/**
 * Template Name: Contributors
 *
 * The template for displaying the book and site's contributors.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;

get_header(); ?>

<!-- start: body_content -->
<section class="body_content clearfix">


	<section class="main_content">
	
		<div class="inner">
	
			<?php if ( have_posts() ) : ?>
	
				<?php while ( have_posts() ) : the_post(); ?>
					<section class="left_content">
						<?php get_template_part( 'content', 'page' ); ?>
						<?php get_template_part('template-parts/contributors-listing'); ?>
					</section>
				<?php endwhile; ?>
	
			<?php else : ?>
			
				<?php get_template_part( 'template-parts/nothing-found'); ?>>
			
			<?php endif; ?>
			
		</div>
	</section>

</section>


<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php get_sidebar('ebook'); ?>
<?php get_footer(); ?>

