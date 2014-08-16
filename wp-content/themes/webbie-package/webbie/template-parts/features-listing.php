<?php
/**
 * Template part for displaying features. i.e. what's inside the book
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
    'post_type' => 'features',
    'posts_per_page' => -1,
    'orderby' => 'ID',
    'order' => 'DESC',
    'paged'=> $paged

  );
  query_posts($myposts);
?>

<section class="features_block clearfix">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>	

	<section <?php post_class(' clearfix'); ?>>
	
	
	
		<section class="section_content clearfix">
		
			<div class="feature_media">
				<div class="inner">
				
	
	                <div class="flexslider">
	                    <ul class="slides">
	                    
	                    	<?php if(get_post_meta($post->ID, '_cake_feature_image_1' , true)){ ?>
	                        <li>
	                        	<img src="<?php echo esc_url( get_post_meta($post->ID, '_cake_feature_image_1' , true) );?>" alt="<?php echo esc_attr( sprintf( __( '%s', 'cake' ), the_title_attribute( 'echo=0' ) ) ); ?>" />
	                        </li>
							<?php } ?>
	                        
	                    	<?php if(get_post_meta($post->ID, '_cake_feature_image_2' , true)){ ?>
	                        <li>
	                        	<img src="<?php echo esc_url( get_post_meta($post->ID, '_cake_feature_image_2' , true) );?>" alt="<?php echo esc_attr( sprintf( __( '%s', 'cake' ), the_title_attribute( 'echo=0' ) ) ); ?>" />
	                        </li>
							<?php } ?>
	                        
	                    	<?php if(get_post_meta($post->ID, '_cake_feature_image_3' , true)){ ?>
	                        <li>
	                        	<img src="<?php echo esc_url( get_post_meta($post->ID, '_cake_feature_image_3' , true) );?>" alt="<?php echo esc_attr( sprintf( __( '%s', 'cake' ), the_title_attribute( 'echo=0' ) ) ); ?>" />
	                        </li>
							<?php } ?>
	                        
	                    </ul>
	                </div>
					
				</div>
			</div>
			
			


			<div class="feature_description">
				<div class="inner">
					<h2>
						<?php the_title(); ?>
						<span class="divider"></span>
					</h2>
					<?php the_content(); ?>
				</div>
			</div>
			
			
	
		</section>
		
		
	
	</section>

<?php endwhile; endif; wp_reset_query();?>
</section>
