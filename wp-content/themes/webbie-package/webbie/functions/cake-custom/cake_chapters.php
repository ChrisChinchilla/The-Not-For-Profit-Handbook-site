<?php
/*
 * ============================
 * CUSTOM POST TYPE - Chapters
 * ============================
*/
add_action('init', 'cake_chapter_register');
function cake_chapter_register() {
 
	$labels = array(
		'name' => __('Chapters', 'post type general name','cake'),
		'singular_name' => __('Chapter', 'post type singular name','cake'),
		'add_new' => __('Add New', 'Chapter','cake'),
		'add_new_item' => __('Add New Chapter','cake'),
		'edit_item' => __('Edit Chapter','cake'),
		'new_item' => __('New Chapter','cake'),
		'view_item' => __('View Chapter','cake'),
		'search_items' => __('Search Chapters','cake'),
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
		//'menu_icon' => get_stylesheet_directory_uri() . '/images/framework/book.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 4,
		'supports' => array('title','editor', 'thumbnail','comments','author','tags')
	  ); 
 
	register_post_type( 'chapters' , $args );
}
// custom TAXONOMIES for Chapters
add_action( 'init', 'chapter_taxonomy' );
function chapter_taxonomy() {
   register_taxonomy(
	'chapter_category',
	'chapters',
		array(
			'hierarchical' => true,
			'label' => __('Categories', 'cake'),
			'menu_position' => 1,
			'query_var' => true,
			'rewrite' => array('slug' => 'chapter_category')
		)
	);
}

// add tags and categories for Chapters
add_action('init', 'cake_tag_boxes');
function cake_tag_boxes() {
   	// register_taxonomy_for_object_type('category', 'chapters');
    //register_taxonomy_for_object_type('post_tag', 'chapters');
}
add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name', 'cake' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name', 'cake' ),
    'search_items' =>  __( 'Search Tags', 'cake' ),
    'popular_items' => __( 'Popular Tags', 'cake' ),
    'all_items' => __( 'All Tags', 'cake' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag', 'cake' ), 
    'update_item' => __( 'Update Tag', 'cake' ),
    'add_new_item' => __( 'Add New Tag', 'cake' ),
    'new_item_name' => __( 'New Tag Name', 'cake' ),
    'separate_items_with_commas' => __( 'Separate tags with commas', 'cake' ),
    'add_or_remove_items' => __( 'Add or remove tags', 'cake' ),
    'choose_from_most_used' => __( 'Choose from the most used tags', 'cake' ),
    'menu_name' => __( 'Tags', 'cake' ),
  ); 

  register_taxonomy('chapter_tag','chapters',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'chapter_tag' ),
  ));
}


/*
 * =======================================================================================================================================
 * INCLUDE CATEGORY NAMES TO BOOK post_class()
 * =======================================================================================================================================
 * add category nicenames in body and post class
 * http://davebonds.com/blog/add-css-classes-for-custom-taxonomies-in-wordpress.html
*/
add_filter( 'post_class', 'cake_post_class', 10, 3 );
if( !function_exists( 'cake_post_class' ) ) {
    function cake_post_class( $classes, $class, $ID ) {
        $taxonomy = 'chapter_category';
        $terms = get_the_terms( (int) $ID, $taxonomy );
        if( !empty( $terms ) ) {
            foreach( (array) $terms as $order => $term ) {
                if( !in_array( $term->slug, $classes ) ) {
                    $classes[] = $term->slug;
                }
            }
        }
        return $classes;
    }
    
}
