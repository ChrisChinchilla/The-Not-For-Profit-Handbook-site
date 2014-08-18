<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

get_header(); ?>

<section class="main_content index_listing">


	<div class="intro_section">
		<div class="meta_content">

			<header class="pic_and_title">
				<h2>
					<?php _e('Oh no! <span class="search_term">Page not found.</span>', 'cake'); ?>
					<span class="divider"></span>
				</h2>

			</header>

			<div class="arrow_down"></div>

		</div>
	</div>



	<div class="inner">

		<section class="left_content">
			<article class="nothing_found hentry">
				<blockquote>
					<p>
						<i class="icon-bolt"></i>
						<?php _e('Sorry, about that.', 'cake'); ?>
					</p>
				</blockquote>
				<p>
					<a href="#" class="show_hide_search">
						<i class="icon-search"></i> <?php _e('Try searching for it', 'cake'); ?>
					</a>
				</p>
			</article>
		</section>

	</div>
</section>

<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php get_footer(); ?>
