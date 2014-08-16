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



<?php if (  $NHP_Options->get('purchase_page') || $NHP_Options->get('read_online_page') || $NHP_Options->get('direct_link_switch')  ) { ?>
<div class="sidebar_call_to_action clearfix">


	<?php if (  $NHP_Options->get('direct_link_switch') && $NHP_Options->get('direct_link_url') ) { ?>
	
	
		<a href="<?php $NHP_Options->show('direct_link_url'); ?>" class="action_link purchase_link forest_green" title="<?php esc_attr( $NHP_Options->show('purchase_link_text') ); ?>">
			<i class="icon-cloud-download"></i>
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<span class="link_text"><?php esc_attr( $NHP_Options->show('purchase_link_text') ); ?></span>
		</a>					

	<?php } else if (  $NHP_Options->get('purchase_page') && !$NHP_Options->get('direct_link_switch') ) { ?>

		<?php $purchase_page_permalink = get_permalink( $NHP_Options->get('purchase_page') ); ?>
		<a href="<?php echo $purchase_page_permalink; ?>" class="action_link purchase_link forest_green" title="<?php esc_attr( $NHP_Options->show('purchase_link_text') ); ?>">
			<i class="icon-cloud-download"></i>
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<span class="link_text"><?php esc_attr( $NHP_Options->show('purchase_link_text') ); ?></span>
		</a>

	<?php } ?>	
	
	
	<?php if ( $NHP_Options->get('read_online_page') ) { ?>
		<?php $read_online_page_permalink = get_permalink( $NHP_Options->get('read_online_page') ); ?>
		<a href="<?php echo $read_online_page_permalink; ?>" class="action_link read_online_link dull_orange" title="<?php esc_attr( $NHP_Options->show('read_online_link_text') ); ?>">
			<i class="icon-book"></i>
			<span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>
			<span class="link_text"><?php esc_attr( $NHP_Options->show('read_online_link_text') ); ?></span>
		</a>
	<?php } ?>	
	
	<?php if (  $NHP_Options->get('sample_download_link')  && $NHP_Options->get('sample_download_link_text') ) { ?>
	<br class="clearfloat" />
	<p class="sample_download ">
		<a href="<?php esc_url( $NHP_Options->show('sample_download_link') );?>" title="<?php esc_attr( $NHP_Options->show('sample_download_link_text') );?>">
			<i class="icon-download-alt"></i>
			<?php esc_attr( $NHP_Options->show('sample_download_link_text') );?>
		</a>
	</p>
	<?php } ?>	
</div>			
<?php } ?>
