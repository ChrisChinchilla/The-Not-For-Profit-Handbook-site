<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and header specific markup
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;

// load contact form settings
get_template_part( 'template-parts/cake_contact-setup');
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">


<?php if ( $NHP_Options->get('define_meta_description') && $NHP_Options->get('meta_description')  ) { ?>
	<meta name="description" content="<?php $NHP_Options->show('meta_description'); ?>" />
<?php } ?>


<?php if ( $NHP_Options->get('define_meta_keywords') && $NHP_Options->get('meta_keywords')  ) { ?>
	<meta name="keywords" content="<?php $NHP_Options->show('meta_keywords'); ?>" />
<?php } ?>


<?php if ( $NHP_Options->get('favicon') ) { ?>
	<link rel="shortcut icon" type="image/x-icon" href="<?php $NHP_Options->show('favicon'); ?>" />
<?php } ?>


	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php // custom css code
	if ( $NHP_Options->get('custom_css') ) { ?>
		<style type="text/css">
		<?php $NHP_Options->show('custom_css'); ?>
		</style>
	<?php } ?>


	<?php // custom header code
	if ( $NHP_Options->get('header_custom_code') ) { ?>
		<script type="text/javascript">
		<?php $NHP_Options->show('header_custom_code'); ?>
		</script>
	<?php } ?>

	<?php
	// this action hook loads our scripts and styles
	// on singular posts with comments, it loads the
	// comment-reply js as needed
	// to add your own js and styles, see functions.php
	wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<div id="outer-wrap">
<div id="inner-wrap">
<span class="off_canvas_overlay"></span>

<header class="header clearfix">

	<a class="nav-btn icon-indent-left" id="nav-open-btn" href="#nav">
		<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
	</a>


	<div class="nav_divider logo_divider"><div class="darker"></div><div class="lighter"></div></div>


	<a href="#" class="show_hide hide_sidebar" title="<?php _e('hide sidebar','cake'); ?>">
		<i class="icon-indent-left"></i>
	</a>

	<a href="#" class="show_hide show_sidebar hidden" title="<?php _e('show sidebar','cake'); ?>">
		<i class="icon-indent-right"></i>
	</a>


	<nav class="main_nav">
		<span class="split_darker nav_wrap"></span>
		<?php
		// if defined, insert the "main_menu" here
		if ( has_nav_menu( 'main_menu' ) ) { ?>
			<?php $defaults = array(
				'theme_location'  => 'main_menu',
				'menu'            => '',
				'container'       => false,
				'echo'            => true,
				'fallback_cb'     => false,
				'before'          => '',
				'after'           => '',
				'link_before'     => '<span class="split_darker"></span>',
				'link_after'      => '<span class="split_lighter"></span>',
				'items_wrap'      => '<ul id="%1$s" class="sf-menu"> %3$s</ul>',
				'depth'           => 0 );
			wp_nav_menu( $defaults );
			?>
		<?php }
		// if NOT defined, just list pages here
		else { ?>
			<ul class="sf-menu">
				<?php wp_list_pages('title_li=&depth=1'); ?>
			</ul>
		<?php } ?>
	</nav>


</header>


