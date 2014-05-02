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
        $('.relationship').click(function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'post',
                success: function() {
                    console.log('...');
                }
            });
        });

        /** defalut **/
        $('.tab.select>li:first').addClass('active');
        $('#category').val($('.tab.select>li:first>a').data('category'));
    });
}).call(this);
