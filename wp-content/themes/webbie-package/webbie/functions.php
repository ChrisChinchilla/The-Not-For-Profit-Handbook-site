<?php
/**
 * Cake framework - theme functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */




/*
 * =======================================================================================================================================
 * REQUIRE (NHP) PTIONS FRAMEWORK
 * =======================================================================================================================================
 */
get_template_part('nhp', 'options');




/*
 * =======================================================================================================================================
 * REDIRECT TO THEME OPTIONS
 * =======================================================================================================================================
 * once theme is activated,
 * redirect to the options page
*/
//if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php")
//	wp_redirect('themes.php?page=optionsframework');




/*
 * =======================================================================================================================================
 * CUSTOM MENU SUPPORT
 * =======================================================================================================================================
 */
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main_menu' => __( 'Main Menu', 'cake' ),
			'secondary_menu' =>  __( 'Secondary Menu', 'cake' ),
			)
		);
}




/*
 * =======================================================================================================================================
 * STYLE THE VISUAL EDITOR
 * =======================================================================================================================================
 * This function allows you to use custom CSS to style the WordPress TinyMCE visual editor with
 * editor-style.css for L-T-R languages and editor-style-rtl.css for Right-To-Left languages
 */
add_editor_style();




/*
 * =======================================================================================================================================
 * CUSTOM AVATAR SUPPORT
 * =======================================================================================================================================
 * This function tells WordPress that we want to add a new avatar called "Panda Bear" to the list of possible avatars for our site.
 * We're also placing this new image, named "avatar.png" in the "images > content" directory.
 */

if ( !function_exists('cake_avatar') ) {
	function cake_avatar( $avatar_defaults ) {
		$new_default_avatar = get_template_directory_uri() . '/images/content/avatar.png';
		$avatar_defaults[$new_default_avatar] = 'Panda Bear';
		return $avatar_defaults;
	}
	add_filter( 'avatar_defaults', 'cake_avatar' );
}



/*
 * =======================================================================================================================================
 * POST FORMATS
 * =======================================================================================================================================
 * with this function we add post formats and define which (of the 9 available) we'll be taking advantage of
 * the "standard" post format is the default if none is selected
 */
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-formats', array( 'aside', 'quote', 'gallery' ) );
}




/*
 * =======================================================================================================================================
 * POST AND PAGE IMAGE THUMBNAILING
 * =======================================================================================================================================
 * This functions adds Featured Image function to our theme. Defines the sizes
 */

if ( function_exists( 'add_theme_support' ) ) {

	add_theme_support( 'post-thumbnails' );

	// regular thumbnails
	add_image_size( 'cake_regular', 400, 400, true );

	// medium thumbnails
	add_image_size( 'cake_medium', 650, 650, true );

	// large size thumbnails
	add_image_size( 'cake_large', 960, '' );



	/*
	 * =======================================================================================================================================
	 * ATTACHMENT DISPLAY SETTINGS
	 * =======================================================================================================================================
	 * This functions adds our above defined image sizes to the Attachment Display Settings interface
	 */
	function cake_show_image_sizes($sizes) {
		$sizes['cake_regular'] = __( 'Custom Regular', 'cake' );
		$sizes['cake_medium'] = __( 'Custom Medium', 'cake' );
		$sizes['cake_large'] = __( 'Custom Large', 'cake' );
		return $sizes;
	}
	add_filter('image_size_names_choose', 'cake_show_image_sizes');

}






/*
 * =======================================================================================================================================
 * ADD FEED LINKS
 * =======================================================================================================================================
 * This function adds RSS feed links to <head> for posts and comments.
*/
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'automatic-feed-links' );
}




/*
 * =======================================================================================================================================
 * TRANSLATION (load text domain)
 * =======================================================================================================================================
 * With this function you take the first step towards making your theme available for translation
 */
add_action('after_setup_theme', 'cake_setup');
function cake_setup(){
	load_theme_textdomain('cake', get_template_directory() . '/languages');

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}







/*
 * =======================================================================================================================================
 * SET A CONTENT WIDTH
 * =======================================================================================================================================
 * Sets the maximum allowed width for videos, images, and other oEmbed content in theme.
 */
