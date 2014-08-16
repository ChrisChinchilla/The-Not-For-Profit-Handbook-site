//	----------------------------------------------------------
//  Use jQuery in noConflict mode to avoid issues. TF request 
//	----------------------------------------------------------
jQuery.noConflict();


//	Load fonts using WebFont Loader
//	----------------------------------------------------------
//	https://developers.google.com/webfonts/docs/webfont_loader
//	----------------------------------------------------------
//	The WebFont Loader also lets you 
//	use multiple web-font providers.

//	Google specific fonts. 
//	you can add more fonts as needed and reference 
//	them in the CSS as usual
WebFontConfig = {
	google: { families: [ 
		// sans serif fonts

		'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800:latin',
//		'Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic:latin',
//		'Nixie+One::latin',
//	
//		// fixed-width fonts
//		'PT+Mono::latin',
//		'Cutive+Mono::latin', 
//	
//		// serif fonts
//		'Merriweather:400,300,700,900:latin', 
//		'Lora:400,700,400italic,700italic:latin', 
//		
//		// script fonts
//		'Mr+Dafoe::latin', 
//		'Mr+De+Haviland::latin', 
//		'Mrs+Saint+Delafield::latin',
//		
//		// slab
//		'Alfa+Slab+One::latin'

	] }
};

//	If you have a Typekit account, enter your id here to load fonts 
//	Do the same for other font providers
//	WebFontConfig = {
//		typekit: {
//			id: 'myKitId'
//		}
//	};

