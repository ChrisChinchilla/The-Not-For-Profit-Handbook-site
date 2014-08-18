<?php
/**
 * Template for displaying single posts
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
				<?php while ( have_posts() ) : the_post(); setPostViews(get_the_ID()); ?>
					<section class="left_content">
					<?php get_template_part( 'content', get_post_format() ); ?>
					</section>
				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/nothing-found'); ?>

			<?php endif; // end have_posts() check ?>

		</div>
	</section>

</section>
<!-- end: body_content -->

<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php get_template_part('footer'); ?>