if ( ! isset( $content_width ) ) $content_width = 960;







/*
 * =======================================================================================================================================
 * DYNAMIC SIDEBAR(S)
 * =======================================================================================================================================
 */
if(function_exists('register_sidebar')){
	register_sidebar(array(
		'name' => __( 'Sidebar Block #1', 'cake' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="section_content clearfix">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3><span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>',
		'after_title' => '</h3>',
		));
	register_sidebar(array(
		'name' => __( 'Sidebar Block #2', 'cake' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="section_content clearfix">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3><span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>',
		'after_title' => '</h3>',
		));
	register_sidebar(array(
		'name' => __( 'Sidebar Block #3', 'cake' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="section_content clearfix">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3><span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>',
		'after_title' => '</h3>',
		));
	register_sidebar(array(
		'name' => __( 'Sidebar Block #4', 'cake' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="section_content clearfix">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3><span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>',
		'after_title' => '</h3>',
		));
	register_sidebar(array(
		'name' => __( 'Sidebar Block #5', 'cake' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="section_content clearfix">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3><span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>',
		'after_title' => '</h3>',
		));
	register_sidebar(array(
		'name' => __( 'Sidebar Block #6', 'cake' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="section_content clearfix">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3><span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>',
		'after_title' => '</h3>',
		));
	register_sidebar(array(
		'name' => __( 'eBook Sidebar', 'cake' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix"><div class="section_content clearfix">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3><span class="nav_divider"><span class="darker"></span><span class="lighter"></span></span>',
		'after_title' => '</h3>',
		));
}







/*
 * =======================================================================================================================================
 * CUSTOM MORE LINK (FORMAT)
 * =======================================================================================================================================
 */
function new_excerpt_more($more) {
	global $post;
	return '&hellip;<br /><br /><a href="'. get_permalink($post->ID) . '" class="read_more">' . __( 'read more &rarr;', 'cake' ) . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');









/*
 * =======================================================================================================================================
 *  BASIC PAGINATION & CONTENT NAVIGATION
 * =======================================================================================================================================
 * Display navigation to next/previous pages when applicable
 */

// while in index (listing) view
function cake_index_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="<?php echo $nav_id; ?>" class="content_nav clearfix">
		<ul>
			<li class="nextPost"><?php previous_posts_link( __( '&larr; newer ', 'cake' ) ); ?></li>
			<li class="prevPost"><?php next_posts_link( __( 'older &rarr;', 'cake' ) ); ?></li>
		</ul>
	</nav>
<?php endif;
}
// (just prev and next)
function cake_index_nav_symbol_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="<?php echo $nav_id; ?>" class="content_nav clearfix">
		<span class="next_post"><?php previous_posts_link(  __( 'Newer', 'cake' ) ); ?></span>
		<div class="nav_divider"><div class="darker"></div><div class="lighter"></div></div>
		<span class="prev_post"><?php next_posts_link( __( 'Older', 'cake' ) ); ?></span>
		<div class="nav_divider"><div class="darker"></div><div class="lighter"></div></div>
	</nav>
<?php endif;
}

// –––––––––––––––––––––––––––––––––

// while in single entry view
function cake_single_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages < 1 ) : ?>
	<nav id="<?php echo $nav_id; ?>" class="content_nav clearfix">
		<ul>
			<li class="next_post"><?php next_post_link( __( '&larr; %link ', 'cake' ) ); ?></li>
			<li class="prev_post"><?php previous_post_link( __( '%link &rarr;', 'cake' ) ); ?></li>
		</ul>
	</nav>
<?php endif;
}
// (just prev and next)
function cake_single_symbol_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages < 1 ) : ?>
	<nav id="<?php echo $nav_id; ?>" class="content_nav clearfix">
		<span class="next_post"><?php next_post_link( '%link', __( 'Next', 'cake') ); ?></span>
		<div class="nav_divider"><div class="darker"></div><div class="lighter"></div></div>
		<span class="prev_post"><?php previous_post_link( '%link', __( 'Prev', 'cake') ); ?></span>
		<div class="nav_divider"><div class="darker"></div><div class="lighter"></div></div>
	</nav>
<?php endif;
}









/*
 * =======================================================================================================================================
 * REGISTER & ENQUEUE SCRIPTS & STYLES
 * =======================================================================================================================================
 * with this function with both register and enqueue our scripts (making sure to deregister jQuery in admin pages).
 * For performance, unless otherwise desired, load javascripts in footer. In this case, modernizr is the only js file
 * loaded in the head.
 */

function cake_scripts_and_styles() {

	// register and enqueue modernizr script (in head)
	// no depency specified
	wp_register_script('modernizr',
		get_template_directory_uri() . '/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', false, '2.6.2', false);
	wp_enqueue_script('modernizr');

	// enqueue WP core jQuery
	wp_enqueue_script('jquery');

	// register and enqueue jQuery UI script
	// it depends on jQuery and is loaded in the footer
	wp_register_script('jquery-ui',
		get_template_directory_uri() . '/js/vendor/jquery-ui-1.10.2.custom.min.js', array('jquery'), '1.10.2', true );
	wp_enqueue_script('jquery-ui');


	// use WP native jQuery UI
	// if you prefer to enqueue jquery-ui as needed
	// uncomment below and comment above enqued jquery-ui
	// ----------------------------------------------------------------------------
	// wp_enqueue_script('jquery-ui-core', array('jquery') );
	// wp_enqueue_script('jquery-ui-draggable', array('jquery','jquery-ui-core') );
	// wp_enqueue_script('jquery-effects-core', array('jquery','jquery-ui-core') );
	// ----------------------------------------------------------------------------

	// register and enqueue the plugins.js file
	// it depends on jQuery and is loaded in the footer
	wp_register_script('plugins',
		get_template_directory_uri() . '/js/plugins.js', '1.0', true, array('jquery','jquery-ui') );
	wp_enqueue_script('plugins');


	// register and enqueue main.js site-wide javascript behaviors file
	// it depends on jQuery and is loaded in the footer
	wp_register_script('main',
		get_template_directory_uri() . '/js/main.js', '1.0', true, array('jquery') );
	wp_enqueue_script('main');


	// Adds JavaScript to pages with the comment form to support
	// sites with threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );


	// =========================
	// Register & enqueue styles
	// =========================



	wp_register_style( 'normalize',
		get_template_directory_uri() . '/css/normalize.min.css', array(), '1.1.0', 'all' );
	wp_enqueue_style( 'normalize' );

	wp_register_style( 'boilerplate',
		get_template_directory_uri() . '/css/html5-boilerplate.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'boilerplate' );

	wp_register_style( 'jquery-ui',
		get_template_directory_uri() . '/css/jquery-ui-1.10.2.custom.min.css', array(), '1.10.2', 'all' );
	wp_enqueue_style( 'jquery-ui' );

	wp_register_style( 'nanoscroller',
		get_template_directory_uri() . '/css/nanoscroller.css', array() , '' );
	wp_enqueue_style( 'nanoscroller' );

	wp_register_style( 'flexslider',
		get_template_directory_uri() . '/css/flexslider.css', array() , '' );
	wp_enqueue_style( 'flexslider' );

	wp_register_style( 'superfish',
		get_template_directory_uri() . '/css/superfish.css', array() , '' );
	wp_enqueue_style( 'superfish' );

	wp_register_style( 'colorbox',
		get_template_directory_uri() . '/css/colorbox.css', array() , '' );
	wp_enqueue_style( 'colorbox' );


	// Enque our main style.css
	wp_enqueue_style( 'main', get_stylesheet_uri() );


	wp_register_style( 'media-queries',
		get_template_directory_uri() . '/css/media-queries.css', array('main') , '' );
	wp_enqueue_style( 'media-queries' );



	// FONTAWESOME
	wp_register_style( 'font-awesome',
		get_template_directory_uri() . '/css/font-awesome/font-awesome.min.css', array() , '' );
	wp_enqueue_style( 'font-awesome' );

	wp_register_style( 'font-awesome-corp',
		get_template_directory_uri() . '/css/font-awesome/font-awesome-corp.css', array('font-awesome') , '' );
	wp_enqueue_style( 'font-awesome-corp' );

	wp_register_style( 'font-awesome-ext',
		get_template_directory_uri() . '/css/font-awesome/font-awesome-ext.css', array('font-awesome') , '' );
	wp_enqueue_style( 'font-awesome-ext' );

	wp_register_style( 'font-awesome-social',
		get_template_directory_uri() . '/css/font-awesome/font-awesome-social.css', array('font-awesome') , '' );
	wp_enqueue_style( 'font-awesome-social' );


	// conditional stylesheets
	function conditional_stylesheets() {
		global $wp_styles;

		wp_enqueue_style( 'ie-css', get_template_directory_uri() . '/css/cake-ie.css', array() , '' );
		$wp_styles->add_data( 'ie-css', 'conditional', 'IE 9' );

		wp_enqueue_style( 'font-awesome-ie7', get_template_directory_uri() . '/css/font-awesome/font-awesome-ie7.min.css', array() , '1.0' );
		$wp_styles->add_data( 'font-awesome-ie7', 'conditional', 'IE 7' );

		wp_enqueue_style( 'font-awesome-more-ie7', get_template_directory_uri() . '/css/font-awesome/font-awesome-more-ie7.min', array() , '1.0' );
		$wp_styles->add_data( 'font-awesome-more-ie7', 'conditional', 'IE 7' );
	}
	add_action( 'wp_print_styles', 'conditional_stylesheets' );

}
add_action('wp_enqueue_scripts', 'cake_scripts_and_styles');








/*
 * =======================================================================================================================================
 * ALTERNATE STYLES
 * =======================================================================================================================================
 * register and enqueue alternate stylesheets as needed
 *
 */
function cake_alternate_style() {

	// fetch theme options stored in $NHP_Options;
	global $NHP_Options;

	// register our alternate stylesheets
	wp_register_style( 'light-blue', get_template_directory_uri() . '/css/light-blue.css' );
	wp_register_style( 'light-green', get_template_directory_uri() . '/css/light-green.css' );
	wp_register_style( 'black-and-white', get_template_directory_uri() . '/css/black-and-white.css' );

	// enqueue our alternate stylesheets as needed
	if ( $NHP_Options->get('alternate_style') == 'light_blue' ) {
		wp_enqueue_style( 'light-blue' );
	}
	else if  ( $NHP_Options->get('alternate_style') == 'light_green' ) {
		wp_enqueue_style( 'light-green' );
	}
	else if  ( $NHP_Options->get('alternate_style') == 'black_white' ) {
		wp_enqueue_style( 'black-and-white' );
	}
}
add_action('init', 'cake_alternate_style');








/*
 * =======================================================================================================================================
 * ADD 'odd' OR 'even' CSS CLASSES TO post_class()
 * =======================================================================================================================================
 *
 */
add_filter ( 'post_class' , 'cake_odd_or_even' );
if( !function_exists( 'cake_odd_or_even' ) ) {
	global $current_class;
	$current_class = 'odd';

	function cake_odd_or_even ( $classes ) {
		global $current_class;
		$classes[] = $current_class;

		$current_class = ($current_class == 'odd') ? 'even' : 'odd';

		return $classes;
	}
}





/*
 * =======================================================================================================================================
 * A MORE SPECIFIC TITLE ELEMENT
 * =======================================================================================================================================
 */

function cake_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'cake' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'cake_title', 10, 2 );








/*
 * =======================================================================================================================================
 * INCLUDE CUSTOM POST TYPES
 * =======================================================================================================================================
 * we include specific custom post types as need here,
 */
 // display custom taxonomy admin fields
include("functions/cake-custom/cake_admin-columns.php");
// include our custom post types + comments
include("functions/cake-custom/cake_chapters.php");
include("functions/cake-custom/cake_reviews.php");
include("functions/cake-custom/cake_features.php");
include("functions/cake-custom/cake_comments.php");

// Custom Taxonomy for Tool Type
add_action( 'init', 'create_tool_tax' );

function create_tool_tax() {
	register_taxonomy(
		'tool_category',
		'tool',
		array(
			'label' => __( 'Tool Category' ),
			'rewrite' => array( 'slug' => 'tool_category' ),
			'hierarchical' => true,
			)
		);
}

add_action('init', 'cptui_register_my_cpt_tool');
function cptui_register_my_cpt_tool() {
register_post_type('tool', array(
'label' => 'Tools',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'tool', 'with_front' => true),
'query_var' => true,
'supports' => array('title','editor','trackbacks','custom-fields','revisions','author','page-attributes','post-formats'),
'taxonomies' => array('category','post_tag','tool_category'),
'labels' => array (
  'name' => 'Tools',
  'singular_name' => 'Tool',
  'menu_name' => 'Tools',
  'add_new' => 'Add Tool',
  'add_new_item' => 'Add New Tool',
  'edit' => 'Edit',
  'edit_item' => 'Edit Tool',
  'new_item' => 'New Tool',
  'view' => 'View Tool',
  'view_item' => 'View Tool',
  'search_items' => 'Search Tools',
  'not_found' => 'No Tools Found',
  'not_found_in_trash' => 'No Tools Found in Trash',
  'parent' => 'Parent Tool',
)
) ); }


/*
 * =======================================================================================================================================
 * INCLUDE CUSTOM META FIELDS
 * =======================================================================================================================================
 * if you won't be using a particular custom meta box,
 * you can comment it out or delete the actual file
 */
$prefix = '_cake_'; // Prefix for all fields
include("functions/cake-custom/cake_meta-reviews.php");
include("functions/cake-custom/cake_meta-features.php");


// Initialize the metabox class
add_action( 'init', 'cake_initialize_cmb_meta_boxes', 9999 );
function cake_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( get_template_directory() . '/functions/metabox/init.php' );
	}
}














