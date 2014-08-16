<?php
/**
 * The template for displaying sections
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */
?>
<!-- start: section -->
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<section class="leed">


		<?php if ( has_post_thumbnail()) { ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'cake'); ?> <?php the_title(); ?>" class="post_thumb">
			<?php the_post_thumbnail('cake_medium'); ?>
		</a>
		<?php }?>			
	
	
		<header>
			<h2 class="entry_title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
		</header>
		
		<span class="divider"></span>
		
	
	</section>
	
	
	<?php if ( is_singular() ): ?>
		
		<section class="entry_content">
			<?php the_content(); ?>
		</section>
		
		<?php $args = array(
			// if this is a paginated section
			'before'           => '<span class="post_pagination">' . __('Pages:', 'cake'),
			'after'            => '</span>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'number',
			'nextpagelink'     => __('Next page', 'cake'),
			'previouspagelink' => __('Previous page', 'cake'),
			'pagelink'         => '%',
			'echo'             => 1 ); 
			wp_link_pages( $args );
		?>

	<?php else : ?>	
		<?php the_excerpt('Read more...'); ?>
	<?php endif; ?>
	
				
</article>				                                    
<!-- end: section -->
