/*
 Main JS functions and function settings
 v 1.4
*/

// for .full-height when VH CSS until not understood.
if($('.no-cssvhunit body.logged-in header.dynamic-height, .no-cssvhunit header.full-height').length) {
	$(window).load(function(){
		"use strict";
		var maxheight = $( window ).height();
		$('.no-cssvhunit body.logged-in header.dynamic-height, .no-cssvhunit header.full-height').height(maxheight);
	});
}


// READY!
$( document ).ready(function() {
	
	// Hamberger Cross
	if($('nav.hamburger-cross').length) {
		var trigger = $('.hamburger-cross .navbar-toggler'), isClosed = false;
		trigger.click(function () {
			hamburger_cross();      
		});
		function hamburger_cross() {
			"use strict";
			if (isClosed == true) {          
				trigger.removeClass('is-open is-closed');
				trigger.addClass('is-closed');
				//trigger.switchClass( "is-open", "is-closed");
				isClosed = false;
			} else {   
				trigger.removeClass('is-open is-closed');
				trigger.addClass('is-open');
				//trigger.switchClass( "is-closed", "is-open");
				isClosed = true;
			}
		}
	}
	
	// Fixed Navigation Padding - @since v0.6
	if($('nav.navbar-fixed-top').length) {
		var navheight = $('nav.navbar-fixed-top').height();
		$('body').css('padding-top', navheight);
	}
	if($('nav.navbar-fixed-bottom').length) {
		var navheight = $('nav.navbar-fixed-bottom').height();
		$('body').css('padding-bottom', navheight);
	}
	
	// Search Page Auto-Focus
	if($('body.page-template-page-search').length){
		"use strict";
		setTimeout(function(){
			$('#searchform input').focus();
		}, 550);
	}
	
	// Processing Buttons
	$('.btn-process').click(function() {
		"use strict";
		var button = $(this)
		button.addClass('processing');
		setTimeout(function(){
			button.removeClass('processing');
		}, 800);
		
	});
	
	$('.wpcf7-submit.btn-process').click(function() {
		"use strict";
		$('.wpcf7-submit').addClass('processing');
		setTimeout(function(){
			$('.wpcf7-submit').removeClass('processing');
		}, 800);
		
	});
	
	// Vertical Center WITHOUT flexbox...
	if($('.vcenter').length) {
		if (Modernizr.mq('(min-width : 600px)')) {
			// vcenter tricks
			$('.vcenter').each(function() {
				var text = $(this);
				var vheight = $(this).parent().parent().height();
				var lheight = vheight + 'px';
				$(text).addClass('see-u');
				$(text).css({'line-height':lheight,'height':vheight});
				$(text).addClass('htest-'+vheight);
			});
		}
	}
	
	// Smooth ScrollTo Function (just add class .scrollto)
	$('a.scrollto').click(function(evt){
		"use strict";
		evt.preventDefault();
		var scrollto = $(this).attr('href');
		if (scrollto.indexOf('#') >= 0) {
			$("html, body").animate({scrollTop: $(scrollto).offset().top }, 900); 
		}
	});
	
	if($('.jumboscroll').length) {
		$('.jumboscroll button, .skip-link').click(function(evt){
			"use strict";
			evt.preventDefault();
			var scrollto = $('section:first-of-type');
			$("html, body").animate({scrollTop: $(scrollto).offset().top }, 900); 
		});
	}
	
	// IE Fix - http://getbootstrap.com/getting-started/#support-ie10-width
	if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
	  var msViewportStyle = document.createElement('style')
	  msViewportStyle.appendChild(
		document.createTextNode(
		  '@-ms-viewport{width:auto!important}'
		)
	  )
	  document.querySelector('head').appendChild(msViewportStyle)
	}
	
	// JDM Frontend Admin Buttons
	if($('#fab-admin-btns').length) {
		$('#hide-admin-buttons').click(function() {
			$('#fab-admin-btns').fadeOut();
		});
	}
	
	$("img.lazy").lazyload({effect : "fadeIn"});
	
	// SVGeezy Init
	//svgeezy.init('nocheck', 'png');
	
	// For social small window
	$('.mini').click(function(event) {
		"use strict";
		var width 	= 	575,
		height 		= 	400,
		left   		= 	($(window).width()  - width)  / 2,
		top    		= 	($(window).height() - height) / 2,
		url    		= 	this.href,
		opts   		= 	'status=1' +
						',width='  + width  +
						',height=' + height +
						',top='    + top    +
						',left='   + left;
	
		window.open(url, 'Share', opts);
		return false;
	});
	
	// Adds .vp to the footer container when it's 15px inside in the current viewport
	$('footer .container').viewportChecker({
		classToAdd: 'vp',
		offset: 15,
		repeat: true
	});
	

	// For Back-top-top (#pageup) 
	$.fn.pageup = function(options) {
		var options = $.extend({}, $.fn.pageup.defaults, options);
		return this.each(function() {
			var $this = $(this);
			$(document).scroll(function(){
				if ($(this).scrollTop() > options.offset) {
					//$this.fadeIn(options.fadeDelay);
					$this.fadeIn("slow");
					if($('footer .container').hasClass('full-visible')) {
						$this.addClass('lighter');
					} else {
						$this.removeClass('lighter');
					}
				} else {
					//$this.fadeOut(options.fadeDelay);
					$this.fadeOut("fast").removeClass('lighter');
				}
			});
			$this.click(function(){
				$('html, body').animate({scrollTop : 0}, options.scrollDuration);
				$this.fadeOut("fast");
				return false;
			});
		});
		return $this;
	};
	
	$.fn.pageup.defaults = {
		offset: 500,
		//fadeDelay: 250,
		scrollDuration: 750
	};
	
	if($('#pageup').length) {
		$("#pageup").pageup();
	}
	
	
	
	// 4-Column slick
	$('.slick-col-3').slick({
	  arrows: false,
	  dots: true,
	  infinite: false,
	  speed: 400,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 4,
			slidesToScroll: 4,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 900,
		  settings: {
			slidesToShow: 4,
			slidesToScroll: 4,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		}]
	});
	
	
	// Three-Column Slick
	$('.slick-col-4').slick({
	  arrows: false,
	  dots: true,
	  infinite: false,
	  speed: 400,
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 900,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}]
	});
	
	// Two-Column Slick
	$('.slick-col-6').slick({
	  arrows: false,
	  dots: true,
	  infinite: true,
	  speed: 400,
	  slidesToShow: 2,
	  slidesToScroll: 2,
	  responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 900,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}]
	});
	
	// One-Column Slick
	$('.slick-col-12').slick({
	  arrows: false,
	  dots: true,
	  infinite: false,
	  speed: 400,
	  slidesToShow: 1,
	  slidesToScroll: 1
	});
	
	// One-Column Slick for Testimonials
	$('.jdm-testimonials').slick({
	  arrows: false,
	  dots: true,
	  infinite: true,
	  speed: 400,
	  autoplay: true,
  	  autoplaySpeed: 9000,
	  slidesToShow: 1,
	  slidesToScroll: 1
	});
	
	/* enable tooltips only on wide or non-touch devices */
	if (Modernizr.mq('(min-width : 992px)')) {
		$('.social-share .btn-group a').tooltip({container: 'body', placement: 'bottom'});
	}
	
	/* DEMO-ONLY */
	function toggleCodes(on) {
		var obj = document.getElementById('icondemo');
		if (on) {
			obj.className += ' codesOn';
		} else {
			obj.className = obj.className.replace(' codesOn', '');
		}
	}
	
	
}) // END doc.ready
