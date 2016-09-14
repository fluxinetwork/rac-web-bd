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