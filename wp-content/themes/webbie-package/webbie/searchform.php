<?php
/**
 * The Cake search form.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */
?>

<form class="search_form" action="<?php echo home_url( '/' ); ?>" method="get">
    <input class="input" type="text" id="search_field" value="<?php the_search_query(); ?>" name="s" />
    <input class="submit hidden" type="submit" value="<?php _e('Search','cake'); ?>" />
</form>