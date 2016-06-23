var pageFooter = {
    init: function() {
        pageFooter.bindUIAction();
    },
    bindUIAction: function() {

        pageFooter.UIHover();

        var target = $('.site-info-extra');
        target.click(function(event) {
            event.stopPropagation();
            target.toggleClass('active');
        })
        $(window).click(function(event) {
            event.stopPropagation();
            if(target.hasClass('active')) {
                target.removeClass('active')
            }
        })
    },
    UIHover: function() {
        var extraContent = $('.site-info-extra-content');
        var extra = $('.site-info-extra');
        extraContent.find('li:last-child').hover(function() {
            extraContent.toggleClass('lastChildHovered');
        })
    }
}