(function() {
	var wf = document.createElement('script');
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();


// hide sidebar -------------------------------------------------
function hide_sidebar() {
	jQuery('.sidebar').stop(true, true).animate({left:'-25%'},800, 'easeOutBack' );
	jQuery('.main_content').stop(true, true).animate({marginLeft:'0', width: '100%'},800, 'easeOutBack' );
	jQuery('.sidebar_toolbar').stop(true, true).animate({marginLeft:'-25%'},800, 'easeOutBack' );
	jQuery('.hide_sidebar').addClass('hidden');
	jQuery('.show_sidebar').removeClass('hidden');	
}

// already hidden sidebar (use values to set cookie)-------------------------------------------------
function hidden_sidebar() {
	jQuery('.sidebar').css( {left:'-25%' } );
	jQuery('.main_content').css( {marginLeft:'0', width: '100%'} );
	jQuery('.sidebar_toolbar').css( {marginLeft:'-25%'} );
	jQuery('.hide_sidebar').addClass('hidden');
	jQuery('.show_sidebar').removeClass('hidden');	
}

// show sidebar -------------------------------------------------
function show_sidebar() {
	jQuery('.sidebar').stop(true, true).animate({left:'0'},400, 'easeInSine' );
	jQuery('.main_content').stop(true, true).animate({marginLeft:'25%', width: '75%'},400, 'easeInSine' );
	jQuery('.sidebar_toolbar').stop(true, true).animate({marginLeft:'0'},400, 'easeInSine' );
	jQuery('.show_sidebar').addClass('hidden');
	jQuery('.hide_sidebar').removeClass('hidden');	
}


// show/hide comments -------------------------------------------------
function show_comments() {
	jQuery('#post_comments').stop(true, true).animate({left:'0%'}, 800, 'easeOutBack' );
	jQuery('.show_hide_comments').addClass('engaged_action');
	jQuery('.close_right_content').stop(true, true).animate({right:'0'}, 'fast', 'easeOutBack' );
	jQuery('body').addClass('freeze');
	jQuery('#inner-wrap').addClass('no_transform');
	jQuery.cookie('collapsible_comments', 'show_comments', { expires: 1 });
}
function hide_comments() {
	jQuery('#post_comments').stop(true, true).animate({left:'100%' }, 800, 'easeOutBack' );
	jQuery('.show_hide_comments').removeClass('engaged_action');
	jQuery('body').removeClass('freeze');
	jQuery('#inner-wrap').removeClass('no_transform');
	jQuery.removeCookie('collapsible_comments');
}

// show/hide author -------------------------------------------------
function show_author() {
	jQuery('#post_author_meta').stop(true, true).animate({left:'0%'}, 800, 'easeOutBack' );
	jQuery('.show_hide_author').addClass('engaged_action');
	jQuery('.close_right_content').stop(true, true).animate({right:'0'}, 'fast', 'easeOutBack' );
	jQuery('body').addClass('freeze');
	jQuery('#inner-wrap').addClass('no_transform');
	jQuery.cookie('collapsible_author', 'show_author', { expires: 1 });
}
function hide_author() {
	jQuery('#post_author_meta').stop(true, true).animate({left:'100%'}, 'slow', 'easeOutBack' );
	jQuery('.show_hide_author').removeClass('engaged_action');
	jQuery('body').removeClass('freeze');
	jQuery('#inner-wrap').removeClass('no_transform');
	jQuery.removeCookie('collapsible_author');
}

// show/hide meta -------------------------------------------------
function show_meta() {
	jQuery('#post_meta_content').stop(true, true).animate({left:'0%'}, 800, 'easeOutBack' );
	jQuery('.show_hide_meta').addClass('engaged_action');
	jQuery('.close_right_content').stop(true, true).animate({right:'0'}, 'fast', 'easeOutBack' );
	jQuery('body').addClass('freeze');
	jQuery('#inner-wrap').addClass('no_transform');
	jQuery.cookie('collapsible_meta', 'show_meta', { expires: 1 });
}
function hide_meta() {
	jQuery('#post_meta_content').stop(true, true).animate({left:'100%'}, 'slow', 'easeOutBack' );
	jQuery('.show_hide_meta').removeClass('engaged_action');
	jQuery('body').removeClass('freeze');
	jQuery('#inner-wrap').removeClass('no_transform');
	jQuery.removeCookie('collapsible_meta');
}


// show/hide twitter twitter_widget -------------------------------------------------
function show_twitter() {
	jQuery('#twitter_widget').stop(true, true).animate({left:'0%'}, 800, 'easeOutBack' );
	jQuery('.show_hide_twitter').addClass('engaged_action');
	jQuery('.close_right_content').stop(true, true).animate({right:'0'}, 'fast', 'easeOutBack' );
	jQuery('body').addClass('freeze');
	jQuery('#inner-wrap').addClass('no_transform');
	// no real reason to set a cookie for this.
	// nothing of real value needs to persist
	// uncomment if you want to set cookie. 
	//jQuery.cookie('collapsible_twitter', 'show_twitter', { expires: 1 });
}
function hide_twitter() {
	jQuery('#twitter_widget').stop(true, true).animate({left:'100%'}, 'slow', 'easeOutBack' );
	jQuery('.show_hide_twitter').removeClass('engaged_action');
	jQuery('body').removeClass('freeze');
	jQuery('#inner-wrap').removeClass('no_transform');
	jQuery.removeCookie('collapsible_twitter');
}


// show/hide contact -------------------------------------------------
function show_contact() {
	jQuery('#contact_form').stop(true, true).animate({left:'0%'}, 800, 'easeOutBack' );
	jQuery('.show_hide_contact').addClass('engaged_action');
	jQuery('.close_right_content').stop(true, true).animate({right:'0'}, 'fast', 'easeOutBack' );
	jQuery('body').addClass('freeze');
	jQuery('#inner-wrap').addClass('no_transform');
	jQuery.cookie('collapsible_contact', 'show_contact', { expires: 1 });
}
function hide_contact() {
	jQuery('#contact_form').stop(true, true).animate({left:'100%'}, 'slow', 'easeOutBack' );
	jQuery('.show_hide_contact').removeClass('engaged_action');
	jQuery('body').removeClass('freeze');
	jQuery('#inner-wrap').removeClass('no_transform');
	jQuery.removeCookie('collapsible_contact');
}


// show/hide search -------------------------------------------------
function show_search() {
	jQuery('#right_search_content').stop(true, true).animate({left:'0%'}, 800, 'easeOutBack' );
	jQuery('.show_hide_search').addClass('engaged_action');
	jQuery('.close_right_content').stop(true, true).animate({right:'0'}, 'fast', 'easeOutBack' );
	jQuery('body').addClass('freeze');
	jQuery('#inner-wrap').addClass('no_transform');
	// jQuery.cookie('collapsible_search', 'show_search', { expires: 1 });
}
function hide_search() {
	jQuery('#right_search_content').stop(true, true).animate({left:'100%'}, 'slow', 'easeOutBack' );
	jQuery('.show_hide_search').removeClass('engaged_action');
	jQuery('body').removeClass('freeze');
	jQuery('#inner-wrap').removeClass('no_transform');
	// jQuery.removeCookie('collapsible_search');
}


jQuery(document).ready(function($) {



	// dropdown(s)--------------------------------------------------
	jQuery('.main_nav ul.sf-menu').superfish({
		delay:       1000,                            // one second delay on mouseout
		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
		speed:       'fast',                          // faster animation speed
		autoArrows:  false                            // disable generation of arrow mark-up
	});

	// sidebar overflow scroll-------------------------------------------------
	jQuery(".nano").nanoScroller( );
	
	// ELASTIC TEXTAREA (auto-adjust height)-------------------------------------------------
	jQuery('textarea').autosize();

	// search field placeholder-------------------------------------------------
	jQuery('.search_form input[type=text]').val("search the site. . .").focus(function() {
		if(jQuery(this).val()=="search the site. . ."){
			jQuery(this).val("");
		}
		}).blur(function(){
			if(jQuery(this).val()==""){
			jQuery(this).val("search the site. . .");
		}
	});
	
	// show /hide sidebar  + add cookie-------------------------------------------------
	jQuery( ".hide_sidebar" ).on("click", function(e) {
		hide_sidebar();
		//jQuery.cookie('collapsible', 'collapsed', { expires: 1, path: '/' });
		e.preventDefault();
	});
	jQuery( ".show_sidebar" ).on("click", function(e) {
		show_sidebar();
		jQuery.removeCookie('collapsible', { path: '/' });
		e.preventDefault();
	});
	//set the cookie
	var collapsible = jQuery.cookie('collapsible');
	if (collapsible == 'collapsed') {
		hide_sidebar();
	};


	
	
	// show /hide comments-------------------------------------------------
	jQuery('.show_hide_comments').on("click", function(e) {
		hide_author();
		hide_meta();
		hide_twitter();
		hide_contact();
		hide_search();
		show_comments();
		e.preventDefault();
	});
	//set the cookie
	var collapsible_comments = jQuery.cookie('collapsible_comments');
	if (collapsible_comments == 'show_comments') {
		show_comments();
	};
	

	// show /hide author-------------------------------------------------
	jQuery('.show_hide_author').on("click", function(e) {
		jQuery('#post_author_meta .pic_and_title .author_avatar,	#post_author_meta h2, #post_author_meta .meta_details *').addClass('boyoyoing');
		hide_meta();
		hide_comments();
		hide_twitter();
		hide_contact();
		hide_search();
		show_author();
		e.preventDefault();
	});
	//set the cookie
	var collapsible_author = jQuery.cookie('collapsible_author');
	if (collapsible_author == 'show_author') {
		show_author();
	};
	
	

	// show /hide meta-------------------------------------------------
	jQuery('.show_hide_meta').on("click", function(e) {
		hide_comments();
		hide_author();
		hide_twitter();
		hide_contact();
		hide_search();
		show_meta();
		e.preventDefault();
	});
	//set the cookie
	var collapsible_meta = jQuery.cookie('collapsible_meta');
	if (collapsible_meta == 'show_meta') {
		show_meta();
	};
	
	

	// show /hide twitter-------------------------------------------------
	jQuery('.show_hide_twitter').on("click", function(e) {
		hide_comments();
		hide_author();
		hide_meta();
		hide_contact();
		hide_search();
		show_twitter();
		e.preventDefault();
	});
	//set the cookie
	var collapsible_twitter = jQuery.cookie('collapsible_twitter');
	if (collapsible_twitter == 'show_twitter') {
		show_twitter();
	};
	// if twitter widget div is hidden,
	// let's make sure we call the hide_twitter() function.
	// Fringe case but possible
	if ( !jQuery('#twitter_widget').length ){
        hide_twitter();
        //jQuery('.close_right_content').stop(true, true).animate({right:'-200'}, 'fast', 'easeOutBack' );
    }
    
    	

	// show /hide contact-------------------------------------------------
	jQuery('.show_hide_contact').on("click", function(e) {
		jQuery('#cake_form p *, #cake_form p ').addClass('slide_bottom_to_top');
		hide_comments();
		hide_author();
		hide_meta();
		hide_twitter();
		hide_search();
		show_contact();
		// focus the first field of the contact form
		// isn't smooth on mobile
		// jQuery('#contactName').focus();
		e.preventDefault();
	});
	//set the cookie
	var collapsible_contact = jQuery.cookie('collapsible_contact');
	if (collapsible_contact == 'show_contact') {
		show_contact();
	};
	// if contact form div is hidden/ not available,
	// let's make sure we call the hide_contact() function
	if ( !jQuery('#contact_form').length ){
        hide_contact();
        //jQuery('.close_right_content').stop(true, true).animate({right:'-200'}, 'fast', 'easeOutBack' );
    }	
    
    	

	// show /hide search-------------------------------------------------
	jQuery('.show_hide_search').on("click", function(e) {
		jQuery('.search_form').addClass('boyoyoing');
		hide_comments();
		hide_author();
		hide_meta();
		hide_twitter();
		hide_contact();
		show_search();
		// focus the search field
		// isn't smooth on mobile
		// jQuery('#search_field').focus();
		e.preventDefault();
	});
	

	// hide right content -------------------------------------------------
	jQuery('.close_right_content').on("click", function(e) {
		jQuery(this).stop(true, true).animate({right:'-200'}, 'fast', 'easeOutBack' );
		jQuery('#inner-wrap').removeClass('no_transform');
		hide_author();
		hide_meta();
		hide_comments();
		hide_twitter();
		hide_contact();
		hide_search();
		e.preventDefault();
	});
	/*esc button pressed*/
	jQuery('body').keydown( function( event ) {
		if ( event.which == 27 ) {
			jQuery('.close_right_content').stop(true, true).animate({right:'-200'}, 'fast', 'easeOutBack' );
			jQuery('#inner-wrap').removeClass('no_transform');
			hide_author();
			hide_meta();
			hide_comments();
			hide_twitter();
			hide_contact();
			hide_search();
		}
	});
	
	// show/hide sidebar section(s) -------------------------------------------------
	jQuery('.section_title, .widget h3').on("click", function(e) {
		jQuery(this).next(".section_content").slideToggle('slow', function() {
		    // Animation complete.
		});		
		e.preventDefault();
	});
	

	// direction arrow (keyboard) navigation -------------------------------------------------
	// todo: we should first make sure no input fields are in focus
	// before we bind the keys...
	jQuery('body').keyup(function (event) {
	//jQuery(document.documentElement).keyup(function (event) {
	  if (event.keyCode == 37 && jQuery('.next_post a').length ) {
	    window.location.href = jQuery('.next_post a').attr('href');    
	  } else if (event.keyCode == 39 && jQuery('.prev_post a').length ) {
		window.location.href = jQuery('.prev_post a').attr('href');
	  }
	});	
	
	
	//	ajax contact form submission ----------------------------------------------------------
	jQuery('#cake_form').on("submit", function() {
		$('#cake_form .error').remove();
		var hasError = false;
		jQuery('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				var labelText = $(this).prev('label').text();
				jQuery(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
				//$(this).addClass('error');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					var labelText = jQuery(this).prev('label').text();
					jQuery(this).parent().append('<span class="error">You entered an invalid '+labelText+'.</span>');
					//$(this).addClass('error');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			jQuery('#cake_form .button').fadeOut('normal', function() {
				jQuery(this).parent().append('Sending...');
			});
			var contactName = jQuery("#contactName").val();
			var formInput = jQuery(this).serialize();
			jQuery.post(jQuery(this).attr('action'),formInput, function(data){
				jQuery('#cake_form').slideUp("fast", function() {				   
					jQuery(this).before('<p class="thanks"><strong>Thanks, '+contactName+'!</strong> Your email was successfully sent!</p>');
					setTimeout(function() {
						hide_contact();
						jQuery('.close_right_content').stop(true, true).animate({right:'-200'}, 'fast', 'easeOutBack' );
						jQuery('#inner-wrap').removeClass('no_transform');
					}, 3000);

				});
			});
		}
		return false;
	});
	
	
	
	// flexslider (media)--------------------------------------------------
	jQuery('.odd .flexslider').flexslider({
			animation: Modernizr.touch ? "slide" : "fade",
			animationLoop: true,
			direction: "horizontal",
			easing: "swing",
			controlNav: false,
			mousewheel: false,
			pauseOnHover: true,       
			slideshow: true,
			smoothHeight: true,
			//initDelay: 1200,
			slideshowSpeed: 7000
	});
	jQuery('.even .flexslider').flexslider({
	    	animation: Modernizr.touch ? "slide" : "fade",
			animationLoop: true,
			direction: "horizontal",
			easing: "swing",
			controlNav: false,
			mousewheel: false, 
			pauseOnHover: true,      
			slideshow: true,
			smoothHeight: true,
			//initDelay: 1200,
			slideshowSpeed: 7500		
	});
	
	// flexslider (reviews)--------------------------------------------------
	jQuery('.full_width_slider').flexslider({
	    	animation: Modernizr.touch ? "slide" : "fade",
			animationLoop: true,
			direction: "horizontal",
			easing: "swing",
			controlNav: false,
			mousewheel: false, 
			pauseOnHover: true,      
			slideshow: false,
			smoothHeight: true,
			//initDelay: 1200,
			slideshowSpeed: 7500		
	});
	
	
	
	// Modal --------------------------------------------------
	jQuery( ".action_modal" ).draggable({ handle: ".modal_header" });
	jQuery('.show_hide_options').on("click", function(e) {
		jQuery('.action_modal').addClass('boyoyoing');
		jQuery('.action_modal').show();
		jQuery('.modal_overlay').show();
		jQuery('#inner-wrap').addClass('no_transform');
		jQuery('body').addClass('freeze');		
		e.preventDefault();
	});
	jQuery('.modal_close,.modal_overlay, .modal_nav a, .general_actions a').on("click", function(e) {
		jQuery('.action_modal').addClass('boyoyoing');
		jQuery('.action_modal,.modal_overlay').hide( );
		jQuery('body').removeClass('freeze');		
		//jQuery('#inner-wrap').removeClass('no_transform');
		e.preventDefault();
	});	
	jQuery('.modal_close,.modal_overlay').on("click", function(e) {
		jQuery('#inner-wrap').removeClass('no_transform');
		jQuery('body').removeClass('freeze');		
		e.preventDefault();
	});	
	jQuery('.modal_nav a, .general_actions a').on("click", function(e) {
		jQuery('#inner-wrap').addClass('no_transform');
		jQuery('body').addClass('freeze');		
		e.preventDefault();
	});	
	

	// drop down menu nav (on small screens) ---------------------------------------------
	// Create the dropdown base
	jQuery("<select />").appendTo(".header .main_nav");
	// Create default option "Go to..."
	jQuery("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Go to..."
	}).appendTo(".header select");
	// Populate dropdown with menu items
	jQuery(".header .main_nav a").each(function() {
		var el = jQuery(this);
		jQuery("<option />", {
		   "value"   : el.attr("href"),
		   "text"    : el.text()
		}).appendTo(".header select");
	});
	// change window.location to value of option:selected	
	jQuery(".header select").change(function() {
		window.location = jQuery(this).find("option:selected").val();
	});


	// mediaCheck  --------------------------------------------------
	jQuery(function() {


	  mediaCheck({
	    media: '(max-width: 800px)',
	    entry: function() {
			jQuery.removeCookie('collapsible', { path: '/' });
	    },
	    exit: function() {
			jQuery.removeCookie('collapsible', { path: '/' });			
	    }
	  });



	  mediaCheck({
	    media: '(max-width: 650px)',
	    entry: function() {
			// smaller screens
      
	    },
	    exit: function() {
	      	// larger screens
	
			// Waypoints --------------------------------------------------
			// do some zegzy stuff when we scroll into/out of view
			jQuery('.features_block .features .feature_description, .contributors_block .contributor .contributor_image').waypoint(function() {
			  jQuery(this).addClass('boyoyoing');
			}, { offset: '105%' });	
			jQuery('.features_block .odd .feature_media, .contributors_block .contributor:nth-child(odd) .contributor_info ').waypoint(function() {
			  jQuery(this).addClass('slide_right_to_left');
			}, { offset: '105%' });	
			jQuery('.features_block .even .feature_media, .contributors_block .contributor:nth-child(even) .contributor_info  ').waypoint(function() {
			  jQuery(this).addClass('slide_left_to_right');
			}, { offset: '105%' });	
		
	
	    }
	    
	  });

	});


	// colorbox (lightbox) --------------------------------------------------
	// activate all images with this class
	jQuery(".enlargen").on("hover", function(e) {
		jQuery(".enlargen").colorbox({
			rel:'enlargen', 
			slideshow:true,
			slideshowSpeed: 4000,
			slideshowAuto: true
		});
		e.preventDefault();
	});
	
	// gallery page photos
	jQuery('.gallery-icon a').colorbox({
		rel:'gallery-viewer',
		slideshow:true,
		slideshowSpeed: 4000,
		slideshowAuto: true,
		slideshowStart: 'play',
		slideshowStop: 'pause'		
	});
	


	

});



jQuery(window).load(function() {
	// let's make sure some elements aren't
	// covered up by the WordPress admin menu
	// whenever it's visible and only when
	// window is larger than 800px
	function resize_for_admin_bar() {
		var windowsize = jQuery(window).width();
		if ( jQuery('#wpadminbar').length && windowsize > 800 ){
		        jQuery('.header').animate({top:'28'},800, 'easeOutBack' );
		        jQuery('.sidebar .content').animate({paddingTop:'68'},800, 'easeInSine' );
	    } 
	    else if ( jQuery('#wpadminbar').length && windowsize < 800 ){
		        jQuery('header').animate({top:'0'},800, 'easeOutBack' );
		        jQuery('.sidebar .content').animate({paddingTop:'50'},800, 'easeInSine' );
	    }
	}resize_for_admin_bar();
	jQuery(window).resize(function(){
		resize_for_admin_bar();
	});
});