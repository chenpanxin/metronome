/**
 * Utils.js
 */

;(function($){

    $.fn.dropdown = function(options){

        var defaults = {};
        var settings = $.extend({}, defaults, options);
        var _dropdown = this;

        var initialize = function(){
            _dropdown.each(function(){
                var ctrl = $(this);
                ctrl.click(function(e){
                    e.preventDefault();
                    ctrl.next().toggleClass('open');
                });
            });
        };
        initialize();

        return _dropdown;
    };
})(jQuery);

$(document).on('page:fetch', function(){
    $('.spinner').fadeIn();
});

$(document).on('page:change', function(){
    $('.spinner').fadeOut();
    $('.user-opt').dropdown();
});

$(document).on('page:restore', function(){
    $('.spinner').hide();
});