/*
 * =======================================================================================================================================
 * HIDE ADMIN BAR
 * =======================================================================================================================================
 * during development, it might be helpful to hide the admin bar.
 * uncomment the code below to implement
 */
// show_admin_bar( false );








/*
 * =======================================================================================================================================
 * POPULAR (MOST VIEWED) POST FUNCTION
 * =======================================================================================================================================
 * function to get, set & display most viewed posts
 */
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count.' Views';
}
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}








/*
 * =======================================================================================================================================
 * RECENT COMMENTS FUNCTION
 * =======================================================================================================================================
 * function for display most recent comments
 */
function cake_recent_comments($no_comments = 10, $comment_len = 50) {
	global $wpdb;

	$sql = "SELECT * FROM $wpdb->comments";
	$sql .= " JOIN $wpdb->posts ON ID = comment_post_ID";
	$sql .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password =''AND comment_type = '' ";
	$sql .= " ORDER BY comment_date DESC LIMIT $no_comments";


	$comments = $wpdb->get_results($sql);

	if ($comments) {
		echo '<nav class="toc_nav"> <ul class="secondary_nav recent_comments">';
		foreach ($comments as $comment) { ?>
		<li class="clearfix">
			<a href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>" class="clearfix">

				<span class="img_wrap">
					<?php echo get_avatar( $comment, 50 ); ?>
				</span>

				<span class="toc_el_title">
					<?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, $comment_len)) . "&hellip;"; ?>
				</span>

				<small class="toc_meta clearfix">
					<span class="divider"></span>
					<i class="icon-user"></i> <strong><?php echo strip_tags($comment->comment_author); ?></strong>
				</small>

			</a>
		</li>

		<?php }
		echo '</ul> </nav>';
	}
}








