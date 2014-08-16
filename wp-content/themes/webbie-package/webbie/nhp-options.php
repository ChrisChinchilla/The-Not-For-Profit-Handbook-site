<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('NHP_Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}



/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');









/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();


//------------------------------------------------------------------------------------------------------
// SET DEV MODE
//------------------------------------------------------------------------------------------------------

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = false;



//------------------------------------------------------------------------------------------------------
// SET GOOGLE API KEY (IF DESIRED)
//------------------------------------------------------------------------------------------------------

//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//$args['google_api_key'] = '***';



//------------------------------------------------------------------------------------------------------
// OVERRIDE DEFAULT OPTIONS STYLSHEET
//------------------------------------------------------------------------------------------------------

//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;



//------------------------------------------------------------------------------------------------------
// OPTIONS INTRO HTML 
//------------------------------------------------------------------------------------------------------

//Add HTML before the form
//$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'cake');



//------------------------------------------------------------------------------------------------------
// CUSTOM SHARE LINKS ON THEME OPTIONS FOOTER
//------------------------------------------------------------------------------------------------------

//Setup custom links in the footer for share icons
//$args['share_icons']['twitter'] = array(
//										'link' => 'http://twitter.com/ebookcake',
//										'title' => __('You should follow eBookCake on Twitter', 'cake'), 
//										'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'
//										);


//------------------------------------------------------------------------------------------------------
// IMPORT/EXPORE ENABLE/DISABLE
//------------------------------------------------------------------------------------------------------

//Choose to disable the import/export feature
//$args['show_import_export'] = false;



//------------------------------------------------------------------------------------------------------
// NAMING AND MENU LOCATION, ETC
//------------------------------------------------------------------------------------------------------

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'webbie';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Theme Options', 'cake');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Webbie Theme Options', 'cake');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'webbie_theme_options';


//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 100;



//------------------------------------------------------------------------------------------------------

// NOT USING THESE OPTIONS
// MESSING WITH THESE COMMENTED VARS, YOU
// MIGHT ALSOHAVE TO DIVE INTO OPTIONS.PHP


//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';



// NOPE! NOPE! NOPE!
// USING SUBMENU KICKS OFF WARNINGS/ REQUIRED
// WHICH TF DOESN'T TOLERATE
//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';


//Want to disable the sections showing as a submenu in the admin? uncomment this line
//$args['allow_sub_menu'] = false;
//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';


//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//------------------------------------------------------------------------------------------------------



		




//------------------------------------------------------------------------------------------------------
// DEFINE HELP TAGS AND HELP SIDEBAR
//------------------------------------------------------------------------------------------------------

//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
//$args['help_tabs'][] = array(
//							'id' => 'nhp-opts-1',
//							'title' => __('Theme Information 1', 'cake'),
//							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'cake')
//							);
//$args['help_tabs'][] = array(
//							'id' => 'nhp-opts-2',
//							'title' => __('Theme Information 2', 'cake'),
//							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'cake')
//							);
//Set the Help Sidebar for the options page - no sidebar by default										
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'cake');



$sections = array();


//------------------------------------------------------------------------------------------------------
// INTRO, GETTING STARTED
//------------------------------------------------------------------------------------------------------

//$sections[] = array(
//				'title' => __('Getting Started', 'cake'),
//				'desc' => __('<p class="description">This is the description field for the Section. HTML is allowed</p>', 'cake'),
//				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
//				//You dont have to though, leave it blank for default.
//				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_062_attach.png'
//				//Lets leave this as a blank section, no options just some intro text set above.
//				//'fields' => array()
//				);



