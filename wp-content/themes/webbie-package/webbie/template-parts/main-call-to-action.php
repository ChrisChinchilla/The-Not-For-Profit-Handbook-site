<?php
/**
 * Template part for displaying the masthead/ main call to action area
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>

<hgroup>
<?php if ( $NHP_Options->get('book_title') ) { ?>
	<h1 class="book_title"><?php $NHP_Options->show('book_title'); ?></h1>
<?php }else { ?>
	<h1 class="book_title"><?php bloginfo( 'name' ); ?></h1>
<?php } ?>

<?php if ( $NHP_Options->get('book_subtitle') ) { ?>
	<h2 class="book_subtitle">
		<?php esc_attr( $NHP_Options->show('book_subtitle') ); ?>
	</h2>
<?php } ?>
</hgroup>


<?php if ( $NHP_Options->get('book_synopsis') ) { ?>
	<span class="divider"></span>
	<div class="book_synopsis"><?php $NHP_Options->show('book_synopsis'); ?></div>
<?php } ?>
