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
            var _this = $(this);
            $.ajax({
                url: url,
                type: 'post',
                success: function(data) {
                    if (data.code == 94200) {
                        var link = _this.attr('href');
                        if (link.match('unfollow')) {
                            _this.attr('href', link.replace('unfollow', 'follow'));
                            _this.text(data.msg);
                        } else {
                            _this.attr('href', link.replace('follow', 'unfollow'));
                            _this.text(data.msg);
                        }
                    } else if (data.code == 94401) {
                        console.log(data.msg);
                    }
                }
            });
        });

        /** defalut **/
        $('.relationship').each(function(){
            var _this = $(this);
            var username = $('.vcard .account>span:first').text() || '';
            $.ajax({
                url: '/relationship?target='+username,
                success: function(data) {
                    if (data.code == '94200') {
                        var link = _this.attr('href');
                        _this.attr('href', link.replace('follow', 'unfollow'));
                        _this.text(data.replace);
                    }
                }
            });
        });
        $('.tab.select>li:first').addClass('active');
        $('#category').val($('.tab.select>li:first>a').data('category'));
    });
}).call(this);
