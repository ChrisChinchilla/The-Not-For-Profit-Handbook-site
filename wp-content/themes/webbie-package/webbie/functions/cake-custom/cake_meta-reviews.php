<?php
// CUSTOM FIELDS FOR: REVIEWS 
function cake_review_metaboxes( $meta_boxes ) {
	global $prefix;
	$meta_boxes[] = array(
		'id' => 'additional_review_info',
		'title' => __('Review Person Info', 'cake'),
		'pages' => array('reviews'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
				array(
					'name' => __('Reviewer\'s rating<br /> of your book', 'cake'),
					'desc' => __('Star rating given by this reviewer', 'cake'),
					'id' => $prefix . 'review_star_rating',
					'type' => 'radio',
					'options' => array(
						array('name' => __('&#10029;&#10029;&#10029;&#10029;&#10029; 5 star', 'cake'), 'value' => 'five_stars'),			
						array('name' => __('&#10029;&#10029;&#10029;&#10029;&#10025; 4 star', 'cake'), 'value' => 'four_stars'),
						array('name' => __('&#10029;&#10029;&#10029;&#10025;&#10025; 3 star', 'cake'), 'value' => 'three_stars'),
						array('name' => __('&#10029;&#10029;&#10025;&#10025;&#10025; 2 star', 'cake'), 'value' => 'two_stars'),
						array('name' => __('&#10029;&#10025;&#10025;&#10025;&#10025; 1 star', 'cake'), 'value' => 'one_star'),
						array('name' => __('no star rating', 'cake'), 'value' => 'no_star_rating'),
					)
				),		
				array(
					'name' => __('Reviewer\'s Name', 'cake'),
					'desc' => __('name of the reviewer', 'cake'),
					'id' => $prefix . 'reviewer_name',
					'type' => 'text_medium'
				),
				array(
					'name' => __('Reviewer\'s Title', 'cake'),
					'desc' => __('job title, position, etc. of the reviewer (if desired)', 'cake'),
					'id' => $prefix . 'reviewer_title',
					'type' => 'text_medium'
				),
				array(
					'name' => __('Link (URL)', 'cake'),
					'desc' => __('link to person\'s website (start with http://).', 'cake'),
					'id' => $prefix . 'reviewer_url',
					'type' => 'text_medium'
				),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cake_review_metaboxes' );
?>