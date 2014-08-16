<?php
/**
 * The template for displaying regular post
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
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cake' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="post_thumb">
			<?php the_post_thumbnail('cake_regular'); ?>
		</a>
		<?php }?>			
	
	
		<header>
			<h2 class="entry_title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cake' ), the_title_attribute( 'echo=0' ) ) ); ?>">
					<?php the_title(); ?>
					<small class="sub_sub_title">
						<i class="icon-file-alt"></i>						
						<?php the_time('F j, Y') ?>
					</small>
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
