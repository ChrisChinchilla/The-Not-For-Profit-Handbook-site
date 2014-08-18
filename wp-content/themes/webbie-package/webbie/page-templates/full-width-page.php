<?php
/**
 * Template Name: Full Width
 *
 * The template for displaying a full width page.
 *
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in $smof_data
global $smof_data;

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

<?php
// we don't need these on a full-width page or
// when on a template page with no sidebar
// but to prevent the js error, we include them
// feel free to delete them though. no harm.
?>
<i id="nav-open-btn hidden"></i>
<i id="nav-close-btn hidden"></i>

<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php
// it's not necessary to have the sidebar on this page (template)
// nonetheless, we make it available (through CSS) at smaller screens just in case
<?php get_footer(); ?>