/*
 * =======================================================================================================================================
 * ADD CUSTOM POST 'CHAPTERS' TO AUTHOR RESULTS
 * =======================================================================================================================================
 * this functions makes sure 'chapters' by author are
 * included e.g. when viewing author page
 */
function __set_chapters_for_author( &$query )
{
	if ( $query->is_author )
		$query->set( 'post_type', 'chapters' );
    remove_action( 'pre_get_posts', '__set_chapters_for_author' ); // run once!
  }
  add_action( 'pre_get_posts', '__set_chapters_for_author' );







/*
 * =======================================================================================================================================
 * AUTHOR ARCHIVE FUNCTION
 * =======================================================================================================================================
 */
function cake_post_author_archive($query) {
	if ($query->is_author)
		$query->set( 'post_type', array('post', 'chapters') );
	remove_action( 'pre_get_posts', 'cake_post_author_archive' );
}
add_action('pre_get_posts', 'cake_post_author_archive');







/*
 * =======================================================================================================================================
 * ADD EXTRA AUTHOR INFO FIELDS
 * =======================================================================================================================================
 * this function adds a few key fields to the author admin pages
 */
function cake_modify_author_fields( $contactmethods ) {

	// Add contact methods
	$contactmethods['twitter']		= __('Twitter', 'cake');
	$contactmethods['facebook'] 	= __('Facebook', 'cake');
	$contactmethods['instagram']	= __('Instagram', 'cake');
	$contactmethods['pinterest']	= __('Pinterest', 'cake');
	$contactmethods['linkedin']		= __('LinkedIn', 'cake');
	$contactmethods['amazon']		= __('Amazon', 'cake');
	$contactmethods['flickr']		= __('Flickr', 'cake');


	// Remove often unused user contact methods
	// uncomment the below contact methods if not needed

	// unset($contactmethods['aim']);
	// unset($contactmethods['jabber']);
	// unset($contactmethods['yim']);


	return $contactmethods;
}
add_filter('user_contactmethods','cake_modify_author_fields',10,1);







