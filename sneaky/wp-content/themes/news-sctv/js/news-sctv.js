(function($) {

    /* Description
     * makeToggle accept 3 arguments:
     * clickArea  => what you need to click to trigger it
     * targetArea => the targeted DOM
     * toggledCLass => class toggle */

    function makeToggle(clickArea, targetArea, toggledClass) {

        var func_num_args = arguments.length;

        if (func_num_args = 3) {
            $(clickArea).click(function() {
                $(targetArea).toggleClass(toggledClass);
            });
        }


    }

    function slicky(target, slidestoshow, slidestoscroll, infinite) {
        $(target).slick({
            slidesToShow: slidestoshow,
            slidesToScroll: slidestoscroll,
            infinite: infinite,
            draggable: false,
            autoplay: true,
            autoplaySpeed: 2000,
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
                }
            }]
        });
    };

    $(document).ready(function() {
        console.log('To Zanarkand');
        makeToggle('#site-menu-bar', 'body', 'menu-active');
        makeToggle('.site-info-extra > div', '.site-info-extra', 'active');
        slicky('#breaking-news .slicky', 4, 1);

        $('.slicky').slick({
            // arrows: true
        });

        $('.item-list.list-page').matchHeight();

    });

})(jQuery);