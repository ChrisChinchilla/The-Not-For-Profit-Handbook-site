<?php
// CUSTOM FIELDS FOR: FEATURES 
function cake_feature_metaboxes( $meta_boxes ) {
	global $prefix;
	$meta_boxes[] = array(
		'id' => 'additional_feature_info',
		'title' => __('Feature Image(s) - What\'s inside your book?', 'cake'),
		'pages' => array('features'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
				array(
					'name' => __('Feature Image #1', 'pvj'),
					'desc' => __('Upload an image to associate with this feature. If more than 1 image is uploaded, the feature images will be displayed as a slideshow.', 'cake'),
					'id' => $prefix . 'feature_image_1',
					'type' => 'file',
					'save_id' => false, // save ID using true
					'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
				),
				array(
					'name' => __('Feature Image #2', 'pvj'),
					'desc' => __('Upload an image to associate with this feature. If more than 1 image is uploaded, the feature images will be displayed as a slideshow.', 'cake'),
					'id' => $prefix . 'feature_image_2',
					'type' => 'file',
					'save_id' => false, // save ID using true
					'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
				),
				array(
					'name' => __('Feature Image #3', 'pvj'),
					'desc' => __('Upload an image to associate with this feature. If more than 1 image is uploaded, the feature images will be displayed as a slideshow.', 'cake'),
					'id' => $prefix . 'feature_image_3',
					'type' => 'file',
					'save_id' => false, // save ID using true
					'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
				),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cake_feature_metaboxes' );
?>