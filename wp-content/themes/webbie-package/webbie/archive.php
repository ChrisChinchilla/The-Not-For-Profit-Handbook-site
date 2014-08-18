<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
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
						<?php
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'cake' ), '<span class="focus_term">' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'cake' ), '<span class="focus_term">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'cake' ) ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'cake' ), '<span class="focus_term">' . get_the_date( _x( 'Y', 'yearly archives date format', 'cake' ) ) . '</span>' );
							else :
								_e( 'Archives', 'cake' );
							endif;
						?>
						<span class="divider"></span>
					</h2>

				</header>

				<div class="arrow_down"></div>

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
