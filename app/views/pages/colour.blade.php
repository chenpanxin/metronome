<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="{{ Config::get('website.keywords') }}">
    <meta name="description" content="{{ Config::get('website.description') }}">
    <title>{{ $title or 'Hello, Laravel.' }}</title>
    {{ HTML::style('assets/application.css') }}
    <style>
        .colour-data {
            margin: 0 auto;
            width: 970px;
            padding-top: 72px;
        }
        .colour-data .boxify {
            padding: 1em 1em;
        }
        .color-box {
            padding: .37em .37em;
        }
        .color-box .color-bar {
            display: inline-block;
            width: 50%;
            height: 20px;
        }
        .color-box .color {
            display: inline-block;
            float: right;
            font-weight: bold;
            line-height: 20px;
            font-size: 14px;
            color: rgba(0,0,0,.404);
        }
    </style>
    {{ HTML::script('http://remote.qiniudn.com/jquery.js') }}
</head>
<body>
<div class="navbar"></div>
<div class="colour-data">
    <div class="boxify">
        @foreach (range(1, 19) as $index)
            <div class="color-box">
                <span class="color-bar"></span>
                <span class="color"></span>
            </div>
        @endforeach
    </div>
</div>
<script>
    (function(){
        $(document).ready(function(){
            /**
             * ! Colours are from http://www.kakao.com/ !_^_^_!
             */
            var colours = ['#FB7F7B', '#DCC356', '#CCAB60'
                , '#D6B298', '#7ED7EC', '#A27559', '#AA9D63'
                , '#6EA2D2', '#6C7F99', '#C1B3C9', '#DAC26E'
                , '#628E85', '#A17158', '#D0B0A2', '#419BF0'
                , '#CF583E', '#628E85', '#F28361', '#94D560'
            ];

            $('.color-box').each(function(index){
                var colour = colours[index];
                if (colour) {
                    $(this).children('.color').text(colour);
                    $(this).children('.color-bar').css("background-color", colour);
                }
            });
        });
    }).call(this);
</script>
</body>
</html>
