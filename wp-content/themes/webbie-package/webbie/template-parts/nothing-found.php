<?php
/**
 * Template part for displaying the "nothing found" text
 *
 * There is also a 404 page that handles the page not found errors
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

?>

<article class="nothing_found hentry">
	<blockquote>
		<p>
			<i class="icon-bolt"></i>
			<?php _e('Sorry, nothing found.', 'cake'); ?>
		</p>
	</blockquote>
	<p>
		<a href="#" class="show_hide_search">
			<i class="icon-search"></i> <?php _e('Try searching for it', 'cake'); ?>
		</a>
	</p>
</article>