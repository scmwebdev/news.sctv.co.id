/** 
 * News SCTV Main JS
 */

var Page = {

    init: function() {
        console.log('To Zanarkand');
        pageHeader.init();
        pageSlicky.init();
        pageFooter.init();
    },
    matchContentHeight: function() {
        var classes = [
            '.item-list.list-page',
        ];
        $.each(classes, function(i, z) {
            $(classes[i]).matchHeight();
        });
    }
};

(function($) {

    Page.init();
    pageSlicky.slicky('#breaking-news .slicky', 4, 1);


})(jQuery);
