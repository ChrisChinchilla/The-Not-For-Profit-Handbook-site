<?php
/**
 * The template for displaying dowloads (e.g. when using the Easy Digital Downloads Plugin)
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

?>


<div <?php post_class(' masthead_wrapper '); ?> id="download-<?php the_ID(); ?>">
	<section class="masthead clearfix">
		
		
		<div class="right_col clearfix">
			<div class="inner">
			<?php if ( has_post_thumbnail()) { ?>
				<figure class="book_image">
					<?php the_post_thumbnail('full'); ?>
				</figure>
			<?php }?>
			</div>
		</div>
	
	
		<div class="left_col">
			<div class="inner">
	
				<hgroup>
					<h1 class="book_title"><?php the_title();?></h1>
				</hgroup>
				
				
				<span class="divider"></span>
				<div class="book_synopsis"><?php the_content(); ?></div>
			
			</div>
		</div>
	
	
			
	</section>
</div>