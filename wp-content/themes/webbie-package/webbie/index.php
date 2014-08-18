<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

get_header(); ?>

<!-- start: body_content -->
<section class="body_content clearfix">


	<section class="main_content index_listing">
		<div class="inner">

			<section class="left_content">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/nothing-found'); ?>

			<?php endif; ?>
			</section>

		</div>
	</section>


</section>

<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php get_footer(); ?>
