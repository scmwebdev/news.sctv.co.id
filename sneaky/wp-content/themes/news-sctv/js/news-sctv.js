(function($) {

    function menuBar() {
        var menuBar = $('#site-menu-bar');
        var menuNav = $('#site-navigation');

        menuBar.click(function() {
            $('body').toggleClass('menu-active');
        });
    }

    $(document).ready(function(){
    	console.log('To Zanarkand');
    	menuBar();

    	$('#top-stories .slicky').slick({
    		arrows: true
    	});
    });
    
})(jQuery);
