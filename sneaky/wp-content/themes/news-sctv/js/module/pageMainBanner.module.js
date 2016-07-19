var MainBanner = (function() {

    var latest = $('.item-list.item-latest');
    var container = $('#mainbanner');

    function initialize() {
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