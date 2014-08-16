<?php
/**
 * The template for displaying asides
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */
?>
<!-- start: section -->
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<?php if ( is_singular() ): ?>
		
		<section class="entry_content">

			<h2 class="quote_title">
				<?php if ( has_post_thumbnail()) { ?>
				<span class="post_thumb">
					<?php the_post_thumbnail('thumbnail'); ?>
				</span>
				<?php }?>			

				<?php the_title(); ?>	
				<small class="sub_sub_title">
					<i class="icon-bolt"></i>						
					<?php the_time('F j, Y') ?>
				</small>

				<br class="clearfloat" />
	
				<span class="divider"></span>

			</h2>
	

			<blockquote class="quote_excerpt">
				<?php the_content( ); ?>
			</blockquote>


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

		
		<h2 class="quote_title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cake' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="clearfix">
				<?php if ( has_post_thumbnail()) { ?>
				<span class="post_thumb">
					<?php the_post_thumbnail('thumbnail'); ?>
				</span>
				<?php }?>			

				<?php the_title(); ?>	
				<small class="sub_sub_title">
					<i class="icon-bolt"></i>						
					<?php the_time('F j, Y') ?>
				</small>
			</a>

			<span class="divider"></span>

		</h2>

		
		
		<?php the_excerpt('Read more...'); ?>

	<?php endif; ?>
	
				
</article>				                                    
<!-- end: section -->
