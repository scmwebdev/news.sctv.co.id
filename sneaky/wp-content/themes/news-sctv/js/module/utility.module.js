
/**
 * create Inheritance Helper
 */
function inherit(base, methods) {  
    var sub = function() {
        base.apply(this, arguments); // Call base class constructor

        // Call sub class initialize method that will act like a constructor
        this.initialize.apply(this, arguments);
    };
    sub.prototype = Object.create(base.prototype);
    $.extend(sub.prototype, methods);
    return sub;
}

/**
 * ModelView for UI/UX
 */
var interface = (function() {

    var el = $('.trigger');
    
    function activateUI() {

    	el.on('click', function(){
    		$(this).find('.trigger-icon').toggleClass('active'); //use the class trigger-icon as our trigger to set the active class to
    	});

    }

    $(document).ready(activateUI());

}());