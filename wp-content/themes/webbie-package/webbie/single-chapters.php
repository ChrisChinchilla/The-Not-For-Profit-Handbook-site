<?php
/**
 * Template for displaying single sections
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
						<?php get_template_part( 'content', 'chapter' ); ?>
					</section>
				<?php endwhile; ?>

				<?php cake_index_nav( 'content-nav' ); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/nothing-found'); ?>

			<?php endif; // end have_posts() check ?>

		</div>
	</section>


</section>

<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php get_footer(); ?>
