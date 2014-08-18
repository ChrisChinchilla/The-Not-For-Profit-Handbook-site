<?php
/**
 * The template for displaying tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
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
							<i class="icon-tags"></i>
						</span>
						<?php printf( __( 'Articles tagged: %s', 'cake' ), '<span class="focus_term">' . single_tag_title( '', false ) . '</span>' ); ?>
						<span class="divider"></span>

					</h2>
				</header>

				<div class="arrow_down"></div>

				<?php if ( tag_description() ) { ?>
				<div class="meta_details">
					<blockquote class="meta_pullquote">
						<?php echo tag_description(); ?>
					</blockquote>
				</div>
				<?php } ?>

			</div>
		</div>




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
