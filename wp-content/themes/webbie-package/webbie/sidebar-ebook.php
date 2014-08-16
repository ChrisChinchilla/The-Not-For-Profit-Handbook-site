<?php
/**
 * The sidebar containing ebook content navigation, etc.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>

<section class="sidebar nano"  id="nav">

	
	<div class="overthrow content">
	
		<a class="close-btn  icon-indent-right" id="nav-close-btn" href="#top"></a>

	
		<?php if ( $NHP_Options->get('switch_sidebar_book_info') ) { ?>
			<?php get_template_part('template-parts/sidebar-call-to-action'); ?>	
		<?php } ?>			

		
		
		
		<?php if ( !dynamic_sidebar('eBook Sidebar') ) : ?>

		<aside>

			<nav class="toc_nav">
				<ul class="secondary_nav">
					<?php wp_reset_query(); ?>
					<?php
					 // if there are any, we'll output your SECTIONS here
					  if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } 
						elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } 
						else { $paged = 1; }
					
					  $myposts = array(
					    'post_type' => 'chapters',
					    'posts_per_page' => -1,
					    'orderby' => 'ID',
					    'order' => 'DESC',
					    'paged'=> $paged
					
					  );
					  query_posts($myposts);
					?>
			
		
					<?php $postid = get_the_ID(); 
					if ( have_posts() ) : while ( have_posts() ) : the_post(); 
					$current_id = $post->ID;
					$current_page_item = ($postid == $current_id) ? "current_page_item" : ""; ?>	
						<li <?php post_class( $current_page_item . ' clearfix' ); ?> >
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="clearfix">
							
								<?php if ( has_post_thumbnail()) { ?>
									<span class="img_wrap">
										<?php the_post_thumbnail('thumbnail'); ?>
									</span>
								<?php }?>			
							
								<span class="toc_el_title">
									<?php the_title(); ?>
								</span>
								
								<small class="toc_meta clearfix">
									<span class="divider"></span>
									<?php _e('by:', 'cake'); ?> <strong><?php the_author(); ?></strong><br /> 
									<?php the_time('F j, Y') ?>
									<?php // comments_number( '0', '1', '% coments' ); ?>
								</small>
								
							</a>
						</li>
					<?php endwhile; endif; wp_reset_query();?>
				</ul>
			</nav>
			
		</aside>

		<?php endif; ?>
		
		
		

	</div>
</section>	
