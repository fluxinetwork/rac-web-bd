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