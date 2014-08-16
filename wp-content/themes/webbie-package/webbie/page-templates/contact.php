<?php
/**
 * Template Name: Contact
 *
 * The template for displaying a contact page with no contact form.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;

get_header(); ?>

<?php get_template_part( 'template-parts/bottom-toolbar'); ?>
<?php get_sidebar(); ?>
<!-- start: body_content -->
<section class="body_content clearfix">

	
	<section class="main_content">
	
	
		<div class="inner">
	
			<?php if ( have_posts() ) : ?>
	
				<?php while ( have_posts() ) : the_post(); ?>
					<section class="left_content">
						<?php get_template_part( 'content', 'page' ); ?>
	
	
						<?php if ( $NHP_Options->get('google_maps_link') ) { ?>
							<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php $NHP_Options->show('google_maps_link'); ?>&amp;output=embed"></iframe>
						<?php } ?>

	
						<?php if ( $NHP_Options->get('switch_contact_info')  ) :  ?>	
							<?php get_template_part('template-parts/cake_contact-info'); ?>
						<?php endif; ?>
						
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