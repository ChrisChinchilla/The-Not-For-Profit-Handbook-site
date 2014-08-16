<?php
/**
 * Template part for displaying the reviews
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

?>


<?php
  wp_reset_query();
  if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } 
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } 
	else { $paged = 1; }

  $myposts = array(
    'post_type' => 'reviews',
    'posts_per_page' => -1,
    'orderby' => 'ID',
    'order' => 'DESC',
    'paged'=> $paged

  );
  query_posts($myposts);
?>
	


<?php if ( have_posts() ) : ?>
<section class="reviews_block clearfix">
	<div class="flexslider full_width_slider clearfix">
	    <ul class="slides">
	    
		<?php while ( have_posts() ) : the_post(); ?>	
		
			<li <?php post_class( 'clearfix'); ?> >
				<div class="section_content">

					<?php if ( has_post_thumbnail()) { ?>
						<span class="reviewer_pic"><?php the_post_thumbnail('thumbnail'); ?></span>
					<?php }?>			
				
					<div class="reviewer_info">
						<?php if(get_post_meta($post->ID, '_cake_reviewer_name' , true)){ ?>
							<h2 class="person_name"><?php echo esc_attr( get_post_meta($post->ID, '_cake_reviewer_name' , true) );?></h2>					
						<?php } ?>
						<?php if(get_post_meta($post->ID, '_cake_reviewer_title' , true)){ ?>
							<p class="person_title"><?php echo esc_attr( get_post_meta($post->ID, '_cake_reviewer_title' , true) );?></p>					
						<?php } ?>
						<?php if(get_post_meta($post->ID, '_cake_reviewer_url' , true)){ ?>
							<p class="person_title"><?php echo esc_url( get_post_meta($post->ID, '_cake_reviewer_url' , true) );?></p>					
						<?php } ?>
					</div>
					
					<div class="review_rating">
						<?php if(get_post_meta($post->ID, '_cake_review_star_rating' , true) == 'one_star'){ ?>
							&#10029;&#10025;&#10025;&#10025;&#10025;
						<?php } elseif(get_post_meta($post->ID, '_cake_review_star_rating' , true) == 'two_stars'){ ?>
							&#10029;&#10029;&#10025;&#10025;&#10025;
						<?php } elseif(get_post_meta($post->ID, '_cake_review_star_rating' , true) == 'three_stars'){ ?>
							&#10029;&#10029;&#10029;&#10025;&#10025;
						<?php } elseif(get_post_meta($post->ID, '_cake_review_star_rating' , true) == 'four_stars'){ ?>
							&#10029;&#10029;&#10029;&#10029;&#10025;
						<?php } else { ?>
							&#10029;&#10029;&#10029;&#10029;&#10029;
						<?php } ?>
					</div>
					
					
					<div class="review_content">
						<blockquote class="review_pullquote">
							<p><?php the_title(); ?></p>
						</blockquote>
						<?php the_content(); ?>
					</div>

				</div>
			</li>
		<?php endwhile; ?>
		</ul>
		<br class="clearfloat" />
	</div>

</section>
<?php endif; wp_reset_query(); ?>