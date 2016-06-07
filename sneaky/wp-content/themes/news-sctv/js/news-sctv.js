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
        slicky('#breaking-news .slicky', 4, 1, 'false');

        $('.slicky').slick({
            // arrows: true
        });

        $('.item-list.list-page').matchHeight();

    });

})(jQuery);



// $('.responsive').slick({
//   dots: true,
//   infinite: false,
//   speed: 300,
//   slidesToShow: 4,
//   slidesToScroll: 4,
//   responsive: [
//     {
//       breakpoint: 1024,
//       settings: {
//         slidesToShow: 3,
//         slidesToScroll: 3,
//         infinite: true,
//         dots: true
//       }
//     },
//     {
//       breakpoint: 600,
//       settings: {
//         slidesToShow: 2,
//         slidesToScroll: 2
//       }
//     },
//     {
//       breakpoint: 480,
//       settings: {
//         slidesToShow: 1,
//         slidesToScroll: 1
//       }
//     }
//     // You can unslick at a given breakpoint now by adding:
//     // settings: "unslick"
//     // instead of a settings object
//   ]
// });
