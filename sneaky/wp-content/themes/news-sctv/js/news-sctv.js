(function($){

	console.log('To Zanarkand');

	var menuBar = $('#site-menu-bar');
	var menuNav = $('#site-navigation');

	menuBar.click(function(){
		$('body').toggleClass('menu-active');
	});



})(jQuery);