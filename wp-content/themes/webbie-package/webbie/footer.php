<?php
/**
 * The Footer for our theme.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

// fetch theme options stored in $NHP_Options
global $NHP_Options;
?>


</div>
<!--/#inner-wrap-->
</div>
<!--/#outer-wrap-->

<?php get_template_part('template-parts/cake_modal'); ?>

<?php // custom footer code		
if ( $NHP_Options->get('footer_custom_code') ) { ?>
	<script type="text/javascript">
	<?php $NHP_Options->show('footer_custom_code'); ?>
	</script>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>