<?php
/**
 * Template for displaying posts by a specific author
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
	
				<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>		
				<header class="pic_and_title">
				
					<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="author_avatar">
						<?php echo get_avatar( $curauth->ID, 250 ); ?>
					</a>
			
					<h2>
						<?php //_e('Articles by ', 'cake');?> 
						<?php echo $curauth->display_name; ?>
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
<?php get_sidebar(); ?>
<?php get_footer(); ?>