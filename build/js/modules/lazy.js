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

