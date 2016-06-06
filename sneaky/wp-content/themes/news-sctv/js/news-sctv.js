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

    $(document).ready(function() {
        console.log('To Zanarkand');
        makeToggle('#site-menu-bar', 'body', 'menu-active');
        makeToggle('.site-info-extra > div', '.site-info-extra', 'active');

        $('.slicky').slick({
            // arrows: true
        });

        $('.item-list.list-page').matchHeight();

    });

})(jQuery);
