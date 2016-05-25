(function($){

	console.log('To Zanarkand');

	var menuBar = $('#site-menu-bar');
	var menuNav = $('#site-navigation');

	menuBar.click(function(){
		$(this).parents('#page').toggleClass('active');
		$('body').css('overflow', 'hidden');
	});



})(jQuery);