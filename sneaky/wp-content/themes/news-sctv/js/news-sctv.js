(function($){

	console.log('To Zanarkand');

	var menuBar = $('#site-menu-bar');

	menuBar.click(function(){
		$(this).toggleClass('active');
	});

})(jQuery);