<?php
/*
 * ============================
 * CUSTOM POST TYPE - Features
 * ============================
*/
add_action('init', 'cake_features_register');
function cake_features_register() {
 
	$labels = array(
		'name' => __('Features', 'post type general name','cake'),
		'singular_name' => __('Features', 'post type singular name','cake'),
		'add_new' => __('Add New', 'Features','cake'),
		'add_new_item' => __('Add New Features','cake'),
		'edit_item' => __('Edit Features','cake'),
		'new_item' => __('New Features','cake'),
		'view_item' => __('View Features','cake'),
		'search_items' => __('Search Features','cake'),
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
		'supports' => array('title','editor')
	  ); 
 
	register_post_type( 'features' , $args );
}