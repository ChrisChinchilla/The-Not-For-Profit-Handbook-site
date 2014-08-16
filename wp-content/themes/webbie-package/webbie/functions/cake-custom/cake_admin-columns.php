<?php
/*
Plugin Name: Custom Taxonomy Columns
Description: Give custom taxonomies a column on the manage posts admin page. 
Author: _FindingSimple
Author URI: http://findingsimple.com/
Version: 1.1
*/


/**
 * Add a column to the manage posts page for each registered custom taxonomy. 
 **/
function rt_add_columns( $columns, $post_type ) {

	$taxonomy_names = get_object_taxonomies( 'chapters' );

	foreach ( $taxonomy_names as $taxonomy_name ) {

		$taxonomy = get_taxonomy( $taxonomy_name );

		if ( $taxonomy->_builtin || !in_array( $post_type, $taxonomy->object_type ) )
			continue;

		$columns[ $taxonomy_name ] = $taxonomy->label;
	}

	return $columns;
}
add_filter( 'manage_posts_columns', 'rt_add_columns', 10, 2 ); //Filter out Post Columns with 2 custom columns


/**
 * Add the terms assigned to a post for each registered custom taxonomy to the 
 * custom column on the manage posts page.
 **/
function rt_column_contents( $column_name, $post_id ) {
	global $wpdb, $post_type;
	
	$type = ''; //set blank post type
	
	if ($post_type != 'chapters') {
		$type = 'post_type=' . $post_type . '&';
	}

	$taxonomy_names = get_object_taxonomies( 'chapters' );

	foreach ( $taxonomy_names as $taxonomy_name ) {
		$taxonomy = get_taxonomy( $taxonomy_name );

		if ( $taxonomy->_builtin || $column_name != $taxonomy_name )
			continue;

		$terms = get_the_terms( $post_id, $taxonomy_name ); //lang is the first custom taxonomy slug
		if ( !empty( $terms ) ) {
			$out = array();
			foreach ( $terms as $term )
				$termlist[] = "<a href='edit.php?" . $type . $taxonomy->rewrite['slug']."=$term->slug&post_type=chapters'> " . esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, $taxonomy_name, 'display' ) ) . "</a>";
			echo join( ', ', $termlist );
		} else {
			printf( __( 'No %s.', 'cake'), $taxonomy->label );
		}
	}
}
add_action( 'manage_posts_custom_column', 'rt_column_contents', 10, 2 );



// GET FEATURED IMAGE
function cake_get_featured_image($post_ID){
 $post_thumbnail_id = get_post_thumbnail_id($post_ID);
 if ($post_thumbnail_id){
  $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
  return $post_thumbnail_img[0];
 }
}

// ADD NEW COLUMN
function cake_columns_head($defaults) {
 $defaults['featured_image'] = __('Featured Image', 'cake');
 return $defaults;
}

// SHOW INFO IN THE NEW COLUMN
function cake_columns_content($column_name, $post_ID) {
 if ($column_name == 'featured_image') {
  $post_featured_image = cake_get_featured_image($post_ID);
  if ($post_featured_image){
   echo '<img src="' . $post_featured_image . '" width="80" />'; 
  } else {
  	echo '<img src="' .  get_template_directory_uri() . '/screenshot.png" width="80" />';
  }
 }
}

add_filter('manage_posts_columns', 'cake_columns_head');
add_filter('manage_posts_custom_column', 'cake_columns_content', 10, 2);

// function cake_columns_content_with_default_image($column_name, $post_ID) {
//  // Create a default.jpg image and save it in the images directory of your active theme.
// 
//  if ($column_name == 'featured_image') {
//   $post_featured_image = cake_get_featured_image($post_ID);
//   if ($post_featured_image){
//    // HAS A FEATURED IMAGE
//    echo '<img src="' . $post_featured_image . '" width="80" /> ';
//    } else {
//     // NO FEATURED IMAGE, USE THE DEFAULT ONE
//     echo '<img src="' .  get_template_directory_uri() . '/screenshot.png" width="80" /> '; 
//    }
//   }
// }
