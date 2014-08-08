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

$.fn.timeago.defaults.selector = 'span.timeago';
$.fn.timeago.defaults.attr = 'title';

$(document).on('page:fetch', function(){
    $('.spinner').fadeIn();
});

$(document).on('page:change', function(){
    $('.spinner').fadeOut();
    $('.user-opt').dropdown();
    $('span.timeago').timeago();
    $('textarea').autosize();
    $('form>input.auto[type=file]').change(function(){
        $(this).parent('form').submit();
    });
    $('.category.selection>a').click(function(e){
        var categoryId = $(this).data('categoryId');
        if (categoryId) {
            e.preventDefault();
            $('form>input#category').val(categoryId);
        };
    });
});

$(document).on('page:restore', function(){
    $('.spinner').hide();
});
