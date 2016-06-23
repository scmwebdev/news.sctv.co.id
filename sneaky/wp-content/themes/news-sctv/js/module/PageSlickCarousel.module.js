var pageSlicky = {

	init: function() {
		$('.slicky').slick();
	},
	slicky: function(target, slidestoshow, slidestoscroll, infinite) {

		infinite = 'no' || 'yes'; //by default its no
		$(target).slick({
            slidesToShow: slidestoshow,
            slidesToScroll: slidestoscroll,
            infinite: infinite,
            draggable: false,
            autoplay: true,
            autoplaySpeed: 4000,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: slidestoshow - 1,
                    slidesToScroll: slidestoscroll - 1,
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: slidestoshow - 2,
                    slidesToScroll: slidestoscroll - 2,
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }]
        });
	}

};