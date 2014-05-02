(function(){
    $(document).ready(function(){
        $('.push.delete').click(function(e){
            e.preventDefault();
            $(this).next().submit();
        });
        $('input.auto').change(function(){
            $(this).parent('form').submit();
        });
        $('.tab.select>li>a').click(function(e){
            e.preventDefault();
            $('#category').val($(this).data('category'));
            $('.tab.select>li').removeClass('active');
            $(this).parent('li').addClass('active');
        });

        /** defalut **/
        $('.tab.select>li:first').addClass('active');
        $('#category').val($('.tab.select>li:first>a').data('category'));
    });
}).call(this);
