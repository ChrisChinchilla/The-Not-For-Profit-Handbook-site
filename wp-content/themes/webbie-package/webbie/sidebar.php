<?php
/**
 * The sidebar for blog pages
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>

<section class="sidebar nano" id="nav">

	<div class="overthrow content">


		<a class="close-btn  icon-indent-right" id="nav-close-btn" href="#top"></a>

		<?php if ( $NHP_Options->get('switch_sidebar_book_info') ) { ?>
			<?php get_template_part('template-parts/sidebar-call-to-action'); ?>
		<?php } ?>





	<?php if ( !dynamic_sidebar('Sidebar Block #1') ) : ?>

		<?php if ( $NHP_Options->get('switch_popular_articles') ) { ?>
		<aside>
			<h3 class="section_title">
				<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
				<i class="icon-bolt"></i>
				<?php //_e('Most Viewed', 'cake');?>
				<?php _e('Popular Articles', 'cake');?>
			</h3>
			<div class="section_content">
				<nav class="toc_nav">
					<ul class="secondary_nav">
						<?php
							$postid = get_the_ID();
							$count =  $NHP_Options->get('popular_articles_count');
							query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page='. $count);
							if (have_posts()) : while (have_posts()) : the_post();

							// set current_page_item class
							$current_id = $post->ID;
							$current_page_item = ($postid == $current_id) ? "current_page_item" : "";
						?>

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
									<?php the_time('F j, Y') ?> /
									<i class="icon-comments"></i><?php comments_number( '0', '1', '%' ); ?>
								</small>

							</a>
						</li>
						<?php endwhile; endif; wp_reset_query(); ?>
					</ul>
				</nav>
			</div>
		</aside>
		<?php } ?>

	<?php endif; ?>







	<?php if ( !dynamic_sidebar('Sidebar Block #2') ) : ?>

		<?php if ( $NHP_Options->get('switch_recent_articles') ) { ?>
		<aside>
			<h3 class="section_title">
				<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
				<i class="icon-calendar"></i>
				<?php _e('Recent Articles', 'cake');?>
			</h3>
			<div class="section_content">
		        <nav class="toc_nav">
					<ul class="secondary_nav">
						<?php
						$postid = get_the_ID();
						$count = $NHP_Options->get('recent_articles_count');
 						$my_query = new WP_Query('posts_per_page='.$count);
						while ($my_query->have_posts()) : $my_query->the_post();

						// set current_page_item class
						$current_id = $post->ID;
						$current_page_item = ($postid == $current_id) ? "current_page_item" : "";
						?>

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
									<?php the_time('F j, Y') ?> /
									<i class="icon-comments"></i><?php comments_number( '0', '1', '%' ); ?>
								</small>

							</a>
						</li>
						<?php endwhile;  wp_reset_query(); ?>
					</ul>
				</nav>
			</div>
		</aside>
		<?php } ?>

	<?php endif; ?>





	<?php if ( !dynamic_sidebar('Sidebar Block #3') ) : ?>

		<?php if ( $NHP_Options->get('switch_recent_comments') ) { ?>
		<aside>
			<h3 class="section_title">
				<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
				<i class="icon-comments"></i>
				<?php _e('Recent Comments', 'cake');?>
			</h3>
			<div class="section_content">
				<?php cake_recent_comments($NHP_Options->get('recent_comments_count'));?>
			</div>
		</aside>
		<?php } ?>

	<?php endif; ?>






	<?php if ( !dynamic_sidebar('Sidebar Block #4') ) : ?>

	<?php endif; ?>





	<?php if ( !dynamic_sidebar('Sidebar Block #5') ) : ?>

		<aside>
			<h3 class="section_title">
				<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
				<i class="icon-suitcase"></i>
				<?php _e('Archives', 'cake');?>
			</h3>
			<div class="section_content">
			    <ul class="archive-monthly content_block">
			    	<?php wp_get_archives('type=monthly'); ?>
			    </ul>
		    </div>
		</aside>

	<?php endif; ?>





	<?php if ( !dynamic_sidebar('Sidebar Block #6') ) : ?>

		<?php if ( function_exists('wp_tag_cloud') ) : ?>
		<aside>
			<h3 class="section_title">
				<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
				<i class="icon-tags"></i>
				<?php _e('Tags', 'cake');?>
			</h3>
			<div class="section_content">
				<?php wp_tag_cloud('smallest=11&largest=11&format=list'); ?>
			</div>
		</aside>
		<?php endif; ?>

	<?php endif; ?>


	</div>
</section>