/*
 * =======================================================================================================================================
 * LIST OF CONTRIBUTORS (USERS)
 * =======================================================================================================================================
 * with this function we display more author(s) info on the contributors page
 */
function cake_contributors() {
	global $wpdb;

	//$authors = get_users('role=author&exclude=7,8,9');
	$authors = get_users('role=administrator');


	foreach ($authors as $author ) { ?>

	<div class="contributor clearfix">
		<div class="section_content clearfix">

			<span class="contributor_image">
				<?php echo get_avatar($author->ID, 250); ?>
			</span>



			<div class="contributor_info clearfix">
				<h2>
					<?php echo esc_attr( $author->display_name ); ?>
				</h2>
				<p>
					<?php if ( $author->user_url ) :  ?>
						<a href="<?php echo esc_url( $author->user_url ); ?>" title="<?php _e('Website','cake'); ?>">
							<?php echo esc_url( $author->user_url ); ?>
						</a>
					<?php endif; ?>

				</p>

				<div class="contributor_social">
					<?php if ( $author->twitter ) :  ?>
						<a href="<?php echo esc_url( $author->twitter ); ?>" title="<?php _e('Twitter','cake'); ?>">
							<i class="icon-twitter"></i>
						</a>
					<?php endif; ?>

					<?php if ( $author->facebook ) :  ?>
						<a href="<?php echo esc_url( $author->facebook ); ?>" title="<?php _e('Facebook','cake'); ?>">
							<i class="icon-facebook"></i>
						</a>
					<?php endif; ?>

					<?php if ( $author->instagram ) :  ?>
						<a href="<?php echo esc_url( $author->instagram ); ?>" title="<?php _e('Instagram','cake'); ?>">
							<i class="icon-instagram"></i>
						</a>
					<?php endif; ?>

					<?php if ( $author->pinterest ) :  ?>
						<a href="<?php echo esc_url( $author->pinterest ); ?>" title="<?php _e('Pinterest','cake'); ?>">
							<i class="icon-pinterest"></i>
						</a>
					<?php endif; ?>

					<?php if ( $author->linkedin ) :  ?>
						<a href="<?php echo esc_url( $author->linkedin ); ?>" title="<?php _e('LinkedIn','cake'); ?>">
							<i class="icon-linkedin"></i>
						</a>
					<?php endif; ?>

					<?php if ( $author->flickr ) :  ?>
						<a href="<?php echo esc_url( $author->flickr ); ?>" title="<?php _e('Flickr','cake'); ?>">
							<i class="icon-flickr"></i>
						</a>
					<?php endif; ?>
				</div>

				<span class="divider"></span>
				<br class="clearfloat" />

				<div class="contributor_description clearfix">
					<?php echo $author->user_description; ?>
				</div>

			</div>


		</div>
	</div>

	<?php }

}








