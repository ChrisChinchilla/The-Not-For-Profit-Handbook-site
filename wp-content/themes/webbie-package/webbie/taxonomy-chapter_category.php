<?php
/**
 * The template for displaying Book (section) category listing.
 *
 * Used to display archive-type pages for section in a section_category.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

get_header(); ?>

<!-- start: body_content -->
<section class="body_content clearfix">

	<section class="main_content index_listing">


		<div class="intro_section">
			<div class="meta_content">

				<header class="pic_and_title">
					<h2>
						<span class="term_name">
							<i class="icon-folder-open"></i>
							<?php // _e('Category', 'cake');?>
						</span>
						<?php echo $term; ?>
						<span class="divider"></span>
					</h2>
				</header>

				<div class="arrow_down"></div>

				<?php if ( term_description() ) { ?>
				<div class="meta_details">
					<blockquote class="meta_pullquote">
						<?php echo term_description(); ?>
					</blockquote>
				</div>
				<?php } ?>

			</div>
		</div>




		<div class="inner">

			<section class="left_content">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'chapter' ); ?>
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
