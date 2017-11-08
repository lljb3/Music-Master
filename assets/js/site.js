(function ($, window, document) {

	// Require.JS
	requirejs.config({
		paths: {
			'angular': '/wp-content/themes/corp-full-theme/assets/js/lib/angular.min',
			'plugins': '/wp-content/themes/corp-full-theme/assets/js/lib/plugins.min',
		},
		shim: {
			'scrollreveal': {
				deps: ['jquery'],
			}
		},
	});
	if (typeof jQuery === 'function') {
		define('jquery', function () { return jQuery; });
	}
	requirejs(['angular','plugins'], function() {
		
		// Global Vars
		var windowHeight = $(window).innerHeight();
		var menu = $('#header-container');
		var origOffsetY = menu.offset().top;
		
		// Sticky Header
		function scroll() {
			if ($(window).scrollTop() <= origOffsetY) {
				$("#header-container").removeClass('sticky');
				$('.jumbotron').removeClass('menu-padding');
			} else {
				$("#header-container").addClass('sticky');
				$('.jumbotron').addClass('menu-padding');
			}
		}
		document.onscroll = scroll;
		
		// Transition Navbar
		$(document).on("scroll",function(){
			if($(document).scrollTop() > 300){
				$("#trans-menu").removeClass("large").addClass("small");
			} 
			else{
				$("#trans-menu").removeClass("small").addClass("large");
			}
		});

		// Navbar Dropdown
		function is_touch_device() {
			return 'ontouchstart' in window // Works on most browsers 
			|| navigator.maxTouchPoints; // Works on IE10/11 and Surface
		};
		if(!is_touch_device() && $('.navbar-toggle:hidden')){
			$('.dropdown-menu', this).css('margin-top',0);
			$('.dropdown').hover(function(){ 
				$('.dropdown-toggle#dropdown-main', this).trigger('click');
				// Uncomment below to make the parent item clickable.
				$('.dropdown-toggle#dropdown-main', this).toggleClass("disabled"); 
			});			
		}
		if(is_touch_device()) {
			$('<a href="#" data-toggle="dropdown" id="dropdown-arrow" aria-haspopup="true" class="dropdown-toggle visible-xs"><i class="glyphicon glyphicon-chevron-down"></i></a>').insertAfter('.dropdown-toggle#dropdown-main');
			$('.dropdown-toggle#dropdown-main', this).toggleClass("disabled");
		}

		// Flowtype
		$('body').flowtype({
			minimum   : 300,
			maximum   : 3000,
			minFont   : 16,
			maxFont   : 48,
			fontRatio : 81
		});
			
		// Height to Viewport
		$(this).ready(function(e) {
			function setHeight() {
				windowHeight = $(window).innerHeight();
				$('.jumbotron').css('min-height', windowHeight);
				$('.jumbotron .slider').css('min-height', windowHeight);
			};
			setHeight();
			// Window Resize			
			$(window).resize(function() {
				setHeight();
			});
		});
			
		// To Top Button
		var offset = 220;
		var duration = 600;
		$(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.totop').addClass('fadeIn').removeClass('fadeOut');
			} else {
				jQuery('.totop').addClass('fadeOut').removeClass('fadeIn');
			}
		});
		
		// Facebook API
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		// Twitter API
		!function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
			if(!d.getElementById(id)){
				js=d.createElement(s); js.id=id;
				js.src=p+"://platform.twitter.com/widgets.js";
				fjs.parentNode.insertBefore(js,fjs);
			}
		}(document,"script","twitter-wjs");
		
		// Detect External Links
		var externallinkage = $('a').click(function() {
			var href = $(this).attr('href');
			if ((href.match(/^https?\:/i)) && (!href.match(document.domain))) {
				var extLink = href.replace(/^https?\:\/\//i, '');
			}
		});
		externallinkage.init();

		// AnivewJS Options
		var options = {
			animateThreshold: 100,
			scrollPollInterval: 20
		}
		$('.aniview').AniView(options);
		
	});
					
})(jQuery, window, document);