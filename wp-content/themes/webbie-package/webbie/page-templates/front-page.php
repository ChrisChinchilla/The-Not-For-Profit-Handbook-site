<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays the styled home page.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;

get_header(); ?>

<?php get_template_part('template-parts/masthead'); ?>

<?php get_template_part('template-parts/features-listing'); ?>

<?php get_template_part('template-parts/reviews-listing'); ?>

<?php get_template_part('template-parts/contributors-listing'); ?>


<section class="call_to_action_block">
	<div class="section_content">
		<?php get_template_part('template-parts/main-call-to-action'); ?>
	</div>
</section>


<?php
// we don't need these on the front-page or
// when on a template page with no sidebar
// but to prevent the js error, we include them
// feel free to delete them though. no harm.
?>
<i id="nav-open-btn hidden"></i>
<i id="nav-close-btn hidden"></i>


<?php get_template_part( 'template-parts/bottom-toolbar'); ?>

<?php get_footer(); ?>

