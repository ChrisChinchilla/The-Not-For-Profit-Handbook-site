<?php
/*
 * ============================
 * CUSTOM POST TYPE - Reviews
 * ============================
*/
add_action('init', 'cake_reviews_register');
function cake_reviews_register() {
 
	$labels = array(
		'name' => __('Reviews', 'post type general name','cake'),
		'singular_name' => __('Review', 'post type singular name','cake'),
		'add_new' => __('Add New', 'Review','cake'),
		'add_new_item' => __('Add New Review','cake'),
		'edit_item' => __('Edit Review','cake'),
		'new_item' => __('New Review','cake'),
		'view_item' => __('View Review','cake'),
		'search_items' => __('Search Reviews','cake'),
		'not_found' =>  __('Nothing found','cake'),
		'not_found_in_trash' => __('Nothing found in Trash','cake'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 4,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'reviews' , $args );
}