//===========================
// BASIC OPTIONS
//===========================
$sections[] = array(
				'icon' 				=> NHP_OPTIONS_URL.'img/cake-options-icons/icon-home.png',
				'title' 			=> __('Basic Settings', 'cake'),
				'desc' 				=> __('<p class="description">The Basic Settings allow you to upload a logo icon and manage sidebar options</p>', 'cake'),
				'fields' 			=> array(

					//logo
					array(
						'id' 		=> 'logo_image',
						'type' 		=> 'upload',
						'title' 	=> __('Logo Icon', 'cake'), 
						'sub_desc' 	=> __('No validation can be done on this field type', 'cake'),
						'desc' 		=> __('Upload an image for your logo (appears as an icon next to the title). If absent, only the website title will be used. 
									<br /><strong>Note: </strong> This never shows up at a large size so keep the file relatively small. about 50px or slightly larger.', 'cake')
						),
						
					// Sidebar Options Intro text
					array(
						'id' 		=> 'sidebar_intro',
						'type' 		=> 'info',
						'desc' 		=> __('<h3>Sidebar Settings &amp; Options</h3>
									<p>Define specific options for your blog &amp; pages sidebar.</p>', 'cake')
						),
						
						
					// Book Image, title and synopsis: show/hide
					array(
						'id' 		=> 'switch_sidebar_book_info',
						'type' 		=> 'checkbox',
						'title' 	=> __('Sidebar: Cover image &amp; title area','cake'), 
						'sub_desc' 	=> __('show/hide call-to-action area', 'cake'),
						'desc' 		=> __('<br />Show or hide the book info that shows up on all pages at the top of the sidebar. 
									<br /><strong>Note: </strong> When this option is on, this section will show up whether or not you\'re using widgets.','cake'),
						'std' 		=> '1'// 1 = on | 0 = off
						),
						
					// Popular articles: show/hide
					array(
						'id' 		=> 'switch_popular_articles',
						'type' 		=> 'checkbox_hide_below',
						'title' 	=> __('Sidebar: Popular Articles','cake'), 
						'sub_desc' 	=> __('show popular posts?', 'cake'),
						'desc' 		=> __('<br />Show <strong>popular articles</strong> in sidebar.','cake'),
						'std' 		=> '1'// 1 = on | 0 = off
						),
					// Popular articles
					array(
						'id' 		=> 'popular_articles_count',
						'type' 		=> 'select',
						'title' 	=> __('Sidebar: Popular Articles', 'cake'), 
						'sub_desc' 	=> __('sidebar popular articles count', 'cake'),
						'desc' 		=> __('<br />How many <strong>popular articles</strong> should show up in the blog &amp; pages sidebar?
									<br /> Minimum: 1, max: 15, default value: 3', 'cake'),
						'options' 	=> array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6',
									'7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15'),
									//Must provide key => value pairs for select options
						'std' 		=> '3'
						),
						
					// Recent articles: show/hide
					array(
						'id' 		=> 'switch_recent_articles',
						'type' 		=> 'checkbox_hide_below',
						'title' 	=> __('Sidebar: Recent Articles','cake'), 
						'sub_desc' 	=> __('show recent posts?', 'cake'),
						'desc' 		=> __('<br />Show <strong>recent articles</strong> in sidebar.','cake'),
						'std' 		=> '1'// 1 = on | 0 = off
						),
					// Recent articles
					array(
						'id' 		=> 'recent_articles_count',
						'type' 		=> 'select',
						'title' 	=> __('Sidebar: Recent Articles', 'cake'), 
						'sub_desc' 	=> __('sidebar recent articles count', 'cake'),
						'desc' 		=> __('<br />How many <strong>recent articles</strong> should show up in the blog &amp; pages sidebar?
									<br /> Minimum: 1, max: 15, default value: 3', 'cake'),
						'options' 	=> array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6',
									'7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15'),
									//Must provide key => value pairs for select options
						'std' 		=> '3'
						),


					// Recent comments: show/hide
					array(
						'id' 		=> 'switch_recent_comments',
						'type' 		=> 'checkbox_hide_below',
						'title' 	=> __('Sidebar: Recent Comments','cake'), 
						'sub_desc' 	=> __('show recent comments?', 'cake'),
						'desc' 		=> __('<br />Show <strong>recent comments</strong> in sidebar.','cake'),
						'std' 		=> '1'// 1 = on | 0 = off
						),
					// Recent comments
					array(
						'id' 		=> 'recent_comments_count',
						'type' 		=> 'select',
						'title' 	=> __('Sidebar: Recent comments', 'cake'), 
						'sub_desc' 	=> __('sidebar recent comments count', 'cake'),
						'desc' 		=> __('<br />How many <strong>recent comments</strong> should show up in the blog &amp; pages sidebar?
									<br /> Minimum: 1, max: 15, default value: 3', 'cake'),
						'options' 	=> array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6',
									'7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15'),
									//Must provide key => value pairs for select options
						'std' 		=> '3'
						)




						
					)
				);
				
				
				
				
				
//===========================
// STYLE SETTINGS
//===========================				
$sections[] = array(
				'icon' 				=> NHP_OPTIONS_URL.'img/cake-options-icons/icon-paint.png',
				'title' 			=> __("Style Settings", 'cake'),
				'desc' 				=> __('<p class="description">These options will let you define an alternate stylesheet and include additional, custom CSS.</p>', 'cake'),
				'fields' 			=> array(
				
					// alternate style
					array(
						'id' 		=> 'alternate_style',
						'type' 		=> 'radio_img',
						'title' 	=> __('Overall Theme Style', 'cake'), 
						'sub_desc' 	=> __('choose an overall style', 'cake'),
						'desc' 		=> __('Select an alternative, pre-set stylesheet for your theme. Defaults to the main (1st) option', 'cake'),
						'options' 	=> array(
										'main_style' => array('title' => 'Default (Main)', 'img' => NHP_OPTIONS_URL.'img/layout/cake-main-style.png'),
										'light_blue' => array('title' => 'Light Blue', 'img' => NHP_OPTIONS_URL.'img/layout/cake-light-blue-style.png'),
										'light_green' => array('title' => 'Light Green', 'img' => NHP_OPTIONS_URL.'img/layout/cake-light-green-style.png'),
										'black_white' => array('title' => 'Black &amp; White', 'img' => NHP_OPTIONS_URL.'img/layout/cake-black-white-style.png')
											),//Must provide key => value(array:title|img) pairs for radio options
						'std' 		=> 'main_style'
						),
						
					// custom CSS
					array(
						'id' 		=> 'custom_css',
						'type' 		=> 'textarea',
						'title' 	=> __('Custom/ Additional CSS', 'cake'), 
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('Add custom CSS to your theme by adding it to this block. 
									Only add the CSS rule i.e. do NOT include the opening and closing &lt;style&gt; tags', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> ''
						),
				
				

						
					)
				);
				
				
				
//===========================
// BOOK SETTINGS
//===========================
$sections[] = array(
				'icon' 				=> NHP_OPTIONS_URL.'img/cake-options-icons/book_open.png',
				'title' 			=> __("Book Settings", 'cake'),
				'desc' 				=> __('<p class="description">These options will let you define cover graphics, book synopsis, table of contents, etc.</p>', 'cake'),
				'fields' 			=> array(

					
					// Book Cover
					array(
						'id' 		=> 'book_cover_image',
						'type' 		=> 'upload',
						'title' 	=> __('Book Cover', 'cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('Upload your book\'s cover image. Can be different from logo icon image.', 'cake')
						),
						
					// Book Title
					array(
						'id' 		=> 'book_title', //must be unique
						'type' 		=> 'text', //builtin fields include:
										  //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
						'title' 	=> __('Book Title', 'cake'),
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('<br />If different from your site title, enter your book title here. Useful if your site isn\'t just about your book.', 'cake'),
						'validate'	=> 'no_html',
						//'validate' => '', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						//'msg' => 'custom error message', //override the default validation error message for specific fields
						//'std' => '', //This is a default value, used to set the options on theme activation, and if the user hits the Reset to defaults Button
						//'class' => '' //Set custom classes for elements if you want to do something a little different - default is "regular-text"
						),

					// Book Subtitle
					array(
						'id' 		=> 'book_subtitle', //must be unique
						'type' 		=> 'text', //builtin fields include:
										  //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
						'title' 	=> __('Book Sub Title', 'cake'),
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('<br />Your book\'s subtitle if available.', 'cake'),
						'validate'	=> 'no_html',
						),

					// Book Synopsis
					array(
						'id' 		=> 'book_synopsis',
						'type' 		=> 'textarea',
						'title' 	=> __('Book Synopsis', 'cake'), 
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('A brief description (2 to 3 sentences) of your book that will appear in various places on the site. e.g. on the sidebar.', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> ''
						),

				
					// Read online + Buy options
					array(
						'id' 		=> 'reading_purchase_intro',
						'type' 		=> 'info',
						'desc' 		=> __('<h3>Read Online &amp; Purchase Options</h3>
									<p>These options will let you define the pages on which the book can be read online or the page on which the book can be purchased.</p>', 'cake')
						),
						
						
					// Book: Read online
					array(
						'id' 		=> 'read_online_page',
						'type' 		=> 'pages_select',
						'title' 	=> __('Read Online Page', 'cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('<br />If available to read online, choose a page to redirect to when any "Read online" link is clicked. 
									e.g. if you\'re using the T.O.C custom page template, you can redirect readers to that page.
									<br /><br /><strong>Note:</strong>  To restrict your content and charge readers (e.g. a recurring subscription) for access to it, 
									I highly recommend: <br /> <a href="http://pippinsplugins.com/restrict-content-pro-premium-content-plugin/?ref=655" title="Restrict Content Pro &mdash; Premium Content Plugin" target="_blank">Restrict Content Pro &mdash; Premium Content Plugin</a>.', 'cake'),
						'args' => array()//uses get_pages
						),


					// Book: Read online link text
					array(
						'id' 		=> 'read_online_link_text', //must be unique
						'type' 		=> 'text',
						'title' 	=> __('Read Online Link Text', 'cake'),
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('<br />What should your "Read Online" link text be?', 'cake'),
						'std'		=> __('Read It', 'cake'),
						'validate'	=> 'no_html',
						),



					// Book: Read online: available?
					array(
						'id' 		=> 'can_read_online',
						'type' 		=> 'checkbox',
						'title' 	=> __('Is available to Read Online','cake'), 
						'sub_desc' 	=> __('uncheck if NOT available to read online.', 'cake'),
						'desc' 		=> __('<br />Is your ebook available to read online? 
									If unchecked, will disregard "Read Online Page" and "Read Online Link Text" set above.','cake'),
						'std' 		=> '1'// 1 = on | 0 = off
						),
						
						
					// Book: Purchase Page
					array(
						'id' 		=> 'purchase_page',
						'type' 		=> 'pages_select',
						'title' 	=> __('Purchase Page', 'cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('<br />If available for download/ purchase, choose a page to redirect to when any "Purchase" link is clicked. 
									<br /><strong>Note:</strong> I highly recommend the free plugin <a href="https://easydigitaldownloads.com?ref=872" title="Easy Digital Downloads">Easy Digital Downloads</a> for lightweight digital downloads functionality.', 'cake'),
						'args' => array()//uses get_pages
						),
						
					// Book: Purchase link text
					array(
						'id' 		=> 'purchase_link_text', //must be unique
						'type' 		=> 'text',
						'title' 	=> __('Purchase Link Text', 'cake'),
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('<br />What should your "Buy" link text be?', 'cake'),
						'std'		=> __('Buy It', 'cake'),
						'validate'	=> 'no_html',
						),
						
						
					// Book: Direct link
					array(
						'id' 		=> 'direct_link_switch',
						'type' 		=> 'checkbox_hide_below',
						'title' 	=> __('Direct URL','cake'), 
						'sub_desc' 	=> __('enter Purchase Page URL', 'cake'),
						'desc' 		=> __('<br />Specify a URL to the purchase page instead of selecting a page above.','cake'),
						'std' 		=> '0'// 1 = on | 0 = off
						),
						

					// Book: Direct link url
					array(
						'id' 		=> 'direct_link_url',
						'type' 		=> 'text',
						'title' 	=> __('Direct URL to Purchase Page', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the URL to your "Purchase Page". This will invalidate any "Purchase Page" selected above.', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),




					// Book: Sample Download URL
					array(
						'id' 		=> 'sample_download_link',
						'type' 		=> 'text',
						'title' 	=> __('Sample Download URL', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Full URL to a free/ sample download of the book (e.g. a few free chapters), if available.', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),
						
					// Book: Sample Download link text
					array(
						'id' 		=> 'sample_download_link_text',
						'type' 		=> 'text',
						'title' 	=> __('Sample Download Link Text', 'cake'),
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('<br />If you entered a URL above i.e. free download is available, what should your "Download a free sample" link text be?', 'cake'),
						'std'		=> __('Download a free sample', 'cake'),
						'validate'	=> 'no_html',
						),

						
					)
				);
				
				
				
//===========================
// SEO (Basic) SETTINGS
//===========================
$sections[] = array(
				'icon' 				=> NHP_OPTIONS_URL.'img/cake-options-icons/icon-settings.png',
				'title' 			=> __("SEO Settings", 'cake'),
				'desc' 				=> __('<p class="description">Meta elements are typically used to specify page description, keywords, 
									author of the document, and by browsers, search engines (keywords), or other web services.</p>', 'cake'),
				'fields' 			=> array(

					// Favicon
					array(
						'id' 		=> 'favicon',
						'type' 		=> 'upload',
						'title' 	=> __('Favicon', 'cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('Upload an image (usual of file format <strong>.ico</strong>) to be used as your site\'s favicon.', 'cake')
						),
						
					// Header Custom Code
					array(
						'id' 		=> 'header_custom_code',
						'type' 		=> 'textarea',
						'title' 	=> __('Header Code', 'cake'), 
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('Paste your Google Analytics (or other) custom code that goes in the &lt;header&gt here. <br /><strong>Note:</strong> Leave out any opening and closing &lt;script&gt; tags. They will be ignored.', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> ''
						),
						
					// Footer Custom Code
					array(
						'id' 		=> 'footer_custom_code',
						'type' 		=> 'textarea',
						'title' 	=> __('Footer Code', 'cake'), 
						'sub_desc' 	=> __('No HTML allowed', 'cake'),
						'desc' 		=> __('Paste your Google Analytics (or other) custom code that goes in the &lt;footer&gt here. <br /><strong>Note:</strong> Leave out any opening and closing &lt;script&gt; tags. They will be ignored.', 'cake'),
						'validate' 	=> 'no_html',
						//'validate' => '', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						'std' 		=> ''
						),

					// Define Meta description
					array(
						'id' 		=> 'define_meta_description',
						'type' 		=> 'checkbox_hide_below',
						'title' 	=> __('Define Meta Description?','cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('<br />Would you like to manually handle your site\'s meta description? 
									<br /><strong>Note: </strong> It\'s often better &mdash; and more flexible &mdash; to use a specialized SEO plugin like <a href="http://wordpress.org/extend/plugins/wordpress-seo/" title="WordPress SEO by Yoast" target="_blank">WordPress SEO by Yoast</a>.','cake'),
						'std' 		=> '0'// 1 = on | 0 = off
						),
					// Meta Description
					array(
						'id' 		=> 'meta_description',
						'type' 		=> 'text',
						'title' 	=> __('Meta Description', 'cake'),
						'sub_desc' 	=> __('No HTML allowed.', 'cake'),
						'desc' 		=> __('<br />Input a custom <strong>Meta Description</strong>.', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> get_bloginfo('description')
						),


					// Define Meta Keywords
					array(
						'id' 		=> 'define_meta_keywords',
						'type' 		=> 'checkbox_hide_below',
						'title' 	=> __('Define Meta Keywords?','cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('<br />Would you like to manually handle your site\'s meta keywords?. 
									<br /><strong>Note: </strong> It\'s often better &mdash; and more flexible &mdash; to use a specialized SEO plugin like <a href="http://wordpress.org/extend/plugins/wordpress-seo/" title="WordPress SEO by Yoast" target="_blank">WordPress SEO by Yoast</a>.','cake'),
						'std' 		=> '0'// 1 = on | 0 = off
						),
					// Meta Keywords
					array(
						'id' 		=> 'meta_keywords',
						'type' 		=> 'text',
						'title' 	=> __('Meta Keywords', 'cake'),
						'sub_desc' 	=> __('No HTML allowed.', 'cake'),
						'desc' 		=> __('<br />Input coma-separated <strong>keywords</strong>.', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> get_bloginfo('name')
						),

						
						
						
					)
				);
				
				
				
				
				
				
				
				
//===========================
// SOCIAL  SETTINGS
//===========================
$sections[] = array(
				'icon' 				=> NHP_OPTIONS_URL.'img/cake-options-icons/emoticon_tongue.png',
				'title' 			=> __("Social Settings", 'cake'),
				'desc' 				=> __('<p class="description">Define links to your online social media profiles.</p>', 'cake'),
				'fields' 			=> array(

					// Twitter												
					array(
						'id' 		=> 'social_twitter_link',
						'type' 		=> 'text',
						'title' 	=> __('Twitter', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your Twitter profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),

					// Facebook												
					array(
						'id' 		=> 'social_facebook_link',
						'type' 		=> 'text',
						'title' 	=> __('Facebook', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your Facebook profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),

					// LinkedIn												
					array(
						'id' 		=> 'social_linkedin_link',
						'type' 		=> 'text',
						'title' 	=> __('LinkedIn', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your LinkedIn profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),

					// Youtube												
					array(
						'id' 		=> 'social_youtube_link',
						'type' 		=> 'text',
						'title' 	=> __('YouTube', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your YouTube profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),
						
					// Vimeo												
					array(
						'id' 		=> 'social_vimeo_link',
						'type' 		=> 'text',
						'title' 	=> __('Vimeo', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your Vimeo profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),

					// Pinterest												
					array(
						'id' 		=> 'social_pinterest_link',
						'type' 		=> 'text',
						'title' 	=> __('Pinterest', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your Pinterest profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),

					// Instagram												
					array(
						'id' 		=> 'social_instagram_link',
						'type' 		=> 'text',
						'title' 	=> __('Instagram', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your Instagram profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),

					// Flickr												
					array(
						'id' 		=> 'social_flickr_link',
						'type' 		=> 'text',
						'title' 	=> __('Flickr', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your Flickr profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),

					// Tumblr												
					array(
						'id' 		=> 'social_tumblr_link',
						'type' 		=> 'text',
						'title' 	=> __('Tumblr', 'cake'),
						'sub_desc' 	=> __('This must be a URL.', 'cake'),
						'desc' 		=> __('<br />Enter the Full URL to your Tumblr profile', 'cake'),
						'validate' 	=> 'url',
						'std' 		=> ''
						),



						
						
					// SOCIAL WIDGETS	
					array(
						'id' 		=> 'social_widgets_intro',
						'type' 		=> 'info',
						'desc' 		=> __('<h3>Twitter Widget Options</h3>
									<p>These options will let your Twitter widget options.</p>', 'cake')
						),
						
						
						
						
					// Twitter: widget
					array(
						'id' 		=> 'got_widget',
						'type' 		=> 'checkbox',
						'title' 	=> __('Do you have a Twitter widget?','cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('<br />Do you have Twitter widget code e.g. to show your latest tweets?','cake'),
						'std' 		=> '0'// 1 = on | 0 = off
						),
					array(
						'id' 		=> 'twitter_widget_title',
						'type' 		=> 'text',
						'title' 	=> __('Twitter Widget Title', 'cake'),
						'sub_desc' 	=> __('No HTML allowed.', 'cake'),
						'desc' 		=> __('What do you want the title for the Twitter widget to be?', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> ''
						),
					array(
						'id' 		=> 'twitter_widget_code',
						'type' 		=> 'textarea',
						'title' 	=> __('Twitter Widget Code', 'cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('If you have Twitter widget code, copy/ paste it here in its entirety. 
									<br/>To generate a twitter widget, log in to your Twitter account, go to your 
									<a href="https://twitter.com/settings/widgets" target="_blank">Twitter Widgets page</a> 
									and configure your widget. Once done, you\'ll be given a chunk of code to use. Paste it here.', 'cake'),
						//'validate' 	=> 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' 		=> ''
						),




							
					)
				);
				




//===========================
// SOCIAL  SETTINGS
//===========================
$sections[] = array(
				'icon' 				=> NHP_OPTIONS_URL.'img/cake-options-icons/email.png',
				'title' 			=> __("Contact Settings", 'cake'),
				'desc' 				=> __('<p class="description">These settings let you manage your vCard / contact information.</p>', 'cake'),
				'fields' 			=> array(
				
					// show/hide contact info
					array(
						'id' 		=> 'switch_contact_info',
						'type' 		=> 'checkbox',
						'title' 	=> __('Show Contact info','cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('<br />Display your contact info publicly? If unchecked, info entered below wont be displayed.','cake'),
						'std' 		=> '1'// 1 = on | 0 = off
						),

					// Contact info Heading												
					array(
						'id' 		=> 'contact_info_heading',
						'type' 		=> 'text',
						'title' 	=> __('Contact info (vCard) Heading', 'cake'),
						'sub_desc' 	=> __('No HTML allowed.', 'cake'),
						'desc' 		=> __('<br />What should the heading for the contact info (e.g. on the contact page) be?', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> ''
						),

					// Google Maps Link												
					array(
						'id' 		=> 'google_maps_link',
						'type' 		=> 'text',
						'title' 	=> __('Google Maps (link)', 'cake'),
						'sub_desc' 	=> __('Valid URL only', 'cake'),
						'desc' 		=> __('<br />Enter the <strong>URL</strong> to your google map. This will auto-generate a map.
									<br /> <strong>Note: </strong> To obtain the URL, follow <a href="http://support.google.com/maps/bin/answer.py?hl=en&answer=72644" target="_blank">these instructions</a> by Google.', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> ''
						),

					// Email	
					array(
						'id' 		=> 'contact_email',
						'type' 		=> 'text',
						'title' 	=> __('Email Address', 'cake'),
						'sub_desc' 	=> __('valid email only', 'cake'),
						'desc' 		=> __('A publicly displayed email address.', 'cake'),
						'validate' 	=> 'email',
						'std' 		=> ''
						),

					// Phone
					array(
						'id' 		=> 'contact_phone',
						'type' 		=> 'text',
						'title' 	=> __('Phone Number', 'cake'),
						'sub_desc' 	=> __('No HTML allowed.', 'cake'),
						'desc' 		=> __('A publicly displayed phone number.', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> ''
						),
					
					// Phone
					array(
						'id' 		=> 'contact_fax',
						'type' 		=> 'text',
						'title' 	=> __('Fax Number', 'cake'),
						'sub_desc' 	=> __('No HTML allowed.', 'cake'),
						'desc' 		=> __('A publicly displayed fax number.', 'cake'),
						'validate' 	=> 'no_html',
						'std' 		=> ''
						),
						
					// Address	
					array(
						'id' 		=> 'contact_address',
						'type' 		=> 'textarea',
						'title' 	=> __('P.O Box or Physical Address', 'cake'), 
						'sub_desc' 	=> __('some HTML Allowed', 'cake'),
						'desc' 		=> __('physical mailing address', 'cake'),
						'validate' 	=> 'html',
						'std' => ''
						),
						

						
						
					// CONTACT FORM	
					array(
						'id' 		=> 'contact_form_intro',
						'type' 		=> 'info',
						'desc' 		=> __('<h3>Contact Form Options</h3>
									<p>Set whether or not to use theme-native contact form and an email address where messages should be delivered.</p>', 'cake')
						),
						


					// show/hide contact form
					array(
						'id' 		=> 'show_hide_contact_form',
						'type' 		=> 'checkbox_hide_below',
						'title' 	=> __('Use Theme-Native Contact Form?','cake'), 
						'sub_desc' 	=> __('', 'cake'),
						'desc' 		=> __('<br />Uncheck to hide form. If using a contact form plugin, you may want to hide it','cake'),
						'std' 		=> '1'// 1 = on | 0 = off
						),

					// Contact Form Email	
					array(
						'id' 		=> 'contact_form_email',
						'type' 		=> 'text',
						'title' 	=> __('Contact Form Email', 'cake'),
						'sub_desc' 	=> __('valid email only', 'cake'),
						'desc' 		=> __('If different from admin email, enter email address where contact messages should be delivered.', 'cake'),
						'validate' 	=> 'email',
						'std' 		=> get_bloginfo('admin_email')
						),


							
					)
				);
				


				
				
	$tabs = array();
	
	
			
	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}else{
		//$theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()).'style.css');
		$theme_data = wp_get_theme( trailingslashit(get_stylesheet_uri()) );
		$theme_uri = $theme_data['URI'];
		$description = $theme_data['Description'];
		$author = $theme_data['Author'];
		$version = $theme_data['Version'];
		$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="nhp-opts-section-desc">';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'cake').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'cake').$author.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'cake').$version.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'cake').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



//	$tabs['theme_info'] = array(
//					'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
//					'title' => __('Theme Information', 'cake'),
//					'content' => $theme_info
//					);
	
////	if(file_exists(trailingslashit(get_stylesheet_directory()).'README.html')){
////		$tabs['theme_docs'] = array(
////						'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_071_book.png',
////						'title' => __('Documentation', 'cake'),
////						'content' => nl2br(file_get_contents(trailingslashit(get_stylesheet_directory()).'README.html'))
////						);
////	}//if

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function
?>