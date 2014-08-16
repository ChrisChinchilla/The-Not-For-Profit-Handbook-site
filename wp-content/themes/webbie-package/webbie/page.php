<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

get_header(); ?>

<!-- start: body_content -->
<section class="body_content clearfix">

	<section class="main_content">
	
		<div class="inner">
	
			<?php if ( have_posts() ) : ?>
	
				<?php while ( have_posts() ) : the_post(); ?>
					<section class="left_content">
						<?php get_template_part( 'content', 'page' ); ?>
					</section>
				<?php endwhile; ?>
	
			<?php else : ?>
			
				<?php get_template_part( 'template-parts/nothing-found'); ?>>
			
			<?php endif; ?>
			
		</div>
	</section>

</section>

<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>