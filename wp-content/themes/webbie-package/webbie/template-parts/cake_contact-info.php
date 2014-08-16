<?php
/**
 * Template part for displaying site-specific contact information
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in global $NHP_Options;
global $NHP_Options;
?>
<aside class="contact_info">

	<?php // heading		
	if ( $NHP_Options->get('contact_info_heading') ) { ?>
		<h3><?php esc_attr( $NHP_Options->show('contact_info_heading') ); ?></h3>
	<?php } ?>	
	
	<ul>

		<?php // email		
		if ( $NHP_Options->get('contact_email') ) { ?>
			<li><i class="icon-envelope"></i> <?php esc_attr( $NHP_Options->show('contact_email') ); ?></li>
		<?php } ?>	
		
		<?php // phone		
		if ( $NHP_Options->get('contact_phone') ) { ?>
			<li><i class="icon-phone"></i> <?php esc_attr( $NHP_Options->show('contact_phone') ); ?></li>
		<?php } ?>	
		
		
		<?php // fax		
		if ( $NHP_Options->get('contact_fax') ) { ?>
			<li><i class="icon-print"></i> <?php esc_attr( $NHP_Options->show('contact_fax') ); ?></li>
		<?php } ?>	
		
		
		<?php // address		
		if ( $NHP_Options->get('contact_address') ) { ?>
			<li><i class="icon-map-marker"></i> <?php esc_attr( $NHP_Options->show('contact_address') ); ?></li>
		<?php } ?>
		
	</ul>
	
	<?php get_template_part('template-parts/cake_social-links'); ?>
	
</aside>		
