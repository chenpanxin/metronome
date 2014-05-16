(function(){
    $.fn.timeago.defaults = {
        lang: {
            units: {
                second: "秒",
                seconds: "秒",
                minute: "分钟",
                minutes: "分钟",
                hour: "小时",
                hours: "小时",
                day: "天",
                days: "天",
                month: "月",
                months: "月",
                year: "年",
                years: "年"
            },
            prefixes: {
                lt: "不到 1",
                about: "大约",
                over: "超过",
                almost: "接近",
                ago: ""
            },
            suffix: "之前"
        },
        selector: 'span.timeago',
        attr: 'title'
    };
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
        // $('.comment-panel>.back-cancel').click(function(){
        //     $(this).parent().fadeOut(200);
        // });
        // $('.trigger.comment').click(function(e){
        //     e.preventDefault();
        //     var url = $(this).attr('href');
        //     $('.comment-panel form').attr('action', url);
        //     $('.comment-panel').fadeIn(200);
        // });
        $('.comment a.delete').click(function(e){
            e.preventDefault(0);
            var _this = $(this);
            var url = _this.attr('href');
            $.ajax({
                url: url,
                type: 'delete',
                success: function(data) {
                    _this.parents('li').fadeOut(500);
                }
            });
        });
        $('.comment a.edit').click(function(e){
            e.preventDefault();
            var _this = $(this);
            var url = _this.attr('href');
            var comment = _this.parent().next();
            var html = comment.html();
            var commentTemplate = $('.comment-edit-template').html();

            console.log(commentTemplate);

            // $('.comment-panel textarea').val(_this.parent('p').next().text());
            // $('.comment-panel form').attr('action', url+'?_method=PUT');
            // $('.comment-panel').fadeIn(200);
        });
        $('.me.like').click(function(e){
            e.preventDefault();
            var _this = $(this);
            var url = _this.attr('href');
            $.ajax({
                url: url,
                type: 'post',
                success: function() {
                    if (url.match('unlike')) {
                        _this.attr('href', url.replace('unlike', 'like'));
                    } else {
                        _this.attr('href', url.replace('like', 'unlike'));
                    }
                }
            });
        });

        /** defalut **/
        $('span.timeago').timeago();
        $('textarea').autosize();
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
