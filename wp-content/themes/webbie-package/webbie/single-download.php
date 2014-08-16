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
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); setPostViews(get_the_ID()); ?>
				<section class="left_content">
				<?php get_template_part( 'content', 'download' ); ?>
				</section>
			<?php endwhile; ?>
	
		<?php else : ?>
		
			<?php get_template_part( 'template-parts/nothing-found'); ?>
		
		<?php endif; // end have_posts() check ?>	
	
	</section>
	
</section>
				
<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php 
// it's not necessary to have the sidebar on this page (template)
// nonetheless, we make it available at smaller screens just in case
get_sidebar('ebook'); ?>
<?php get_footer(); ?>	
