/**
 * ModelView for Main Banner
 */
var MainBanner = (function() {

    var latest = $('.item-list.item-latest');
    var container = $('#mainbanner');
    var firstChild = container.find('.item-banner:first');

    function initialize() {
        console.log('initialize mainbanner');
        $(firstChild).addClass('active');
        displayBanner();
    }

    function displayBanner() {

        latest.on('click', function(event) {

            event.preventDefault();
            var $id = $(this).attr('data-id');

            var selectBanner = $('.item-banner[data-id="' + $id + '"]');
            $(selectBanner).addClass('active').siblings().removeClass('active');

        });

    }

    $(document).ready(initialize());

}());