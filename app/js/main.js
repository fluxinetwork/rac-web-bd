/*------------------------------*\

    #CONFIG

\*------------------------------*/

var siteURL = '';
var themeURL = '/wp-content/themes/rac-web-bd/';
var isMobile = false;
var isHome = false;
var isBD = false;

// Activate resize events
var resizeEvent = false;
var resizeDebouncer = true;

// Store window sizes
var windowH; 
var windowW; 
calc_window();
var docH;

// Breakpoint
var bpSmall;
var bpMedium;
var bpLarge;
var bpXlarge;




/*------------------------------*\

    #READY

\*------------------------------*/


var FOO = {
    common: {
        init: function() {    
            global_share();
            nav();

            if( $('body').hasClass('touch') ) {
                isMobile = true;
            }

            setTimeout(function(){
                $('.load').fadeOut(200, function(){
                    $('.load').remove();
                });
                $('body').removeClass('is-loading');
                $('.wrap-resume').addClass('animated bounceInUp');
            }, 1000);
        }
    },
    page_template_page_bd: {
        init: function() {
            isBD = true;
            init_share();
            pos_share();
            pos_bd();
            lazy();
            waypoints();
        }
    }
    
};

var UTIL = {
    fire: function(func, funcname, args) {
        var namespace = FOO;
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
          namespace[func][funcname](args);
        }
    },
    loadEvents: function() {
        UTIL.fire('common');
        $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
          UTIL.fire(classnm);
        });
    }
};

$(document).ready(UTIL.loadEvents);





/*------------------------------*\

    #RESIZE

    Is activated by vars in config.js

\*------------------------------*/

/**
 * Get window sizes
 * Store results in windowW and windowH vars
 */

// Get width and height
function calc_window() {
    calc_windowW();
    calc_windowH();
}
// Get width
function calc_windowW() {
    windowW = $(window).width();
}
// Get height
function calc_windowH() {
    windowH = $(window).height();
    docH = $(document).height();
}


/**
 * MAIN RESIZE EVENT
 *
 */

function resize_handler() {
    calc_windowH();
}
if ( resizeEvent ) { $( window ).bind( "resize", resize_handler() ); }


/**
 * DEBOUNCER
 * Fire event when stop resizing
 */

function debouncer( func , timeout ) {
    var timeoutID;
    var timeoutVAR;

    if (timeout) {
        timeoutVAR = timeout;
    } else {
        timeoutVAR = 200;
    }

    return function() {
        var scope = this , args = arguments;
        clearTimeout( timeoutID );
        timeoutID = setTimeout( function () {
            func.apply( scope , Array.prototype.slice.call( args ) );
        }, timeoutVAR );
    };

}

function debouncer_handler() {
    calc_window();
    if (isBD) {
        posBd();
    }
}
if ( resizeDebouncer ) { $( window ).bind( "resize", debouncer(debouncer_handler) ); }





/*------------------------------*\

    #SCROLL-TO

\*------------------------------*/

function scroll_to(position, duration, relative) {
	var coef;
	var top;
	var bottom;

	if (position === 'top') {
		position = 0;
		top = true;
	} else if (position === 'bottom') {
		position = $(document).height()-$('.footer').height();
		bottom = true;
	} else {
		position = position.offset().top;
	}

	if (duration === 'fast') {
		coef = 0.1;
		duration = 200;
	} else if (duration === 'normal') {
		coef = 0.25;
		duration = 350;
	} else if (duration === 'slow') {
		coef = 0.4;
		duration = 500;
	} else {
		coef = duration/1000;
	}

	if (relative === true) {
		calc_windowH();
		if (top) {
			duration = $(document).height()*coef;
		} else if (bottom) {
			duration = ($(document).height()-$(document).scrollTop())*coef;
		}
	}

	$('html, body').animate({scrollTop: position}, duration);
}

function pos_bd () {
    $('.wrap-bd').css('margin-top', windowH);
}
function lazy() {
	$("img.lazy").unveil(200, function() {
	    $(this).load(function() {
			$(this).waypoint(function() {
				var anim = $(this.element).attr('data-anim-class');
				$(this.element).addClass(anim).removeClass('is-hidden');
			}, {offset: '80%'})
	    });
	}).removeClass('lazy');
}


/*------------------------------*\

    #NAV

\*------------------------------*/

function nav() {
	$(document).mousewheel(function(event) {
		var documentOffset = $(window).scrollTop();
		console.log(documentOffset);
	    if (event.deltaY<0 && !$('.nav').hasClass('is-off') && !$('body').hasClass('is-loading') && documentOffset > 100) {
	        $('.nav').addClass('is-off');
	    } else if (event.deltaY>0 && $('.nav').hasClass('is-off') && !$('body').hasClass('is-loading')) {
	        $('.nav').removeClass('is-off');
	    }
	});

	$('.js-first-scroll').click(function(){
		scroll_to($('.wrap-bd'), 'slow', false);
		$('.nav').addClass('is-off');
	})

	$('.js-scroll-top').click(function(){
		scroll_to('top', 'normal', true);
		$('.nav').removeClass('is-off');
	})
}
function global_share() {

}

function init_share() {
	var popupCenter = function(url, title, width, height){
		var popupWidth = width || 640;
		var popupHeight = height || 320;
		var windowLeft = window.screenLeft || window.screenX;
		var windowTop = window.screenTop || window.screenY;
		var windowWidth = window.innerWidth || document.documentElement.clientWidth;
		var windowHeight = window.innerHeight || document.documentElement.clientHeight;
		var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2 ;
		var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
		var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
		popup.focus();
		return true;
	};

	$('.js-share').on('click', function(e){
		e.preventDefault();

		var network = $(this).attr('data-network');
		var url = $(this).attr('data-url');
		var shareUrl;

		if (network == 'facebook') {
			shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
			popupCenter(shareUrl, "Partager sur Facebook");
		} if (network == 'twitter') {
			var origin = "transitioncit";
			shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
	            "&via=" + origin + "" +
	            "&url=" + encodeURIComponent(url);
			popupCenter(shareUrl, "Partager sur Twitter");
		}
	});
}

function pos_share() {
	
}
function waypoints() {
	$('.wrap-bd').waypoint(function(){
		$('.resume').toggleClass('is-out');
	}, {offset: '90%'});

	$('.wrap-bd').waypoint(function(){
		$('.hero').toggleClass('is-hidden');
		$('.scroll-down, .scroll-top').toggleClass('is-off');
	}, {offset: '50%'});

	$('.planche__share').waypoint(function(){
		$(this.element).toggleClass('is-visible');
	}, {offset: '80%'});
}